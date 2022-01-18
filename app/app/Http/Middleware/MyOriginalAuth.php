<?php

namespace App\Http\Middleware;

use Closure;

class MyOriginalAuth
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
        logger('MyOriginalAuthです');
        // dd($request->path());

        if (!session()->has('login_date') || session()->get('login_limit') + session()->get('login_date') < time()) {
            logger('ログインしていないユーザーです。');
            if($request->path() !== 'login'){
                logger('リクエスト先はログイン画面ではありません。ログイン画面へ遷移します');
                return redirect('login');
            }else{
                logger('リクエスト先はログイン画面です。');
                return $next($request);
            }
        }
        logger('ログイン済みユーザーです。');
        if($request->path() === 'login'){
            logger('リクエスト先はログイン画面です。マイページへ遷移します');
            return redirect('home');
        }
        return $next($request);
    }
}
