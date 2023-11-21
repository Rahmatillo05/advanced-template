<?php

namespace common\components;

class ResponseHelper
{
    public static function success($message = 'Success', $data = []): array
    {
        return [
            'status' => 200,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function error($message = 'Error', $data = [], $code = 500): array
    {
        return [
            'status' => $code,
            'message' => $message
        ];
    }

}