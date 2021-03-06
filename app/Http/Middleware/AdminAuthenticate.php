<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class AdminAuthenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
//        print_r($guard);die;
        $this->auth->shouldUse($guard);

        if ($this->auth->guard($guard)->guest()) {
            $arrayResult['code']    = 401;
            $arrayResult['message'] = '认证错误';
            $arrayResult['data']    = [];

            return response()->json($arrayResult, 401)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
//            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
