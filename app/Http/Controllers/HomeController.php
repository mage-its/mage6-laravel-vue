<?php

namespace App\Http\Controllers;
use App\Pengumuman;
use App\Devcom;
use App\Esports;
use App\KodeBayar;
use App\Olim;
use App\KodePromo;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $user = Auth::user();
        // get konten pengumuman    
        $data = '';
        $date = Carbon::now()->toDateString();
        $announce = Pengumuman::select('konten')->where('start', '<=', $date)
                    ->where('end', '>=', $date);
        
        //get data for dashboard and replace announcement value
        if ($user->daftar == 'devcom') {
            $data = Devcom::where('userid', $user->id)->get()->first();
            $announce = $announce->where('type', 'devcom');
        }
        else if ($user->daftar == 'esport') {
            $data = Esports::where('userid', $user->id)->get()->first();
            $announce = $announce->where('type', 'esport');
        }
        else if ($user->daftar == 'olim') {
            $data = Olim::where('userid', $user->id)->get()->first();
            $announce = $announce->where('type', 'olim');
        } 
        else {
            $announce = $announce->where('type', 'guest');
        }
        $announce = $announce->get();
        
        
        if ($user->is_admin) {
            return redirect('/admin'); //redirect to admin page
        }
        else if (!isset($user->daftar)) {
            return view('home', ['user' => $user, 'announce' => $announce  ]); //redirect to pilihan lomba
        }        
        else {
            //redirect to user dashboard
            return view('user.dashboarduser', ['user' => $user, 'data' => $data, 'announce' => $announce  ]); 
        }
    }

    public function upload(Request $request)
    {
        $lomba = $request->user_daftar;
        $bukti = $request->file('scan_buktibayar');
        if ($lomba == 'olim') {
            $tim = Olim::where('id', $request->bayar_id)->get()->first();
            $name = $tim->nama_tim.'-'.$tim->no_peserta.'.'.$bukti->getClientOriginalExtension();
            Olim::where('id', $request->bayar_id)->update([
                'path_buktibayar' => $name,
                'nama_bayar' => $request->nama_bayar,
                'status_bayar' => true,
            ]);

        }
        else if ($lomba == 'esport') {

            $tim = Esports::where('id', $request->bayar_id)->get()->first();
            $name = $tim->nama_tim.'-'.$tim->no_peserta.'.'.$bukti->getClientOriginalExtension();
            Esports::where('id', $request->bayar_id)->update([
                'path_buktibayar' => $name,
                'nama_bayar' => $request->nama_bayar,
                'status_bayar' => true,
            ]);
        }
        else {
            $tim = Devcom::where('id', $request->bayar_id)->get()->first();
            $name = $tim->nama_tim.'-'.$tim->no_peserta.'.'.$bukti->getClientOriginalExtension();
            Devcom::where('id', $request->bayar_id)->update([
                'path_buktibayar' => $name,
                'nama_bayar' => $request->nama_bayar,
                'status_bayar' => true,
            ]);
        }
        $bukti->move(public_path().'/bb/', $name);

        return redirect('/home');
    }

    public function checktimGroup(Request $request){
        $namatimlain = $request->nama_timlain;

        $datatimlain =  Olim::where('no_peserta', $namatimlain)->get()->first();
        if(isset($datatimlain) && $datatimlain->nama_bayar){
            $checkpromosalah = "Tim yang anda jadikan patner sudah membayar";
            return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);        
        }
        else if(isset($datatimlain) && !isset($datatimlain->nama_bayar)){
            return redirect('/bayar/group')->with(['datatimlain' => $datatimlain]);        
        }
        else if(!isset($datatimlain)){
            $checkpromosalah = "Tim yang anda jadikan patner tidak terdaftar";
            return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);        
        }

        // echo $datatimlain;
        // if(isset($datatimlain)){
        //     echo "pass";
        // }        

    }

    public function checkpromoGroup(Request $request){
        $user = Auth::user();
        $userpromokode = $request->kode_promogroup;                
        $promo = KodePromo::where('kode', $userpromokode)->get()->first();
        if($promo){
            if($promo->status && $promo->usage !== $promo->max && $promo->group !== "single"){
                switch ($user->daftar) {
                    case 'olim':
                        $datauser = Olim::where('userid', $user->id)->get()->first();
                        $datauserlain = Olim::where('id', $request->timlain_id)->get()->first();
                        $price = explode(".", $datauser->price);
                        $pricetimlain = explode(".", $datauserlain->price);
                        if($price[0] < 115 || $pricetimlain[0] < 115){
                            $checkpromosalah = "Anda / Tim lain yang anda daftarkan sudah pernah menggunakan kode promo";
                            return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);
                        }
                        else{
                            if($promo->category === "olim" || $promo->category === "all"){
                                $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                                $newpricetimlain = (((int)($pricetimlain[0])) - ($promo->diskon_price)) . "." . $pricetimlain[1];
                                // update harga untuk user
                                Olim::where('userid', $user->id)->update(['price' => $newprice]);
                                KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                                // update harga untuk tim yang didaftarkan user
                                Olim::where('id', $request->timlain_id)->update(['price' => $newpricetimlain]);
                                KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);                                
                                $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                                return redirect('/bayar/group')->with(['checkpromo' => $checkpromo]);
                            }
                            else{
                                $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);
                            }
                        }
                        break;                                   
                }
            }
            else{
                $checkpromosalah = "Kode promo yang anda masukkan telah expired";
                return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);
            }                        
        }   
        else{
            $checkpromosalah = "Kode promo yang anda masukkan salah";
            return redirect('/bayar/group')->with(['checkpromosalah' => $checkpromosalah]);
        }   
    }     

    public function checkpromo(Request $request){
        $user = Auth::user();
        $userpromokode = $request->kode_promo;                
        $promo = KodePromo::where('kode', $userpromokode)->get()->first();        
        if($promo){
            if($promo->status && $promo->usage !== $promo->max && $promo->group === "single"){
                switch ($user->daftar) {
                    case 'esport':
                        $usercompetition = Esports::where('userid', $user->id)->get()->first();                            
                        $price = explode(".", $usercompetition->price);
                        switch ($usercompetition->cabang_lomba) {
                            case 'Mobile Legends':
                                if($price[0] < 100){
                                    $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                                    return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                }
                                else{
                                    if($promo->category === "esport" || $promo->category === "all"){
                                        $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                                        Esports::where('userid', $user->id)->update(['price' => $newprice]);
                                        KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                                        $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                                        return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                                    }
                                    else{
                                        $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                        return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                    }
                                }
                                break;                            
                            case 'CSGO':
                                if($price[0] < 120){
                                    $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                                    return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                }
                                else{
                                    if($promo->category === "esport" || $promo->category === "all"){
                                        $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                                        Esports::where('userid', $user->id)->update(['price' => $newprice]);
                                        KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                                        $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                                        return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                                    }
                                    else{
                                        $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                        return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                    }
                                }
                                break;
                            case 'DOTA':
                                if($price[0] < 120){
                                    $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                                    return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                }
                                else{
                                    if($promo->category === "esport" || $promo->category === "all"){
                                        $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                                        Esports::where('userid', $user->id)->update(['price' => $newprice]);
                                        KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                                        $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                                        return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                                    }
                                    else{
                                        $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                        return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                    }
                                }
                                break;

                            default:
                                $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                                break;
                        }
                        break;
                    case 'olim':
                        $usercompetition = Olim::where('userid', $user->id)->get()->first();                            
                        $price = explode(".", $usercompetition->price);
                        if($price[0] < 115){
                            $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                            return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                        }
                        else{
                            if($promo->category === "olim" || $promo->category === "all"){
                                $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                                Olim::where('userid', $user->id)->update(['price' => $newprice]);
                                KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                                $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                                return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                            }
                            else{
                                $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                                return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                            }
                        }
                        break;                    
                    default:
                        $checkpromosalah = "Kode promo tidak berlaku untuk cabang lomba ini";
                        return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                        break;
                }


                // if($user->daftar === "devcom"){
                //     $usercompetition = Devcom::where('userid', $user->id)->get()->first();                            
                //     $price = explode(".", $usercompetition->price);
                //     if($price[0] === "90" || $price[0] === "105" || $price[0] === "115"){
                //         $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                //         return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                //     }
                //     // echo $price[0];                            
                //     $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                //     Devcom::where('userid', $user->id)->update(['price' => $newprice]);
                //     KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                //     $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                //     return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                // }
                // else{
                //     $checkpromosalah = "Kode promo hanya berlaku untuk peserta devcom";
                //     return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                // }

                // if($promo->usage < 8){
                //     switch ($user->daftar) {
                //         case 'olim':
                //             $usercompetition = Olim::where('userid', $user->id)->get()->first();                            
                //             $price = explode(".", $usercompetition->price);
                //             if($price[0] === "78" || $price[0] === "68"){
                //                 $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                //                 return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                //             }
                //             // echo $price[0];                            
                //             $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                //             Olim::where('userid', $user->id)->update(['price' => $newprice]);
                //             KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                //             break;

                //         case 'devcom':
                //             $usercompetition = Devcom::where('userid', $user->id)->get()->first();
                //             $price = explode(".", $usercompetition->price);

                //             if($usercompetition->kat === "Mahasiswa" && ($price[0] === "128" || $price[0] === "118")){
                //                 $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                //                 return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                //             }
                //             elseif($usercompetition->kat === "Siswa" && $price[0] === "103"){
                //                 $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                //                 return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                //             }


                //             $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                //             Devcom::where('userid', $user->id)->update(['price' => $newprice]);
                //             KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                //             break;    
                            
                //         case 'esport':
                //             $usercompetition = Esports::where('userid', $user->id)->get()->first();
                //             $price = explode(".", $usercompetition->price);

                //             if($price[0] === "83" || $price[0] === "103"){
                //                 $checkpromosalah = "Anda sudah pernah menggunakan kode promo";
                //                 return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                //             }                            
                //             $newprice = (((int)($price[0])) - ($promo->diskon_price)) . "." . $price[1];
                //             Esports::where('userid', $user->id)->update(['price' => $newprice]);
                //             KodePromo::where('kode', $userpromokode)->update(['usage' => ($promo->usage)+1]);
                //             break;
                //         default:
                //             return redirect('/home');
                //             break;
                //     }

                //     $checkpromo = "Selamat kode promo berhasil digunakan";                                        
                //     return redirect('/bayar')->with(['checkpromo' => $checkpromo]);
                //     // echo "code berhasil digunakan";
                // }
                // else{
                //     $checkpromosalah = "Kode promo yang anda masukkan sudah melebihi batas penggunaan";
                //     return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
                // }
            }
            else{
                $checkpromosalah = "Kode promo yang anda masukkan telah expired";
                return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
            }                        
        }   
        else{
            $checkpromosalah = "Kode promo yang anda masukkan salah";
            return redirect('/bayar')->with(['checkpromosalah' => $checkpromosalah]);
        }         
    }
}
