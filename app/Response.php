<?php

namespace RestlyFriendly;

use Symfony\Component\HttpFoundation\JsonResponse;

class Response extends JsonResponse
{

    public function __construct(
        $success = FALSE,
        $data = NULL,
        $statusCode = 200,
        array $headers = []
    )
    {

        $resultData = function($data, $default = [])
        {

            return empty($data)
                ? $default
                : (array) $data;

        };

        $json['success'] = (boolean) $success;

        if (is_array($data) AND array_key_exists('result', $data))
        {
            $json += $resultData($data);
        }
        else
        {
            $json['result'] = $resultData($data);
        }

        parent::__construct($json, (integer) $statusCode, $headers);

    }

}
