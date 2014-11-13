<?php

use Illuminate\Pagination\Paginator;

class ApiController extends \BaseController {

	/**
	 * HTTP Constants
	 */
	const HTTP_OK = 200;
	const HTTP_CREATED = 201;
	const HTTP_NOT_FOUND = 404;
	const HTTP_BAD_PARAMS = 422;
	const HTTP_INTERNAL_ERROR = 500;


	/**
	 * @var integer
	 */
	protected $statusCode = self::HTTP_OK;


	/**
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}


	/**
	 * @param int $statusCode
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}


	/**
	 * Handle 404/Not Found responses
	 * @param  string $message
	 */
	public function respondNotFound($message = 'Not Found')
	{
		return $this->setStatusCode(self::HTTP_NOT_FOUND)->respondWithError($message);
	}


	/**
	 * Handle failed validation requests
	 * @param  string $message
	 */
	public function respondFailedValidation($message = "Failed validation")
	{
		return $this->setStatusCode(self::HTTP_BAD_PARAMS)->respondWithError('Parameters failed validation!');
	}

	/**
	 * @param  Paginator $lessons
	 * @param  $data
	 * @return mixed
	 */
	public function respondWithPagination(Paginator $lessons, $data)
	{

		$data = array_merge($data, [
			'paginator' => [
				'total_count' => $lessons->getTotal(),
				'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
				'current_page' => $lessons->getCurrentPage(),
				'limit' => $lessons->getPerPage()
			]
		]);
		return $this->respond($data);
	}

	/**
	 * Handle successful creation responses
	 * @param  string $message
	 */
	public function respondCreated($message = 'Created')
	{
		return $this->setStatusCode(self::HTTP_CREATED)->respondWithSuccess($message);
	}


	/**
	 * Handle 500/Internal Error response
	 * @param  string $message
	 */
	public function respondInternalError($message = 'Internal error!')
	{
		return $this->setStatusCode(self::HTTP_INTERNAL_ERROR)->respondWithError($message);
	}


	/**
	 * Format JSON responses
	 * @param  mixed $data
	 * @param  array $headers
	 * @return JSON response
	 */
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}


	/**
	 * Handle error responses
	 * @param  string $message
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}


	/**
	 * Handle success responses
	 * @param  string $message
	 */
	public function respondWithSuccess($message)
	{
		return $this->respond([
			'message' => $message,
			'status_code' => $this->getStatusCode()
		]);
	}

}