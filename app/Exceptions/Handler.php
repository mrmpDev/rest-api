<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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
    }


//    /**
//     * Report or log an exception.
//     *
//     * @param  \Exception $exception
//     * @return void
//     */
//    public function report(Exception $exception)
//    {
//        parent::report($exception);
//    }
//
//    /**
//     * Render an exception into an HTTP response.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @param  \Exception $exception
//     * @return \Illuminate\Http\Response
//     */
//    public function render($request, Exception $exception)
//    {
//        if ($request->wantsJson()) {
//            if ($exception instanceof ValidationException) {
//                return $this->renderValidationException($request, $exception);
//            }
//
//            return $this->renderOtherExceptions($request, $exception);
//        }
//
//        return parent::render($request, $exception);
//    }
//
//    /**
//     * کنترل خطاهایی که از نوع بررسی ولیدیشن هستند
//     *
//     * @param $request
//     * @param Exception $exception
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
//     */
//    private function renderValidationException($request, Exception $exception)
//    {        return response([
//        'errors' => $exception->errors()
//    ], 422);
//    }
//
//    /**
//     * ایجاد جیسان برای سایر خطا ها
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param Exception $exception
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
//     */
//    private function renderOtherExceptions(\Illuminate\Http\Request $request, Exception $exception)
//    {
//        $exception = $this->prepareException($exception);
//        $code = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
//
//        return response([
//            'message' => $code == 500 ? 'خطایی در سرور رخ داده است' : $exception->getMessage()
//        ], $code);
//    }


}
