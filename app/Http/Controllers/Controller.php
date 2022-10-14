<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $message
     * @param array $result
     * @param int $code
     * @param string $redirect
     * @param int $delay
     * @param bool $hide
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function makeSuccessResponse($message = '', $result = [], $code = 200, $redirect = '', $delay = 1000, $hide = True)
    {
        $response = [
            'status' => True,
            'message' => $message
        ];

        if (!empty($result)) {
            $response['data'] = $result;
        }
        if (!empty($redirect)) {
            $response['redirect'] = $redirect;
        }
        if (!empty($delay)) {
            $response['delay'] = $delay;
        }
        if (!empty($hide)) {
            $response['hide'] = $hide;
        }

        return response()->json($response, $code);
    }

    /**
     * @param string $message
     * @param array $errors
     * @param int $code
     * @param string $redirect
     * @param int $delay
     * @param bool $hide
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function makeErrorResponse($message = '', $errors = [], $code = 404, $redirect = '', $delay = 1000, $hide = True)
    {
        $response = [
            'status' => False,
            'message' => $message
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }
        if (!empty($redirect)) {
            $response['redirect'] = $redirect;
        }
        if (!empty($delay)) {
            $response['delay'] = $delay;
        }
        if (!empty($hide)) {
            $response['hide'] = $hide;
        }

        return response()->json($response, $code);
    }

    /**
     * @param array $errors
     * @param string $message
     * @param int $code
     * @param string $redirect
     * @param int $delay
     * @param bool $hide
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function makeValidationErrorResponse($errors = [], $message = 'The given data was invalid', $code = 404, $redirect = '', $delay = 1000, $hide = True)
    {
        $response = [
            'status' => False,
            'message' => __($message),
            'errors' => $errors,
        ];

        if (!empty($redirect)) {
            $response['redirect'] = $redirect;
        }
        if (!empty($delay)) {
            $response['delay'] = $delay;
        }
        if (!empty($hide)) {
            $response['hide'] = $hide;
        }

        return response()->json($response, $code);
    }
}
