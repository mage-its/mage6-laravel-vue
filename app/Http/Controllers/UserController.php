<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracsv\Export;

class UserController extends Controller
{
    public function getVerified()
    {
        $data = User::get();

        return view ('admin.user', ['data' => $data]);
    }
    public function adminDownload()
    {
        $data = User::get();
        $csv = new Export();
        $csv->build($data, [
            'id',
            'name',
            'email',
            'daftar',
            ])->download('user'.date('Y-m-d').'.csv');
    }
}
