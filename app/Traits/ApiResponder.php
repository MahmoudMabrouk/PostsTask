<?php

namespace App\Traits;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponder
{
    /**
     * Build success response
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($message, $data = [], $code = ResponseAlias::HTTP_OK)
    {
        return response()->json(['success' => $message, 'data' => $data, 'code' => $code], $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build valid response
     * @param  int $code
     * @return JsonResponse
     */
    public function validResponse($data, $code = ResponseAlias::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
