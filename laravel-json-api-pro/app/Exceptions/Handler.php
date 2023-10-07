<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Throwable;
use Illuminate\Validation\ValidationException;
use Neomerx\JsonApi\Exceptions\JsonApiException;
use Illuminate\Auth\Access\AuthorizationException;
use CloudCreativity\LaravelJsonApi\Exceptions\HandlesErrors;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use CloudCreativity\LaravelJsonApi\Exceptions\ValidationException as CloudCreativityValidationException;
use Neomerx\JsonApi\Exceptions\ErrorCollection as NeomerxErrorCollection;
use Neomerx\JsonApi\Document\Error as NeomerxError;

class Handler extends ExceptionHandler
{
    use HandlesErrors;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        JsonApiException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        // This will format exceptions which are thrown by Laravel in a correct json:api spec response
        if ($this->isJsonApi($request, $exception)) {
            // Format correctly the Laravel Validation Exceptions
            if ($exception instanceof ValidationException) {
                $cloudCreativityValidationException = $this->getCloudCreativityValidationException($exception);
                $renderedException = $this->renderJsonApi($request, $cloudCreativityValidationException);

                return $this->formatNativeValidationErrors($renderedException);
            }

            // Format correctly the Laravel Authorization Exceptions
            if ($exception instanceof AuthorizationException) {
                $renderedException = $this->renderJsonApi($request, $exception);

                return $this->formatNativeAuthorizationErrors($renderedException);
            }

            if ($exception instanceof ConstraintException) {
                $renderedException = $this->renderJsonApi($request, $exception);

                return $this->formatNativeConstraintErrors($renderedException, $exception);
            }

            return $this->renderJsonApi($request, $exception);
        }

        return parent::render($request, $exception);
    }

    protected function prepareException(Throwable $e)
    {
        if ($e instanceof JsonApiException) {
            return $this->prepareJsonApiException($e);
        }

        return parent::prepareException($e);
    }

    /**
     * Re-format Laravel's native validation errors to mimic json:api spec
     *
     * @param $renderedException
     * @return mixed
     */
    protected function formatNativeValidationErrors($renderedException)
    {
        $exceptionContent = json_decode($renderedException->getContent(), true);

        $exceptionContent['errors'] = array_map(function ($error) {
            return $error;
        }, $exceptionContent['errors']);

        $renderedException->setContent(json_encode($exceptionContent));

        return $renderedException;
    }

    /**
     * @param $renderedException
     * @return mixed
     */
    private function formatNativeAuthorizationErrors($renderedException)
    {
        $exceptionContent = json_decode($renderedException->getContent(), true);

        $exceptionContent['errors'][0]['title'] = "Oops, you are not authorized to do this action.";

        $renderedException->setContent(json_encode($exceptionContent));

        return $renderedException;
    }

    /**
     * @param $renderedException
     * @param $exception
     * @return mixed
     */
    protected function formatNativeConstraintErrors($renderedException, $exception)
    {
        $exceptionContent = [
            'errors' => [
                [
                    'status' => $exception->getCode(),
                    'title' => $exception->getMessage()
                ]
            ]
        ];

        $renderedException->setContent(json_encode($exceptionContent));

        return $renderedException;
    }

    /**
     * @param ValidationException $exception
     * @return CloudCreativityValidationException
     */
    protected function getCloudCreativityValidationException(ValidationException $exception): CloudCreativityValidationException
    {
        $neomerxErrorCollection = new NeomerxErrorCollection();
        $neomerxErrorCollection->add($this->getNeomerxError($exception));

        return new CloudCreativityValidationException(
            $neomerxErrorCollection,
            400,
            $exception
        );
    }

    /**
     * @param ValidationException $exception
     * @return NeomerxError
     */
    protected function getNeomerxError(ValidationException $exception): NeomerxError
    {
        $messageBag = $exception->validator->getMessageBag()->getMessages();
        $key = array_key_first($messageBag);

        $failedRules = $exception->validator->failed();
        $rule = strtolower(array_key_first($failedRules[$key]));

        return new NeomerxError(
            $idx = null,
            $aboutLink = null,
            $status = $exception->status,
            $code = null,
            $title = "Unprocessable Entity",
            $detail = $messageBag[$key][0],
            $source = [
                'pointer' => $rule === 'required' ? '/data' : "/data/attributes/$key"
            ],
            $meta = [
                'failed' => [
                    'rule' => $rule
                ]
            ]
        );
    }


}
