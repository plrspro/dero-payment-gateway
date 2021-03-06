<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Application;
use Closure;

class ValidApiSecret
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
        if( ($request->header('Api-Secret') != config('deropay.secret')) || strlen(config('deropay.secret')) == 0 ){
            return response()->json(['error' => 'Unauthorized secret'], 401);
        }
        return $next($request);
    }
}
