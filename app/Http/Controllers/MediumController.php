<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medium;
use Symfony\Component\HttpFoundation\Response;

class MediumController extends Controller
{
    public function index(){                
        $data = Medium::get();
        return view('admin.medium', ['data' => $data]);
    }

    public function create(Request $request){
        // setup gambar    
        $gambar = $request->file('path_gambar');        
        $nama_gambar = $request->judul. '.' .$gambar->getClientOriginalExtension();


        $medium = new Medium;
        $medium->judul = $request->judul;
        $medium->konten = $request->konten;
        $medium->path_gambar = $nama_gambar;
        $medium->save();
        
        $gambar->move(public_path().'/medium/', $nama_gambar);
        return redirect('/mediumadmin');
    }

    public function delete(Request $request){
        // var_dump($request->kontenid);
        $medium = Medium::where('id', $request->kontenid)->get()->first();
        unlink(public_path().'/medium/'.$medium->path_gambar);
        Medium::where('id', $request->kontenid)->delete();                
        return redirect('/mediumadmin');
    }

    public function update(Request $request){
        // echo $request;

        Medium::where('id', $request->kontenid)->update([
            'judul' => $request->judul,
            'konten' => $request->konten        
        ]);

        return redirect('/mediumadmin');

    }

    public function getArticle(Request $request){        
        $judulmedium = str_replace("-", " ", $request->judul);        
        return response()->json([
            'medium' => Medium::where('judul', $judulmedium)->get()->first()
        ], Response::HTTP_OK);  
    }

    public function getDataAll(){
        return response()->json([
            'allmedium' => Medium::get()
        ], Response::HTTP_OK);  
    }
}
