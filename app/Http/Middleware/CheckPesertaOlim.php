<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Olim;

class CheckPesertaOlim
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
        $user = Auth::user();     
        $olimbayar = Olim::where('userid', $user->id)->get('status')->first();
        
        if($olimbayar->status){
            return $next($request);            
        }
        else{
            return redirect('home');
        }            
    }
}
