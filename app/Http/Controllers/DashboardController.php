<?php

namespace App\Http\Controllers;

use App\Devcom;
use App\Esports;
use App\Olim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function bayar(Request $request){
        $user = Auth::user();
        switch($user->daftar){
            case 'olim':
                $data = Olim::where('userid', $user->id)->get()->first();                
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
            case 'esport':
                $data = Esports::where('userid', $user->id)->get()->first();
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
            case 'devcom':
                $data = Devcom::where('userid', $user->id)->get()->first();                
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
        }        
        
        if($request->session()->get('checkpromo') !== null){
            $checkpromo = $request->session()->get('checkpromo');        
            return view('user.bayar', ['user' => $user, 'data' => $data, 'checkpromo' => $checkpromo, 'price' => $price]);
        }
        elseif($request->session()->get('checkpromosalah') !== null){
            $checkpromosalah = $request->session()->get('checkpromosalah');        
            return view('user.bayar', ['user' => $user, 'data' => $data, 'checkpromosalah' => $checkpromosalah, 'price' => $price]);
        }
        
        return view('user.bayar', ['user' => $user, 'data' => $data, 'price' => $price]);
        
    }

    public function bayargroup(Request $request){
        $user = Auth::user();
        switch($user->daftar){
            case 'olim':
                $data = Olim::where('userid', $user->id)->get()->first();                
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
            case 'esport':
                $data = Esports::where('userid', $user->id)->get()->first();
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
            case 'devcom':
                $data = Devcom::where('userid', $user->id)->get()->first();                
                $pricedb = explode(".", $data->price);                
                $price = (int)$pricedb[0];
            break;
        }        
        
        if($request->session()->get('datatimlain') !== null){
            $datatimlain = $request->session()->get('datatimlain');        
            return view('user.bayargroup', ['user' => $user, 'data' => $data, 'datatimlain' => $datatimlain]);
        }        
        else if($request->session()->get('checkpromo') !== null){
            $checkpromo = $request->session()->get('checkpromo');        
            return view('user.bayargroup', ['user' => $user, 'data' => $data, 'checkpromo' => $checkpromo, 'price' => $price]);
        }
        elseif($request->session()->get('checkpromosalah') !== null){
            $checkpromosalah = $request->session()->get('checkpromosalah');        
            return view('user.bayargroup', ['user' => $user, 'data' => $data, 'checkpromosalah' => $checkpromosalah, 'price' => $price]);
        }

        return view('user.bayargroup', ['user' => $user, 'data' => $data, 'price' => $price]);
        
    }

    public function file(){
        $user = Auth::user();

        switch($user->daftar){
            case 'olim':
                $data = Olim::where('userid', $user->id)->get()->first();
            break;
            case 'esport':
                $data = Esports::where('userid', $user->id)->get()->first();
            break;
            case 'devcom':
                $data = Devcom::where('userid', $user->id)->get()->first();
            break;
        }

        return view('user.file', ['user' => $user, 'data' => $data]);
    }

    public function rekap()
    {
        $user = Auth::user();
        switch($user->daftar){
            case 'olim':
                $data = Olim::where('userid', $user->id)->get()->first();
            break;
            case 'esport':
                $data = Esports::where('userid', $user->id)->get()->first();
            break;
            case 'devcom':
                $data = Devcom::where('userid', $user->id)->get()->first();
            break;
        }

        return view('user.rekap', ['user' => $user, 'data' => $data]);
    }

    public function submisi()
    {
        $user = Auth::user();
        $data = Devcom::where('userid', $user->id)->get()->first();

        return view('user.submission', ['user' => $user, 'data' => $data]);
    }
}
