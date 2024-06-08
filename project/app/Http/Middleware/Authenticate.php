<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        if($request->is('admin') || $request->is('admin/*')){
            return redirect('admin');
        }elseif($request->is('user') || $request->is('user/*')){
            return redirect('user/login');
        }else{
            return redirect()->guest(route('front.index'));
        }
        
    }
}
