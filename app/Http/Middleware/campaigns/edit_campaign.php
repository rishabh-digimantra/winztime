<?php

namespace App\Http\Middleware\campaign;

use Closure;
use DB;
use Auth;

class edit_campaign
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
      /*$check =  DB::table('manage_role')
                 ->where('user_types_id',Auth()->user()->role_id)
                 ->where('campaigns_update',1)
                 ->first();
        if($check == null){
          return  redirect('not_allowed');
        }else{*/
          return $next($request);
        //}
    }
}
