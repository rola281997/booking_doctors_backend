<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseHelper;
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
        $this->renderable(
                function (Throwable $exception, $request) {
                if ($request->expectsJson()) {
                    if ($exception instanceof ValidationException) {
                        return $this->error(Response::HTTP_UNPROCESSABLE_ENTITY, false, $this->reFormatValidationErr($exception->validator->errors()), 'Validation Error');

                    } elseif ($exception instanceof AuthenticationException) {
                        return $this->error(401, false, 'Unauthenticated', 'Unauthenticated');

                    }
                }
            }
        );
        $this->reportable(function (Throwable $e) {
            //
        });
    }

  

}
