<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('token');
        $path = $request->path();
        if($path=='admin/increase_commodity_'){//increase_commodity_这是我上传图片的方法
            return $next($request);
        }
        if ($path!='admin/admin_land'){
            if (!$token){
                return response()->json([
                    'code'=>-1,
                    'info'=>'秘钥不存在',
                    'data'=>$path
                ]);
            }else{
                $user = Redis::get($token);
                if (!$user){
                    return response()->json([
                        'code'=>0,
                        'info'=>'非法秘钥',
                        'data'=>$user
                    ]);
                }
                Redis::setex($token, 60*60*24, $user);
//                Redis::EXPIRE($token,60*60*24);
            }
        }

        return $next($request);
    }
}
