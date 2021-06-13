<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Illuminate\Support\Facades\Auth;

class SoalsController extends Controller
{
    public function adminIndex(){
        $soals = Soal::all();

        return view('admin.soals', ['soals' => $soals]);
    }

    public function storeSoal(Request $request){
        $image_soal = $request->file('image_soal');        
        $setup_name = $request->difficulty . "-" . $request->jenis_soal . "-" . time() . "." . $image_soal->getClientOriginalExtension();

        Soal::create([
            "difficulty" => $request->difficulty,
            "jenis_soal" => $request->jenis_soal,
            "text_soal" => $request->text_soal,
            "answer_soal" => $request->answer_soal,
            "image_soal" => $setup_name,
            "status_soal" => $request->status_soal
        ]);

        $image_soal->move(public_path()."/olim/", $setup_name);

        return redirect()->back();
    }    

    public function editSoal(Request $request){
        $soalid = $request->soalid;
        if(!isset($request->image_soal)){            
            Soal::where('id', $soalid)->update([
                "difficulty" => $request->difficulty,
                "jenis_soal" => $request->jenis_soal,
                "text_soal" => $request->text_soal,
                "answer_soal" => $request->answer_soal,
                "status_soal" => $request->status_soal
            ]);

            return redirect()->back();
        }
        elseif(isset($request->image_soal)){
            $prev_soal = Soal::where('id', $soalid)->get('image_soal')->first();
            unlink(public_path()."/olim/".$prev_soal->image_soal);            
            
            $image_soal = $request->file('image_soal');

            Soal::where('id', $soalid)->update([
                "difficulty" => $request->difficulty,
                "jenis_soal" => $request->jenis_soal,
                "text_soal" => $request->text_soal,
                "answer_soal" => $request->answer_soal,
                "image_soal" => $prev_soal->image_soal,
                "status_soal" => $request->status_soal
            ]);

            $image_soal->move(public_path()."/olim/", $prev_soal->image_soal);

            return redirect()->back();
        }

    }

    public function deleteSoal(Request $request){
        // echo $request;
        $prev_soal = Soal::where('id', $request->soalid)->get('image_soal')->first();
        
        Soal::where('id', $request->soalid)->delete();

        unlink(public_path()."/olim/".$prev_soal->image_soal);   
        return redirect()->back();
    }

    public function previewSoal(Request $request){
        if(!isset($request->id)){
            return redirect('/soals');
        }

        $soal = Soal::where('id', $request->id)->get()->first();

        // if($soal === null){
        //     return view('admin.previewsoal', ["soal" => $soal]);
        // }

        $param = $request->id;

        return view('admin.previewsoal', ["soal" => $soal, "param" => $param]);
    }
}
