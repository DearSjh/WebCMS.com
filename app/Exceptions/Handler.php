<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */

    protected $returnCode = Response::HTTP_OK;
    protected $returnMessage = '操作成功';
    protected $returnData = [];

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Description:
     * Author: DJJ
     * @param Exception $exception
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {

        //数据验证异常拦截
        $classException = get_class($exception);

        $code = 200;
        if ($classException == ValidationException::class) {
            // 返回所有错误信息
            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                return $this->responseErr(422, array_values($exception->validator->errors()->toArray())[0][0], '');
            }
            return parent::render($request, $exception);
        } elseif ($classException == QueryException::class) {
            $this->setCode(API_RETURN_CODE_ERROR, '数据库出错，请稍后重试');
        } elseif ($classException == NotFoundHttpException::class) {
            $this->setCode(API_RETURN_CODE_ERROR, 'NOT FOUND');
        } elseif ($classException == MethodNotAllowedHttpException::class) {
            $this->setCode(API_RETURN_CODE_ERROR, '请求方式错误');
        } elseif ($classException == ModelNotFoundException::class) {
            $this->setCode(Response::HTTP_NOT_FOUND, '无对应记录.');
        } else {
            $error_code = !empty($exception->getCode()) ? $exception->getCode() : API_RETURN_CODE_ERROR;
            $this->setCode($error_code, $exception->getMessage());
        }
        return $this->getJSONResponse($code);
    }

    public function responseErr($code = 200, $msg = '', $data = [])
    {
        $data = [
            'code'    => $code,
            'message' => $msg,
            'data'    => $data,
        ];
        return response()->json($data, 200)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * 处理验证异常
     *
     * @param \Exception|ValidationException $exception
     */
    private function setAllValidatorException(ValidationException $exception)
    {
        $data = [];
        $message = '';
        if (!empty($exception->errors())) {
            foreach ($exception->errors() as $field => $error) {
                empty($message) && $message = current($error);
//                $data[] = compact('field', 'error');
                $data[$field] = $error;
            }
        }
        $this->setData($data);
        // 现在把错误信息也放在message中，前端可能只展示这个message的错误信息
        $this->setCode(API_RETURN_CODE_ERROR, $message);
    }

    /**
     * Get json response.
     * @param int $code
     * @return \Illuminate\Http\JsonResponse response
     * @internal param $null
     */
    public function getJSONResponse($code = 200)
    {
        $arrayResult['code']    = $this->returnCode;
        $arrayResult['message'] = $this->returnMessage;
        $arrayResult['data']    = $this->returnData;
        return response()->json($arrayResult, $code)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function setCode($iReturnCode, $msg)
    {
        $this->returnCode    = $iReturnCode;
        $this->returnMessage = $msg;
    }


    public function setData($data)
    {
        $this->returnData = $data;
    }

}
