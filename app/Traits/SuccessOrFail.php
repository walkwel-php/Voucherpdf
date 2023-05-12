<?php

namespace App\Traits;

trait SuccessOrFail
{
    public function kSuccess($message, $data = "", $extra = "")
    {
        $response['status_code'] = 1;
        $response['status_text'] = 'success';
        $response['message'] = $message;
        $response['data'] = $data;

        if ($extra != "") {
            foreach ($extra as $key => $value) {
                $response[$key] = $value;
            }
        }
        return $response;
    }

    public function kFailed($message, $data = "")
    {
        $response['status_code'] = 0;
        $response['status_text'] = 'failed';
        $response['message'] = $message;
        $response['data'] = $data;
        return $response;
    }
}
