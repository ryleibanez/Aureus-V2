<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cartCheckoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cartCheck = Cart::where('email', '=', auth()->user()->email)->first();

        if($cartCheck){
            return $next($request);
        }else{
            session()->flash('errorcheckout', 'There is a problem with your request. Please try again later.');
            return Redirect(route('index'));
        }
        
    }
}
