<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
class otp
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
      if(Auth::guard('customer')->check()){
     $user = auth()->guard('customer')->user();
      $customer_detail=  DB::table('customers')->where('user_id', $user->id)->first();
        if($user->role_id != 1 && $user->is_otp_verify==0  && empty($customer_detail->fb_id) && empty($customer_detail->google_id) ){
          return redirect('/otp');
          exit();
        }
        else{
        return $next($request);
       }
      }
      else{
     return $next($request);
      }
    }
}
