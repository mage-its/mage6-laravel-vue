<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Olim;
use App\User;
// use App\Promo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use App\KodeBayar;
use App\Score;
use Laracsv\Export;
use App\Soal;
use App\UserAnswers;
use Illuminate\Support\Carbon;
use App\TimeTables;

class OlimController extends Controller
{
    // return all submitted peserta
    public function index()
    {
        $peserta = Olim::select('users.email','users.id', 'userid', 'no_peserta', 'asal_sekolah', 'asal_alamat',
        'asal_kota', 'nama_tim', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'nama_anggota1',
        'nama_anggota2', 'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota2', 'path_buktibayar',
        'nama_bayar', 'price', 'olim.updated_at', 'asal_info', 'status')
        ->join('users', 'users.id','=', 'olim.userid' )
        ->where('is_submitted',true)->orderBy('no_peserta', 'ASC')->get();

        return view('admin.daftarolim', ['peserta' => $peserta]);
    }

    // delete peserta
    public function hapus(Request $request)
    {
        $timId = $request->timId;

        $data = Olim::where('userid', $timId)->get()->first();
        User::where('id', $data->userid)->update(['daftar' => null]);
        Olim::where('userid', $timId)->delete();

        return redirect("/daftarolim");
    }

    //udpate data peserta
    public function update(Request $request)
    {
        Olim::where('id', $request->timId)->update([
            'no_peserta'=>$request->no_peserta,
            'asal_sekolah'=>$request->asal_sekolah,
            'asal_alamat'=>$request->asal_alamat,
            'asal_kota'=>$request->asal_kota,
            'nama_tim'=>$request->nama_tim,
            'nama_ketua'=>$request->nama_ketua,
            'hp_ketua'=>$request->hp_ketua,
            'wa_ketua'=>$request->wa_ketua,
            'line_ketua'=>$request->line_ketua,
            'nama_anggota1'=>$request->nama_anggota1,
            'nama_anggota2'=>$request->nama_anggota2,
        ]);

        return redirect("/daftarolim");
    }

    //verif peserta
    public function toggleVerif(Request $request)
    {
        $timId = $request->timId;
        $status = Olim::where('userid', $timId)->get(['status'])->first(); //get user verif status
        if ($status->status == false) {
            Olim::where('userid', $timId)->update(['status' => true, 'no_peserta' => $request->noPeserta]);
        } else {
            Olim::where('userid', $timId)->update(['status' => false]);
        }
        return redirect("/daftarolim");
    }

    //download CSV
    public function adminDownload()
    {
        $data = Olim::select('users.email','users.id', 'userid', 'no_peserta', 'asal_sekolah', 'asal_alamat',
        'asal_kota', 'nama_tim', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'nama_anggota1',
        'nama_anggota2', 'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota2', 'path_buktibayar',
        'nama_bayar', 'price', 'olim.updated_at', 'asal_info', 'info')
        ->join('users', 'users.id','=', 'olim.userid' )
        ->where('is_submitted',true)->orderBy('no_peserta', 'ASC')->get();

        $csv = new Export();
        $csv->build($data, [
            'no_peserta',
            'email',
            'asal_sekolah',
            'asal_alamat',
            'asal_kota',
            'nama_tim',
            'nama_ketua',
            'hp_ketua',
            'wa_ketua',
            'line_ketua',
            'nama_anggota1',
            'nama_anggota2',
            'asal_info',
            'info',
            'nama_bayar',
            'price',
            'status'
            ])->download('olim'.date('Y-m-d').'.csv');
    }

    //User Function
    public function userIndex()
    {
        $user =  Auth::user();
        $data = Olim::where('userid', $user->id)->get()->first();
        return view('user.olim', ['user' => $user->name, 'data' => $data, 'id' => $user->id]);

        // return redirect('/closed');
    }

    public function rekapIndex()
    {
        $user =  Auth::user();
        $data = Olim::where('userid', $user->id)->get()->first();
        return view('user.rekap', ['user' => $user->name, 'data' =>$data, 'id' => $user->id]);
    }

    public function submit(Request $request)
    {
        $userId = Auth::user()->id;
        $kode = KodeBayar::where('name', 'olim')->get()->first();
        Olim::where('userid', $userId)->update(['no_peserta' => 'OLI0'.$kode->no, 'is_submitted'=>true]);

        KodeBayar::where('name', 'olim')->update(['no' => $kode->no+1]);
        return redirect('/rekapOlim');
    }

    public function finalSubmit(Request $request)
    {
        $userId = Auth::user()->id;
        $kode = KodeBayar::where('name', 'olim')->get()->first();

        // $currentHarga = $this->SetHarga($request->promo_code, $kode->price);
        $currentHarga = $kode->price;

        $ktpKetua = $request->file('scan_ktpketua');
        $ktpAnggota1 = $request->file('scan_ktpanggota1');
        $ktpAnggota2 = $request->file('scan_ktpanggota2');
        $namaKetua = $request->nama_tim.'-KETUA-OLI0'.$kode->no.'.'.$ktpKetua->getClientOriginalExtension();

        $ktpKetua->move(public_path().'/kp/', $namaKetua);

        if (isset($ktpAnggota1)) {
            $namaAnggota1 = $request->nama_tim.'-ANGGOTA1-OLI0'.$kode->no.'.'.$ktpAnggota1->getClientOriginalExtension();
            $ktpAnggota1->move(public_path().'/kp/', $namaAnggota1);
        } else {$namaAnggota1 = null;}

        if (isset($ktpAnggota2)) {
            $namaAnggota2 = $request->nama_tim.'-ANGGOTA2-OLI0'.$kode->no.'.'.$ktpAnggota2->getClientOriginalExtension();
            $ktpAnggota2->move(public_path().'/kp/', $namaAnggota2);
        } else {$namaAnggota2 = null;}

        $olim = new Olim;
        $olim->no_peserta = 'OLI0'.$kode->no;
        $olim->asal_sekolah = $request->asal_sekolah;
        $olim->asal_alamat = $request->asal_alamat;
        $olim->asal_kota = $request->asal_kota;
        $olim->nama_tim = $request->nama_tim;
        $olim->nama_ketua = $request->nama_ketua;
        $olim->hp_ketua = $request->hp_ketua;
        $olim->wa_ketua = $request->wa_ketua;
        $olim->line_ketua = $request->line_ketua;
        $olim->nama_anggota1 = $request->nama_anggota1;
        $olim->nama_anggota2 = $request->nama_anggota2;
        $olim->asal_info = $request->asal_info;
        $olim->info = $request->info;
        $olim->path_ktpketua = $namaKetua;
        $olim->path_ktpanggota1 = $namaAnggota1;
        $olim->path_ktpanggota2 = $namaAnggota2;
        $olim->userid = $userId;
        $olim->price = $currentHarga.'.'.$kode->no;
        $olim->is_submitted = true;
        $olim->save();

        User::where('id', $userId)->update(['daftar' => 1]);
        KodeBayar::where('name', 'olim')->update(['no' => $kode->no+1]);

        return redirect('/home');
    }

    /**
     * Mengambil berapa banyak promo code sudah digunakan
     * dan menset harga yang didapatkan.
     */
    // public function SetHarga($inputtedCode, $currentPrice)
    // {
    //     //total pemakaian promo code
    //     $getTotalUsage = Promo::where('kode', $inputtedCode)->get()->first();
    //     if (isset($getTotalUsage->usage)) {

    //         $getTotalUsage = $getTotalUsage->usage;

    //         //mengurangi 20k apabila pemakaian code dibaawah 5
    //         if ($getTotalUsage < 5) {
    //             $currentPrice = $currentPrice - 20;
    //         }
    //         //mengurangi 10k apabila pemakaian code dibaawah 10 & diatas 5
    //         else if ($getTotalUsage < 30) {
    //             $currentPrice = $currentPrice - 15;
    //         }
    //         else if ($getTotalUsage < 50) {
    //             $currentPrice = $currentPrice - 10;
    //         }

    //         Promo::where('kode', $inputtedCode)->update(['usage' => $getTotalUsage+1]);

    //     }
    //     return $currentPrice;
    // }

    /**
     * Checking apakah harga promo benar atau tidak
     */
    // public function CheckPromo(Request $request)
    // {
    //     $Result = Promo::where('kode', $request->promo_code)->get()->first();
    //     return response()->json(["status" => isset($Result)]);
    // }

    //first insert
    public function insertData(Request $request)
    {
        $userId = Auth::user()->id;
        $asalSekolah = $request->asal_sekolah;
        $alamatSekolah = $request->asal_alamat;
        $asalKota = $request->asal_kota;

        $olim = new Olim;
        $olim->asal_sekolah = $asalSekolah;
        $olim->asal_alamat = $alamatSekolah;
        $olim->asal_kota = $asalKota;
        $olim->userid = $userId;
        $olim->save();

        User::where('id', $userId)->update(['daftar' => 1]);
        $data = Olim::where('userid', $userId)->get(['id'])->first();

    }

    public function updateData(Request $request)
    {
        Olim::where('id', $request->id)->update([
            'asal_sekolah'=> $request->asal_sekolah,
            'asal_alamat'=> $request->asal_alamat,
            'asal_kota'=> $request->asal_kota,
            'nama_tim'=> $request->nama_tim,
            'nama_ketua'=> $request->nama_ketua,
            'hp_ketua'=> $request->hp_ketua,
            'wa_ketua'=> $request->wa_ketua,
            'line_ketua'=> $request->line_ketua,
            'nama_anggota1'=> $request->nama_anggota1,
            'nama_anggota2'=> $request->nama_anggota2,
            'asal_info'=> $request->asal_info,
            'info'=> $request->info,
        ]);
    }

    public function uploadOlim(Request $request)
    {
        if ($request->hasFile('scan_ktpketua')) {
            $ktpKetua = $request->file('scan_ktpketua');
            $ktpAnggota1 = $request->file('scan_ktpanggota1');
            $ktpAnggota2 = $request->file('scan_ktpanggota2');
            $tempKetua = Str::random(5).'.'.$ktpKetua->getClientOriginalExtension();
            $tempAnggota1 = Str::random(5).'.'.$ktpAnggota1->getClientOriginalExtension();
            $tempAnggota2 = Str::random(5).'.'.$ktpAnggota2->getClientOriginalExtension();

            Olim::where('id', $request->id)->update([
                'path_ktpketua' => $tempKetua,
                'path_ktpanggota1' => $tempAnggota1,
                'path_ktpanggota2' => $tempAnggota2,
            ]);

            $ktpKetua->move(public_path().'/temp/', $tempKetua);
            $ktpAnggota1->move(public_path().'/temp/', $tempAnggota1);
            $ktpAnggota2->move(public_path().'/temp/', $tempAnggota2);

        }
    }

    public function submitSoal(Request $request){        
        Soal::create([
            'difficulty' => $request->difficulty,
            'jenis_soal' => $request->jenis_soal,
            'text_soal' => $request->text_soal,
            'answer_soal' => $request->answer_soal,            
        ]);
        return response()->json([
            'laravel_soals' => Soal::get()                            
        ], Response::HTTP_OK); 
    }

    public function testOnline(){
        $user = Auth::user();
        $user_answer = UserAnswers::where('userid', $user->id)->get()->first();
        $user_score = Score::where('userid', $user->id)->get()->first();

        $timenow = Carbon::now('Asia/Jakarta')->toDateTime(); 
        $time_tables = TimeTables::where([
            ['start', '<=', $timenow],
            ['end', '>=', $timenow]
            ])->get()->first();      
        
        $timediff = '';

        if(isset($time_tables->end) && isset($time_tables->start)){            
            $timediff = Carbon::parse($timenow)->diffInSeconds($time_tables->end);
        }
        else{
            $timediff = null;
        }

        return view('user.testonline', ['user_answer' => $user_answer, 'user_score' => $user_score, 'timediff' => $timediff]);
    }

}
