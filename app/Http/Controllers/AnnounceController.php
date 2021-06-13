<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pengumuman;
use Laracsv\Export;

class AnnounceController extends Controller
{
    //
    public function index() {
        $data = Pengumuman::get();
        
        return view('admin.announce', ['data' => $data]);
    }

    //download CSV
    public function download()
    {
        $data = User::get();
        $csv = new Export();
        $csv->build($data, [
            'id',
            'start',
            'end',
            'type',
            'data'
            ])->download('announce'.date('Y-m-d').'.csv');
    }

}
