<?php
/**
 * Created by PhpStorm.
 * User: aliuwahab
 * Date: 26/03/2019
 * Time: 7:35 AM
 */

namespace App\Traits;


use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * Build success response for api request
     *
     * @param string|array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK){
        return \response()->json(['data' => $data], $code);
    }


    /**
     * Build success response for api request
     *
     * @param string|array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code){
        return \response()->json(['error' => $message,'code' => $code], $code);
    }




}
