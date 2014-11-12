<?php


class ApiController extends \BaseController {
	/**
	 * @var integer
	 */
	protected $statusCode = 200;

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
	 * @return json
	 */
	public function respondNotFound($message = 'Not Found')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	/**
	 * Handle 500/Internal Error response
	 * @param  string $message
	 * @return json
	 */
	public function respondInternalError($message = 'Internal error!')
	{
		return $this->setStatusCode(500)->respondWithError($message);
	}


	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}
}