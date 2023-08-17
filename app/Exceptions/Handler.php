<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    /**
     * 
     */
    public function render($request, Throwable $exception)
    {
        // \Log::debug('ExceptionHandler::ApplicationError - '.$e);
        if (is_a($exception, 'App\Exceptions\CustomException')) return new JsonResponse(['error' => $exception->getMessage(), 'stack' => $exception->__toString()], 200);
        else return new JsonResponse(['error' => trans('bs_request.server_error'), 'stack' => $exception->__toString()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
