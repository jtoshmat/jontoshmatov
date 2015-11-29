<?php

namespace app\Http\Middleware;

use Closure;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $origin = $request->header('origin');

        if ($this->endsWith($origin, 'changemyworldnow.com') || $this->endsWith($origin, 'front.cmwn.localhost') || $this->endsWith($origin, 'api.cmwn.localhost')) {
            return $next($request)->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Authorization, X-Auth-Token, X-CSRF-TOKEN')
                ->header('Access-Control-Max-Age', '28800');
        } else {
            if (env('APP_ENV') == 'local') {
                return $next($request);
            } else {
                return response('You are not supposed to be here!', 401);
            }
        }
    }

    private function endsWith($string, $test)
    {
        $strlen = strlen($string);
        $testlen = strlen($test);

        if ($testlen > $strlen) {
            return false;
        }

        return substr_compare($string, $test, strlen($string) - strlen($test), strlen($test)) === 0;
    }
}
