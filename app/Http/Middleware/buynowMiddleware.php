<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class buynowMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   $check = "";
        if(Auth::check()){
            $check = Order::where('orderstatus', '=', 'buynow')
            
            ->where('email','=',auth()->user()->email)
            ->first();
        }else{

        }
        if ($request->is('buynow') || $request->is('checkoutorder')) {
            if ($check) {
                return $next($request);
            } else {
                return redirect(route('index'));
            }
        } else {
            $deleteRecord = Order::where('orderstatus', '=', 'buynow')->first();
            if ($deleteRecord) {
                $deleteRecord->delete(); // Delete the record if it exists
            }
            return $next($request);
        }
    }
}
