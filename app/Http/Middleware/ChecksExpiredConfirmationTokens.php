<?php

namespace Template\Http\Middleware;

use Closure;

class ChecksExpiredConfirmationTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $redirect
     * @return mixed
     */
    public function handle($request, Closure $next, $redirect)
    {
        //check if token has expired and rdirect to passed url
        if ($request->confirmation_token->hasExpired()) {
            return redirect()->route('activation.resend')
                ->withError('Token expired. ');
        }

        return $next($request);
    }
}
