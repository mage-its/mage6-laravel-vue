<?php

namespace App\Http\Controllers;

use App\Devcom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KodeBayar;
use App\User;
use Laracsv\Export;

class DevcomController extends Controller
{
    public function userIndex()
    {
        //normal (open registration)
        $user =  Auth::user();
        $data = Devcom::where('userid', $user->id)->get()->first();
        return view('user.devcomp', ['user' => $user->name, 'data' => $data, 'id' => $user->id]);


        // close registration
        return "closed";
    }

    //download CSV
    public function adminDownload()
    {
        $data = Devcom::orderBy('no_peserta', "ASC")->get();
        $data = Devcom::select('users.email','users.id', 'userid', 'no_peserta', 'kat', 'cabang_lomba',
        'asal_perguruan', 'asal_alamat', 'asal_kota', 'nama_tim', 'nama_pembimbing', 'hp_pembimbing',
        'wa_pembimbing', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'nama_anggota1',
        'nama_anggota2', 'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota2', 'path_buktibayar','status',
        'path_abstrak', 'path_proposal', 'link_karya', 'nama_bayar', 'price', 'tahap', 'dev_com.updated_at', 'asal_info', 'info')
        ->join('users', 'users.id','=', 'dev_com.userid' )
        ->orderBy('no_peserta', 'ASC')
        ->get();

        $csv = new Export();
        $csv->build($data, [
            'no_peserta',
            'email',
            'kat',
            'cabang_lomba',
            'asal_perguruan',
            'asal_alamat',
            'asal_kota',
            'nama_tim',
            'nama_pembimbing',
            'hp_pembimbing',
            'wa_pembimbing',
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
            'status',
            'tahap',
            'link_karya'
            ])->download('devcomp'.date('Y-m-d').'.csv');
    }

    public function submit(Request $request){
        $userId = Auth::user()->id;
        $cabang = '';
        $prefix = '';
        // echo $request->nama_tim;
        // echo $request->kat;
        // echo $request->cabang_lomba;
        switch($request->kat) {
            case 1:
                switch($request->cabang_lomba) {
                    case 1: $cabang = 'gdevm'; $prefix= 'DCG1'; break;
                    case 2: $cabang = 'adevm'; $prefix= 'DCA1'; break;
                    case 3: $cabang = 'idevm'; $prefix= 'DCI1'; break;
                }
            break;
            case 2:
                switch($request->cabang_lomba) {
                    case 1: $cabang = 'gdevs'; $prefix= 'DCG0'; break;
                    case 2: $cabang = 'adevs'; $prefix= 'DCA0'; break;
                }
            break;
        }
        // echo $cabang;
        $kode = KodeBayar::where('name', $cabang)->get()->first();
        $ktpKetua = $request->file('scan_ktpketua');
        $ktpAnggota1 = $request->file('scan_ktpanggota1');
        $ktpAnggota2 = $request->file('scan_ktpanggota2');
        $namaKetua = $request->nama_tim.'-KETUA-'.$prefix.$kode->no.'.'.$ktpKetua->getClientOriginalExtension();
        $namaAnggota1 = $request->nama_tim.'-ANGGOTA1-'.$prefix.$kode->no.'.'.$ktpAnggota1->getClientOriginalExtension();
        $namaAnggota2 = $request->nama_tim.'-ANGGOTA2-'.$prefix.$kode->no.'.'.$ktpAnggota2->getClientOriginalExtension();

        $mainComp = new Devcom;
        $mainComp->no_peserta = $prefix.str_pad($kode->no, 3, '0', STR_PAD_LEFT);

        if (!isset($request->kat)) {
            $mainComp->kat = 1;
        } else {
        $mainComp->kat = $request->kat;
        }

        $mainComp->cabang_lomba = $request->cabang_lomba;
        $mainComp->asal_perguruan = $request->asal_perguruan;
        $mainComp->asal_alamat = $request->asal_alamat;
        $mainComp->asal_kota = $request->asal_kota;
        $mainComp->nama_tim = $request->nama_tim;
        $mainComp->nama_pembimbing = $request->nama_pembimbing;
        $mainComp->hp_pembimbing = $request->hp_pembimbing;
        $mainComp->wa_pembimbing = $request->wa_pembimbing;
        $mainComp->nama_ketua = $request->nama_ketua;
        $mainComp->hp_ketua = $request->hp_ketua;
        $mainComp->wa_ketua = $request->wa_ketua;
        $mainComp->line_ketua = $request->line_ketua;
        $mainComp->nama_anggota1 = $request->nama_anggota1;
        $mainComp->nama_anggota2 = $request->nama_anggota2;
        $mainComp->asal_info = $request->asal_info;
        $mainComp->info = $request->info;
        $mainComp->path_ktpketua = $namaKetua;
        $mainComp->path_ktpanggota1 = $namaAnggota1;
        $mainComp->path_ktpanggota2 = $namaAnggota2;
        $mainComp->userid = $userId;
        $mainComp->price = $kode->price.'.'.str_pad($kode->no, 3, '0', STR_PAD_LEFT);
        $mainComp->is_submitted = true;
        $mainComp->save();

        User::where('id', $userId)->update(['daftar' => 2]);
        KodeBayar::where('name', $cabang)->update(['no' => $kode->no+1]);

        $ktpKetua->move(public_path().'/kp/', $namaKetua);
        $ktpAnggota1->move(public_path().'/kp/', $namaAnggota1);
        $ktpAnggota2->move(public_path().'/kp/', $namaAnggota2);
        return redirect('/home');
    }

    //upload proposal
    public function uploadDev(Request $request) {
        $file = $request->file('file_proposal');
        $tim = Devcom::where('id', $request->data_id)->get()->first(); //get id tim
        $uniqueTime = time() - strtotime("today");


        //setup nama file
        $name = $tim->nama_tim.'-'.$tim->no_peserta.'-'.$uniqueTime.'.'.$file->getClientOriginalExtension();

        if (isset($tim->path_proposal)) {
            unlink(public_path().'/abstrak/'.$tim->path_proposal);
        }

        Devcom::where('id', $request->data_id)->update([
            'path_proposal' => $name,
            // 'link_poster' => $request->link_poster,
            'sudah_upload' => true
            // 'status_bayar' => true,
        ]);

        //delete files if exists
        $file->move(public_path().'/abstrak/', $name);

        return redirect('/home');
    }

    public function uploadDev2(Request $request){
        $link_karyadanvideo = $request->link_karyadanvideo;

        Devcom::where('id', $request->data_id)->update([
            'link_karya' => $link_karyadanvideo
        ]);

        return redirect('/submission');
        return redirect('/closed');
    }

    // ADMIN FUNCTION

    public function adminIndex(){
        $peserta = Devcom::select('users.email','users.id', 'userid', 'no_peserta', 'kat', 'cabang_lomba',
        'asal_perguruan', 'asal_alamat', 'asal_kota', 'nama_tim', 'nama_pembimbing', 'hp_pembimbing',
        'wa_pembimbing', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'nama_anggota1',
        'nama_anggota2', 'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota2', 'path_buktibayar',
        'path_abstrak', 'path_proposal', 'link_karya', 'link_video','nama_bayar', 'price', 'tahap', 'dev_com.updated_at', 'asal_info', 'info','status')
        ->join('users', 'users.id','=', 'dev_com.userid' )
        ->where('is_submitted',true)->orderBy('no_peserta', 'ASC')->get();

        return view('admin.daftardevcom', ['peserta' => $peserta]);
    }

    //verif peserta
    public function adminVerif(Request $request)
    {
        $timId = $request->timId;
        $status = Devcom::where('userid', $timId)->get(['status'])->first(); //get user verif status
        // var_dump($status);
        if ($status->status == false) {
            Devcom::where('userid', $timId)->update(['status' => true, 'no_peserta' => $request->noPeserta]);
        } else {
            Devcom::where('userid', $timId)->update(['status' => false]);
        }
        return redirect()->back();
    }

    public function adminHapus(Request $request)
    {
        $timId = $request->timId;

        $data = Devcom::where('userid', $timId)->get()->first();
        // echo($data);
        User::where('id', $data->userid)->update(['daftar' => null]);
        Devcom::where('userid', $timId)->delete();

        return redirect("/daftardevcom");
    }

    public function adminUpdate(Request $request)
    {
        Devcom::where('userid', $request->timId)->update([
            'no_peserta'=>$request->no_peserta,
            'kat' => $request->kat,
            'cabang_lomba' => $request->cabang_lomba,
            'asal_perguruan'=>$request->asal_perguruan,
            'asal_alamat'=>$request->asal_alamat,
            'asal_kota'=>$request->asal_kota,
            'nama_tim'=>$request->nama_tim,
            'nama_pembimbing'=>$request->nama_pembimbing,
            'hp_pembimbing'=>$request->hp_pembimbing,
            'wa_pembimbing'=>$request->wa_pembimbing,
            'nama_ketua'=>$request->nama_ketua,
            'hp_ketua'=>$request->hp_ketua,
            'wa_ketua'=>$request->wa_ketua,
            'line_ketua'=>$request->line_ketua,
            'nama_anggota1'=>$request->nama_anggota1,
            'nama_anggota2'=>$request->nama_anggota2,
            'tahap' => $request->tahap
        ]);

        return redirect()->back();
    }

}
