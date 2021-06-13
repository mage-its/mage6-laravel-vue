<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Esports;
use Illuminate\Support\Facades\Auth;
use App\KodeBayar;
use App\User;
use Laracsv\Export;

class EsportController extends Controller
{
    // return all submitted peserta
    public function index()
    {
        $peserta = Esports::select('users.email','users.id', 'userid', 'no_peserta', 'cabang_lomba',
        'asal_kota', 'nama_tim', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'id_ketua',
        'nama_anggota1', 'id_anggota1',
        'nama_anggota2', 'id_anggota2',
        'nama_anggota3', 'id_anggota3',
        'nama_anggota4', 'id_anggota4',
        'nama_cadangan', 'id_cadangan',
        'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota2', 'path_ktpanggota3',
        'path_ktpanggota4', 'path_ktpcadangan',
        'path_buktibayar',
        'path_ssketua', 'path_ssanggota1', 'path_ssanggota2', 'path_ssanggota3',
        'path_ssanggota4', 'path_sscadangan',
        'nama_bayar', 'price', 'esport.updated_at', 'asal_info', 'status')
        ->join('users', 'users.id','=', 'esport.userid' )
        ->where('is_submitted',true)->orderBy('no_peserta', 'ASC')->get();

        return view('admin.daftaresports', ['peserta' => $peserta]);
    }

    // delete peserta
    public function hapus(Request $request)
    {
        $timId = $request->timId;

        $data = Esports::where('userid', $timId)->get()->first();        
        // echo($data);
        User::where('id', $data->userid)->update(['daftar' => null]);
        Esports::where('userid', $timId)->delete();

        return redirect("/daftaresport");
    }

    //download CSV
    public function adminDownload()
    {
        $data = Esports::select('users.email','users.id', 'userid', 'no_peserta', 'cabang_lomba',
        'asal_kota', 'nama_tim', 'nama_ketua', 'hp_ketua', 'wa_ketua', 'line_ketua', 'id_ketua',
        'nama_anggota1', 'id_anggota1',
        'nama_anggota2', 'id_anggota2',
        'nama_anggota3', 'id_anggota3',
        'nama_anggota4', 'id_anggota4',
        'nama_cadangan', 'id_cadangan',
        'path_ktpketua', 'path_ktpanggota1', 'path_ktpanggota3',
        'path_ktpanggota4', 'path_ktpcadangan',
        'path_buktibayar',
        'path_ssketua', 'path_ssanggota1', 'path_ssanggota3',
        'path_ssanggota4', 'path_sscadangan',
        'nama_bayar', 'price', 'esport.updated_at', 'asal_info', 'info')
        ->join('users', 'users.id','=', 'esport.userid' )
        ->where('is_submitted',true)->orderBy('no_peserta', 'ASC')->get();
        $csv = new Export();
        $csv->build($data, [
            'no_peserta',
            'email',
            'cabang_lomba',
            'asal_kota',
            'nama_tim',
            'nama_ketua',
            'hp_ketua',
            'wa_ketua',
            'line_ketua',
            'id_ketua',
            'nama_anggota1',
            'id_anggota1',
            'nama_anggota2',
            'id_anggota2',
            'nama_anggota3',
            'id_anggota3',
            'nama_anggota4',
            'id_anggota4',
            'nama_cadangan',
            'id_cadangan',
            'asal_info',
            'info',
            'nama_bayar',
            'price',
            'status'
            ])->download('esport'.date('Y-m-d').'.csv');
    }

    //verif peserta
    public function toggleVerif(Request $request)
    {
        $timId = $request->timId;        
        $status = Esports::where('userid', $timId)->get(['status'])->first(); //get user verif status
        if ($status->status == false) {
            Esports::where('userid', $timId)->update(['status' => true, 'no_peserta' => $request->noPeserta]);
        } else {
            Esports::where('userid', $timId)->update(['status' => false]);
        }
        return redirect("/daftaresport");
    }

    //udpate data peserta
    public function update(Request $request)
    {
        Esports::where('id', $request->timId)->update([
            'no_peserta'=>$request->no_peserta,
            'cabang_lomba' => $request->cabang_lomba,
            'asal_kota'=>$request->asal_kota,
            'nama_tim'=>$request->nama_tim,
            'nama_ketua'=>$request->nama_ketua,
            'hp_ketua'=>$request->hp_ketua,
            'wa_ketua'=>$request->wa_ketua,
            'line_ketua'=>$request->line_ketua,
            'id_ketua'=>$request->id_ketua,
            'nama_anggota1'=>$request->nama_anggota1,
            'id_anggota1'=>$request->id_anggota1,
            'nama_anggota2'=>$request->nama_anggota2,
            'id_anggota2'=>$request->id_anggota2,
            'nama_anggota3'=>$request->nama_anggota3,
            'id_anggota3'=>$request->id_anggota3,
            'nama_anggota4'=>$request->nama_anggota4,
            'id_anggota4'=>$request->id_anggota4,
            'nama_cadangan'=>$request->nama_cadangan,
            'id_cadangan'=>$request->id_cadangan,
        ]);

        return redirect("/daftaresport");
    }

    //User Function
    public function userIndex()
    {
        // $user =  Auth::user();
        // $data = Esports::where('userid', $user->id)->get()->first();
        // return view('user.esport', ['user' => $user->name, 'data' => $data, 'id' => $user->id]);
        return redirect('/closed');
    }

    public function submit(Request $request)
    {
        $userId = Auth::user()->id;
        $cabang = '';
        $prefix= '';
        switch($request->cabang_lomba) {
            case 2: $cabang = 'dota'; $prefix = 'EDM0'; break;
            case 3: $cabang = 'csgo'; $prefix = 'ECM0'; break;
            case 4: $cabang = 'ml'; $prefix = 'ESM0'; break;
        }
        $kode = KodeBayar::where('name', $cabang)->get()->first();
        $ktpKetua = $request->file('scan_ktpketua');
        $ssKetua = $request->file('scan_ssketua');
        $ktpAnggota1 = $request->file('scan_ktpanggota1');
        $ssAnggota1 = $request->file('scan_ssanggota1');
        $ktpAnggota2 = $request->file('scan_ktpanggota2');
        $ssAnggota2 = $request->file('scan_ssanggota2');
        $ktpAnggota3 = $request->file('scan_ktpanggota3');
        $ssAnggota3 = $request->file('scan_ssanggota3');
        $ktpAnggota4 = $request->file('scan_ktpanggota4');
        $ssAnggota4 = $request->file('scan_ssanggota4');
        $ktpCadangan = $request->file('scan_ktpcadangan');
        $ssCadangan = $request->file('scan_sscadangan');

        
        $namaKetua = $request->nama_tim.'-KETUA-'.$prefix.$kode->no.'.'.$ktpKetua->getClientOriginalExtension();
        // var_dump($namaKetua);
        $namaAnggota1 = $request->nama_tim.'-ANGGOTA1-'.$prefix.$kode->no.'.'.$ktpAnggota1->getClientOriginalExtension();
        $namaAnggota2 = $request->nama_tim.'-ANGGOTA2-'.$prefix.$kode->no.'.'.$ktpAnggota2->getClientOriginalExtension();
        $namaAnggota3 = $request->nama_tim.'-ANGGOTA3-'.$prefix.$kode->no.'.'.$ktpAnggota3->getClientOriginalExtension();
        $namaAnggota4 = $request->nama_tim.'-ANGGOTA4-'.$prefix.$kode->no.'.'.$ktpAnggota4->getClientOriginalExtension();
        $namaCadangan = $request->nama_tim.'-CADANGAN-'.$prefix.$kode->no.'.'.$ktpCadangan->getClientOriginalExtension();

        $namaKetua1 = $request->nama_tim.'-KETUA-'.$prefix.$kode->no.'.'.$ssKetua->getClientOriginalExtension();
        $namaAnggota11 = $request->nama_tim.'-ANGGOTA1-'.$prefix.$kode->no.'.'.$ssAnggota1->getClientOriginalExtension();
        $namaAnggota21 = $request->nama_tim.'-ANGGOTA2-'.$prefix.$kode->no.'.'.$ssAnggota2->getClientOriginalExtension();
        $namaAnggota31 = $request->nama_tim.'-ANGGOTA3-'.$prefix.$kode->no.'.'.$ssAnggota3->getClientOriginalExtension();
        $namaAnggota41 = $request->nama_tim.'-ANGGOTA4-'.$prefix.$kode->no.'.'.$ssAnggota4->getClientOriginalExtension();
        $namaCadangan1= $request->nama_tim.'-CADANGAN-'.$prefix.$kode->no.'.'.$ssCadangan->getClientOriginalExtension();

        $esport = new Esports;
        $esport->no_peserta = $prefix.str_pad($kode->no, 3, '0', STR_PAD_LEFT);
        $esport->cabang_lomba = $request->cabang_lomba;
        $esport->asal_kota = $request->asal_kota;
        $esport->nama_tim = $request->nama_tim;
        $esport->nama_ketua = $request->nama_ketua;
        $esport->hp_ketua = $request->hp_ketua;
        $esport->wa_ketua = $request->wa_ketua;
        $esport->line_ketua = $request->line_ketua;
        $esport->id_ketua = $request->id_ketua;
        $esport->nama_anggota1 = $request->nama_anggota1;
        $esport->id_anggota1 = $request->id_anggota1;
        $esport->nama_anggota2 = $request->nama_anggota2;
        $esport->id_anggota2 = $request->id_anggota2;
        $esport->nama_anggota3 = $request->nama_anggota3;
        $esport->id_anggota3 = $request->id_anggota3;
        $esport->nama_anggota4 = $request->nama_anggota4;
        $esport->id_anggota4 = $request->id_anggota4;
        $esport->nama_cadangan = $request->nama_cadangan;
        $esport->id_cadangan = $request->id_cadangan;
        $esport->asal_info = $request->asal_info;
        $esport->info = $request->info;
        $esport->path_ktpketua = $namaKetua;
        $esport->path_ktpanggota1 = $namaAnggota1;
        $esport->path_ktpanggota2 = $namaAnggota2;
        $esport->path_ktpanggota3 = $namaAnggota3;
        $esport->path_ktpanggota4 = $namaAnggota4;
        $esport->path_ktpcadangan = $namaCadangan;
        $esport->path_ssketua = $namaKetua1;
        $esport->path_ssanggota1 = $namaAnggota11;
        $esport->path_ssanggota2 = $namaAnggota21;
        $esport->path_ssanggota3 = $namaAnggota31;
        $esport->path_ssanggota4 = $namaAnggota41;
        $esport->path_sscadangan = $namaCadangan1;
        $esport->userid = $userId;
        $esport->price = $kode->price.'.'.str_pad($kode->no, 3, '0', STR_PAD_LEFT);
        $esport->is_submitted = true;
        $esport->save();

        User::where('id', $userId)->update(['daftar' => 3]);
        KodeBayar::where('name', $cabang)->update(['no' => $kode->no+1]);

        $ktpKetua->move(public_path().'/kp/', $namaKetua);
        $ktpAnggota1->move(public_path().'/kp/', $namaAnggota1);
        $ktpAnggota2->move(public_path().'/kp/', $namaAnggota2);
        $ktpAnggota3->move(public_path().'/kp/', $namaAnggota3);
        $ktpAnggota4->move(public_path().'/kp/', $namaAnggota4);
        $ktpCadangan->move(public_path().'/kp/', $namaCadangan);

        $ssKetua->move(public_path().'/sa/', $namaKetua1);
        $ssAnggota1->move(public_path().'/sa/', $namaAnggota11);
        $ssAnggota2->move(public_path().'/sa/', $namaAnggota21);
        $ssAnggota3->move(public_path().'/sa/', $namaAnggota31);
        $ssAnggota4->move(public_path().'/sa/', $namaAnggota41);
        $ssCadangan->move(public_path().'/sa/', $namaCadangan1);

        return redirect('/home');
    }
}
