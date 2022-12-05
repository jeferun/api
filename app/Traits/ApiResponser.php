<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    public function apiResponse($msg, $code, $status = false, $data = null)
    {
        $response['message'] = $msg;
        $response['status'] = $status;
        // $response['message'] = Response::HTTP_OK;

        if ($data) {
            $response['data'] = $data;
        }
        /* 
        if (count($errors)) {
            $response['errors'] = $errors;
        } */

        // count($data) ? '' : '';


        return response()->json($response, $code);
    }

   /*  public function apiResponseNotFounf($data, $msg)
    {
        if (is_null($data)) {
            return $this->apiResponse($msg, Response::HTTP_NOT_FOUND);
        }
    } */
}
