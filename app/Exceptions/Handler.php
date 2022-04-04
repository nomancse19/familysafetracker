<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });


        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'=>false,
                    'message' => 'Not Found Route Or Url',
                    'data'=>null,
                    'status_code'=>404
                ], 404);
            }else{
                //return view('errors.405');
                //return response()->view('errors.405',[],404);
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'=>false,
                    'message' => 'You Are Unathencated',
                    'data'=>null,
                    'status_code'=>401
                ], 401);
            }
        });
        
        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'=>false,
                    'message' => 'Method Not Alowed',
                    'data'=>null,
                    'status_code'=>401
                ], 401);
            }
        });

        $this->renderable(function (QueryException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'=>false,
                    'message' => 'Problem With Database & Query Releted..',
                    'data'=>null,
                    'status_code'=>500
                ], 500);
            }
        });

        $this->renderable(function (ServiceUnavailableHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'=>false,
                    'message' => 'Server Down For Service Unavailable..',
                    'data'=>null,
                    'status_code'=>503
                ], 503);
            }
        });






    }
}
