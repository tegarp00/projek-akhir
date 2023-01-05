<?php

namespace App\Http\Middleware;

use App\Helpers\HttpClient;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Session::has("token")) {
            $auth = HttpClient::fetch(
                "GET",
                "https://winter-night-241.fly.dev/api/me"
            );
            if(!$auth) {
                return redirect("/");
            }

            if($auth['data']['role'] != 1) {
                return redirect("/");
            }
        } else {
            return redirect("/");
        }
        return $next($request);
    }
}
