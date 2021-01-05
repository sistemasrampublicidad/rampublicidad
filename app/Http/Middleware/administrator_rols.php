<?php

namespace App\Http\Middleware;

use App\Models\Maintenance\RolesModel;
use Closure;
use Illuminate\Http\Request;

class administrator_rols
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $rol = RolesModel::where('id','=',auth()->user()->role_id)->first();

        if($rol['id'] == 1 || $rol['id'] == 2){
            return $next($request); 

        }else{
             return back()->with('no-success','No tiene accesso a este módulo');   
        }

    }
}
