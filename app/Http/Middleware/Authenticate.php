<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $request->session()->put('showModal', true);
        return $request->expectsJson() ? null : route('landing-page');
        // return redirect(route('landing-page'))->with('message', 'You must login first.');
    }
}
