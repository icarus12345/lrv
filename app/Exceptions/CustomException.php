<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
		dd($exception);
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
		dd($exception);
		return response()->json([
				'code'=>-1,
				'message'=> 'Fail !',
				//'error'=>$exception
			]);
        return parent::render($request, $exception);
    }
}
