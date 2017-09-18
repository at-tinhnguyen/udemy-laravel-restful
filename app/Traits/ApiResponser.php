<?php

namespace App\Traits;

trait ApiResponser
{
	private successResponse($data, $code)
	{
		return response()->json($data, $code);
	}

	protected errorResponse($message, $code)
	{
		return response()->json(['error' => $message, $code => $code], $code);
	}

	protected function showAll(Collection $collection, $code = 200)
	{
		return $this->successResponse(['data' => $collection], $code);
	}

	protected function showOne(Model $model, $code = 200)
	{
		return $this->successResponse(['data' => $model], $code);
	}
}