<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/25
 * Time: 13:39
 */

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\Admin\Auth\AdminAuthLogin;

use App\Models\Admin\UserRole;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\JWTAuth;

class AdminAuthController extends Controller
{
    protected $jwt;

    /**
     * Create a new AuthController instance.
     *
     * @param JWTAuth $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        parent::__construct();
        $this->jwt = $jwt;
        $this->middleware('auth:admin', ['except' => ['login']]);
    }


    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {

        $this->validate($request, AdminAuthLogin::rules(), AdminAuthLogin::msg(), AdminAuthLogin::attr());
        $userName = $request->input('user_name');
        $password = $request->input('password');
        $code = $request->input('code');

        $key = $_COOKIE['captcha'] ?? '';

//        if (app('captcha')->check($code, $key) === false) {
//            $this->setMsg(-4, '验证码错误');
//            return $this->responseJSON();
//        }

        $adminAdmin = Admin::where(['user_name' => $userName])->first();

        if (empty($adminAdmin->id)) {
            $this->setMsg(-3, '账号错误');
            return $this->responseJSON();
        }

        if (!password_verify($password, $adminAdmin->password)) {
            $this->setMsg(-2, '密码错误');
            return $this->responseJSON();
        }
        if ($adminAdmin->state != 1) {
            $this->setMsg(-1, '管理员禁止登陆');
            return $this->responseJSON();
        }

        $token = $this->jwt->fromUser($adminAdmin);

        $date = $this->respondWithToken($token);
//        $date += UserRole::getRoleAction($adminAdmin->id);
        $this->setData($date);
        return $this->responseJSON();
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    public function logout()
    {
        $this->jwt->parseToken()->invalidate();

        return $this->responseJSON();
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    public function me()
    {
        return response()->json($this->jwt->parseToken()->toUser());
    }

    public function refresh(Request $request)
    {
        $this->jwt->getToken();
        $this->setData($this->respondWithToken($this->jwt->refresh()));
        return $this->responseJSON();
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->jwt->factory()->getTTL(),
        ];
    }
}