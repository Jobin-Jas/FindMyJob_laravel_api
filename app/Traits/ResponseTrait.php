<?php

namespace App\Traits;

/**
 * 
 */
trait ResponseTrait
{

    /**
     * Success response
     *
     * @param message string
     * @param status integer
     * @param data array to be appended to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function SuccessResponse($message, $status = 200 ,$data =null){
        $response =$message ? ['messge'=>$message]:[];

        if($data != null){
            $response = array_merge($response, $data);
        }

        return response()->json($response, $status);

    }
     /**
     * Error response
     *
     * @param message string
     * @param status integer
     * @param data array to be appended to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function ErrorResponse($message, $status = 400, $data = null)
    {
        $response = ['error' => $message];

        if ($data != null) {
            $response = array_merge($response, $data);
        }

        return response()->json($response, $status);
    }

     /**
     * Token response
     *
     * @param message string
     * @param status integer
     * @param data array to be appended to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function TokenResponse($message, $status = 200, $data = null)
    {
    $response = ['token' => $message];

        if ($data != null) {
            $response = array_merge($response, $data);
        }

        return response()->json($response, $status);
    }
    
}
