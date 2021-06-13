<?php

namespace App\Http\Controllers;

use App\Olim;
use App\Soal;
use App\Score;
use App\UserAnswers;
use App\TimeTables;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAnswersController extends Controller
{
    public function getAllSoals(){
        $user = Auth::user();        
        $usersoals = UserAnswers::where('userid', $user->id)->get();
        $userscore = Score::where('userid', $user->id)->get('score')->first();
        
        // setup timediff
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
            return redirect('/closed');
        }
        
        return response()->json(["usersoals" => $usersoals, "userscore" => $userscore, "timediff" => $timediff], Response::HTTP_OK);
    }
    public function getOneSoal(Request $request){
        $user = Auth::user();
        $usersoal = UserAnswers::select('soals.difficulty', 'soals.text_soal', 'soals.jenis_soal', 'soals.image_soal', 'userid', 'correct', 'last_answer')
        ->join('soals', 'soals.id', '=', 'user_answers.soalid')        
        ->where([
            'userid' => $user->id,
            'no_soal' => $request->soalnumber
        ])->get()->first();

        // $key_answer = UserAnswers::select('soals.answer_soal')
        // ->join('soals', 'soals.id', '=', 'user_answers.soalid')        
        // ->where([
        //     'userid' => $user->id,
        //     'no_soal' => 1
        // ])->get()->first();

        // echo $key_answer;
        
        // echo $usersoal; 
        $timenow = Carbon::now('Asia/Jakarta')->toDateTime(); 
        $time_tables = TimeTables::where([
                                    ['start', '<=', $timenow],
                                    ['end', '>=', $timenow]
                                    ])->get()->first();     

        // setup timediff
        // $timediffwithstart = Carbon::parse($time_tables->start)->diffInSeconds($timenow);
        // $timediffwithend = Carbon::parse($timenow)->diffInSeconds($time_tables->end);
            $timediff = '';

        if(isset($time_tables->end) && isset($time_tables->start)){
            $timediff = Carbon::parse($timenow)->diffInSeconds($time_tables->end);
        }
        else{            
            return response()->json(["closed" => 1], Response::HTTP_OK);
        }        

        $userscore = Score::where('userid', $user->id)->get('score')->first();
        $user_answer = UserAnswers::where('userid', $user->id)->where('no_soal', $request->soalnumber)->get()->first();
        if($user_answer->status == "locked" || $user_answer->status == "semi_unlocked"){
            // echo "pass";
            return response()->json(["soal_locked" => 1], Response::HTTP_OK);
            // return redirect('/gamenetwork');
        }
        // echo "pass";
        return response()->json(["usersoal" => $usersoal,
                                "userscore" => $userscore,
                                "timediff" => $timediff], 
                                Response::HTTP_OK);
    }

    public function submitAnswer(Request $request){
        $user = Auth::user();
        $no_soal = $request->no_soal;
        $jawaban = $request->jawaban;
        $hash_connecting_node = $request->hash_connecting;
        $connecting_node_salt = base64_decode($hash_connecting_node);
        $connecting_node = str_replace("divcontainercard__mage", "", $connecting_node_salt);
        $array_connecting_node = explode(",", $connecting_node);

        $key_answer = UserAnswers::select('soals.answer_soal')
        ->join('soals', 'soals.id', '=', 'user_answers.soalid')        
        ->where([
            'userid' => $user->id,
            'no_soal' => $request->no_soal
        ])->get()->first();        

        $int_nosoal = (int)$no_soal;
        // return response()->json(["test" => is_int(76)], Response::HTTP_OK);  

        if($jawaban === $key_answer->answer_soal){
            $score = '';
            $status = '';
                                   
            if($int_nosoal != 76){            
                foreach ($array_connecting_node as $node) { 
                    UserAnswers::where([
                        'status' => 'locked',
                        'no_soal' => $node,
                        'userid' => $user->id
                    ])->update(['status' => 'semi_unlocked']);
                }            
            }
            // return response()->json(["test" => $no_soal], Response::HTTP_OK);                                                       

            switch (true) {
                case $no_soal >= 1 && $no_soal <= 15:
                    $score = 5;
                    $status = 'done_white';
                    break;                          
                case $no_soal >= 16 && $no_soal <= 45:
                    $score = 10;
                    $status = 'done_blue';
                    break;                          
                case $no_soal >= 46 && $no_soal <= 57:                    
                    $score = 20;
                    $status = 'done_yellow_1';
                    break;
                case $no_soal >= 58 && $no_soal <= 66:                    
                    $score = 20;
                    $status = 'done_yellow_2';
                    break;                
                case $no_soal >= 67 && $no_soal <= 72:                    
                    $score = 30;
                    $status = 'done_red_1';
                    break;
                case $no_soal >= 73 && $no_soal <= 75:                    
                    $score = 30;
                    $status = 'done_red_2';
                    break;
                case $no_soal == 76:                    
                    $score = 0;
                    $status = 'done_king';
                    break;   
            }

            UserAnswers::where([
                'userid' => $user->id,
                'no_soal' => $no_soal,
                'userid' => $user->id
            ])->update(['correct' => 1, 'last_answer' => $jawaban, 'status' => $status]);

            // return response()->json(["test" => $score], Response::HTTP_OK);                               

            $getscore = Score::where([
                'userid' => $user->id,
                'tahap' => 'penyisihan'])->get('score')->first();

            Score::where([
                'userid' => $user->id,
                'tahap' => 'penyisihan'])
                ->update([
                    'score' => $getscore->score + $score
                ]);

            return response()->json([
                "correct" => 1                
            ], Response::HTTP_OK);
        }
        else{
            UserAnswers::where([
                'userid' => $user->id,
                'no_soal' => $no_soal
            ])->update(['last_answer' => $jawaban]);

            return response()->json([
                "correct" => 0                
            ], Response::HTTP_OK);
        }

    }

    public function unlockNode(Request $request){
        $user = Auth::user();
        $no_soal = $request->no_soal;
        $status = '';
        $harga = '';
        $node_before_king = UserAnswers::whereIn('no_soal', array(73, 74, 75))->get('correct');        

        $getscore = Score::where([
            'userid' => $user->id,
            'tahap' => 'penyisihan'])->get('score')->first();
        
        switch (true) {
            case $no_soal >= 16 && $no_soal <= 45:
                $status = "unlocked_blue";
                $harga = 5;
                break;                          
            case $no_soal >= 46 && $no_soal <= 57:
                $status = "unlocked_yellow_1";
                $harga = 12;
                break;
            case $no_soal >= 58 && $no_soal <= 66:
                $status = "unlocked_yellow_2";
                $harga = 12;
                break;
            case $no_soal >= 67 && $no_soal <= 72:
                $status = "unlocked_red_1";
                $harga = 20;
                break;
            case $no_soal >= 73 && $no_soal <= 75:
                $status = "unlocked_red_2";
                $harga = 20;
                break;
            case $no_soal === 76:
                if($node_before_king[0]->correct == 1 && $node_before_king[1]->correct == 1 && $node_before_king[2]->correct == 1 && $getscore->score >= 419){
                    $status = "unlocked_king";
                    $harga = 0;
                }
                else{                    
                    return response()->json([
                        "success" => 0
                    ], Response::HTTP_OK);
                }
                break;                                    
        }

        $getscore = Score::where([
            'userid' => $user->id,
            'tahap' => 'penyisihan'])->get('score')->first();

        $updatestatus = UserAnswers::where([
            'userid' => $user->id,
            'no_soal' => $no_soal
        ])->update([
            'status' => $status
        ]);

        $updatescore = Score::where([
            'userid' => $user->id,
            'tahap' => 'penyisihan'
        ])->update([
            "score" => $getscore->score - $harga
        ]);

        if(!$updatestatus || !$updatescore || !$getscore){
            return response()->json([
                "success" => 0                               
            ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                "success" => 1                
            ], Response::HTTP_OK);
        }

        // return response()->json( $no_soal, Response::HTTP_OK);
    }

    public function test(){
        $random_soal = Soal::where("difficulty", "easy")->where("jenis_soal", "program")->inRandomOrder()->limit(5)->get("id");
        echo $random_soal;
    }

    public function generateAllSoals(){
                                
        // foreach($all_soal_id as $item){
        //     echo $item;
        //     echo "<br/>";
        // }        
        $peserta_olim = Olim::where('status', true)->get();
        foreach($peserta_olim as $peserta){
            // check if soal already generated

            $datasoal = UserAnswers::where('userid', $peserta->userid)->get()->first();            
            if($datasoal !== NULL){   
                // echo $datasoal;
                echo "<br/>";
                echo "<br/>";                                             
                echo "Soal TIm " . $peserta->nama_tim . " sudah tergenerate <br/>";
            }
            else{                
                // foreach($all_soal_id as $soal){
                //     echo $soal;
                //     echo "<br/>";
                // }
                // soal program        
                $program_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "program")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(15)->get('id');
                $program_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "program")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(7)->get('id');
                $program_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "program")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(3)->get('id');
                // soal logika        
                $logika_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "logika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(15)->get('id');
                $logika_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "logika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(7)->get('id');
                $logika_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "logika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(3)->get('id');
                // soal fisika        
                $fisika_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "fisika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(15)->get('id');
                $fisika_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "fisika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(7)->get('id');
                $fisika_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "fisika")->where('status_soal', 'ujicoba')->inRandomOrder()->limit(3)->get('id');
                // soal king
                $king = Soal::where("difficulty", "king")->where("jenis_soal", "program")->where('status_soal', 'ujicoba')->get('id')->first();
                // get user                                
                $all_soal_id = [];

                // echo $king->id;
                $i = 1;        

                // echo $fisika_normal[5]->id;

                while ($i <= 76) {
                    // echo $i;
                    // echo "<br/>";                         
    
                    switch (true) {                
                        case $i >= 1 && $i <= 5:                    
                            for($j = 0; $j < 5; $j++){
                                array_push($all_soal_id, $logika_easy[$j]->id);
                                $i++;
                            }
                            break;
    
                        case $i >= 6 && $i <= 10:
                            // echo "fisika farming adalah " . $fisika_farming[$i]->id;
                            // echo "<br/>";
                            for($j = 0; $j < 5; $j++){
                                array_push($all_soal_id, $fisika_easy[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 11 && $i <= 15:
                            for($j = 0; $j < 5; $j++){
                                array_push($all_soal_id, $program_easy[$j]->id);
                                $i++;
                            }
                            break;
    
                        case $i >= 16 && $i <= 20:
                            for($j = 5; $j < 10; $j++){
                                array_push($all_soal_id, $logika_easy[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 21 && $i <= 25:
                            for($j = 5; $j < 10; $j++){
                                array_push($all_soal_id, $fisika_easy[$j]->id);
                                $i++;
                            }
                            break;
                        case $i >= 26 && $i <= 30:
                            for($j = 5; $j < 10; $j++){
                                array_push($all_soal_id, $program_easy[$j]->id);
                                $i++;
                            }
                            break;            
                        case $i >= 31 && $i <= 35:
                            for($j = 10; $j < 15; $j++){
                                array_push($all_soal_id, $logika_easy[$j]->id);
                                $i++;
                            }
                            break;
                        case $i >= 36 && $i <= 40:
                            for($j = 10; $j < 15; $j++){
                                array_push($all_soal_id, $fisika_easy[$j]->id);
                                $i++;
                            }
                            break;
                        case $i >= 41 && $i <= 45:
                            for($j = 10; $j < 15; $j++){
                                array_push($all_soal_id, $program_easy[$j]->id);
                                $i++;
                            }
                            break;            
                        
                        case $i >= 46 && $i <= 49:
                            for($j = 0; $j < 4; $j++){
                                array_push($all_soal_id, $logika_normal[$j]->id);
                                $i++;
                            }
                            break;
    
                        case $i >= 50 && $i <= 53:
                            for($j = 0; $j < 4; $j++){
                                array_push($all_soal_id, $fisika_normal[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 54 && $i <= 57:
                            for($j = 0; $j < 4; $j++){
                                array_push($all_soal_id, $program_normal[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 58 && $i <= 60:
                            for($j = 4; $j < 7; $j++){
                                array_push($all_soal_id, $logika_normal[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 61 && $i <= 63:
                            for($j = 4; $j < 7; $j++){
                                array_push($all_soal_id, $fisika_normal[$j]->id);
                                $i++;
                            }
                            break;
    
                        case $i >= 64 && $i <= 66:
                            for($j = 4; $j < 7; $j++){
                                array_push($all_soal_id, $program_normal[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 67 && $i <= 68:
                            for($j = 0; $j < 2; $j++){
                                array_push($all_soal_id, $logika_hard[$j]->id);
                                $i++;
                            }
                            break;
    
                        case $i >= 69 && $i <= 70:
                            for($j = 0; $j < 2; $j++){
                                array_push($all_soal_id, $fisika_hard[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i >= 71 && $i <= 72:
                            for($j = 0; $j < 2; $j++){
                                array_push($all_soal_id, $program_hard[$j]->id);
                                $i++;
                            }
                            break;
                        
                        case $i === 73:                    
                            array_push($all_soal_id, $logika_hard[2]->id);                    
                            $i++;
                            break;
                        
                        case $i === 74:                    
                            array_push($all_soal_id, $fisika_hard[2]->id);                    
                            $i++;
                            break;
    
                        case $i === 75:                    
                            array_push($all_soal_id, $program_hard[2]->id);                    
                            $i++;
                            break;
    
                        case $i === 76:                    
                            array_push($all_soal_id, $king->id);                    
                            $i++;
                            break;
                    }
                }


                // foreach($all_soal_id as $soal){
                //     echo "soal id untuk user ". $peserta->userid . " adalah " . $soal;
                //     echo "<br/>";
                // }

                for($i = 1; $i <= 76; $i++){
                    if($i >= 1 && $i<= 15){
                        UserAnswers::create([
                            'no_soal' => $i,
                            'soalid' => $all_soal_id[$i - 1],
                            'userid' => $peserta->userid,
                            'status' => 'unlocked'
                        ]);
                    }
                    else{
                        UserAnswers::create([
                            'no_soal' => $i,
                            'soalid' => $all_soal_id[$i - 1],
                            'userid' => $peserta->userid
                        ]);
                    }                    
                }
                // "Soal TIm " . $peserta->nama_tim . " berhasil tergenerate <br/>";
            }                        
        }                   
    }

    public function generateSoalById(Request $request){
        $tim_id = $request->tim_id;

        $peserta_olim = Olim::where('status', true)->where('id', $tim_id)->get()->first();
        $datasoal = UserAnswers::where('userid', $peserta_olim->userid)->get()->first();
        // echo $datasoal;
        if($datasoal !== NULL){   
            // echo $datasoal;            
            return "Soal " . $peserta_olim->nama_tim . " sudah tergenerate <br/>";
        }
        else{                
            // foreach($all_soal_id as $soal){
            //     echo $soal;
            //     echo "<br/>";
            // }
            // soal program        
            $program_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "program")->where('status_soal', 'asli')->inRandomOrder()->limit(15)->get('id');
            $program_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "program")->where('status_soal', 'asli')->inRandomOrder()->limit(7)->get('id');
            $program_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "program")->where('status_soal', 'asli')->inRandomOrder()->limit(3)->get('id');
            // soal logika        
            $logika_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "logika")->where('status_soal', 'asli')->inRandomOrder()->limit(15)->get('id');
            $logika_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "logika")->where('status_soal', 'asli')->inRandomOrder()->limit(7)->get('id');
            $logika_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "logika")->where('status_soal', 'asli')->inRandomOrder()->limit(3)->get('id');
            // soal fisika        
            $fisika_easy = Soal::where("difficulty", "easy")->where("jenis_soal", "fisika")->where('status_soal', 'asli')->inRandomOrder()->limit(15)->get('id');
            $fisika_normal = Soal::where("difficulty", "normal")->where("jenis_soal", "fisika")->where('status_soal', 'asli')->inRandomOrder()->limit(7)->get('id');
            $fisika_hard = Soal::where("difficulty", "hard")->where("jenis_soal", "fisika")->where('status_soal', 'asli')->inRandomOrder()->limit(3)->get('id');
            // soal king
            $king = Soal::where("difficulty", "king")->where("jenis_soal", "program")->where('status_soal', 'asli')->get('id')->first();
            // get user                                
            $all_soal_id = [];

            // echo $king->id;
            $i = 1;        

            // echo $fisika_normal[5]->id;

            while ($i <= 76) {
                // echo $i;
                // echo "<br/>";                         

                switch (true) {                
                    case $i >= 1 && $i <= 5:                    
                        for($j = 0; $j < 5; $j++){
                            array_push($all_soal_id, $logika_easy[$j]->id);
                            $i++;
                        }
                        break;

                    case $i >= 6 && $i <= 10:
                        // echo "fisika farming adalah " . $fisika_farming[$i]->id;
                        // echo "<br/>";
                        for($j = 0; $j < 5; $j++){
                            array_push($all_soal_id, $fisika_easy[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 11 && $i <= 15:
                        for($j = 0; $j < 5; $j++){
                            array_push($all_soal_id, $program_easy[$j]->id);
                            $i++;
                        }
                        break;

                    case $i >= 16 && $i <= 20:
                        for($j = 5; $j < 10; $j++){
                            array_push($all_soal_id, $logika_easy[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 21 && $i <= 25:
                        for($j = 5; $j < 10; $j++){
                            array_push($all_soal_id, $fisika_easy[$j]->id);
                            $i++;
                        }
                        break;
                    case $i >= 26 && $i <= 30:
                        for($j = 5; $j < 10; $j++){
                            array_push($all_soal_id, $program_easy[$j]->id);
                            $i++;
                        }
                        break;            
                    case $i >= 31 && $i <= 35:
                        for($j = 10; $j < 15; $j++){
                            array_push($all_soal_id, $logika_easy[$j]->id);
                            $i++;
                        }
                        break;
                    case $i >= 36 && $i <= 40:
                        for($j = 10; $j < 15; $j++){
                            array_push($all_soal_id, $fisika_easy[$j]->id);
                            $i++;
                        }
                        break;
                    case $i >= 41 && $i <= 45:
                        for($j = 10; $j < 15; $j++){
                            array_push($all_soal_id, $program_easy[$j]->id);
                            $i++;
                        }
                        break;            
                    
                    case $i >= 46 && $i <= 49:
                        for($j = 0; $j < 4; $j++){
                            array_push($all_soal_id, $logika_normal[$j]->id);
                            $i++;
                        }
                        break;

                    case $i >= 50 && $i <= 53:
                        for($j = 0; $j < 4; $j++){
                            array_push($all_soal_id, $fisika_normal[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 54 && $i <= 57:
                        for($j = 0; $j < 4; $j++){
                            array_push($all_soal_id, $program_normal[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 58 && $i <= 60:
                        for($j = 4; $j < 7; $j++){
                            array_push($all_soal_id, $logika_normal[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 61 && $i <= 63:
                        for($j = 4; $j < 7; $j++){
                            array_push($all_soal_id, $fisika_normal[$j]->id);
                            $i++;
                        }
                        break;

                    case $i >= 64 && $i <= 66:
                        for($j = 4; $j < 7; $j++){
                            array_push($all_soal_id, $program_normal[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 67 && $i <= 68:
                        for($j = 0; $j < 2; $j++){
                            array_push($all_soal_id, $logika_hard[$j]->id);
                            $i++;
                        }
                        break;

                    case $i >= 69 && $i <= 70:
                        for($j = 0; $j < 2; $j++){
                            array_push($all_soal_id, $fisika_hard[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i >= 71 && $i <= 72:
                        for($j = 0; $j < 2; $j++){
                            array_push($all_soal_id, $program_hard[$j]->id);
                            $i++;
                        }
                        break;
                    
                    case $i === 73:                    
                        array_push($all_soal_id, $logika_hard[2]->id);                    
                        $i++;
                        break;
                    
                    case $i === 74:                    
                        array_push($all_soal_id, $fisika_hard[2]->id);                    
                        $i++;
                        break;

                    case $i === 75:                    
                        array_push($all_soal_id, $program_hard[2]->id);                    
                        $i++;
                        break;

                    case $i === 76:                    
                        array_push($all_soal_id, $king->id);                    
                        $i++;
                        break;
                }
            }


            // foreach($all_soal_id as $soal){
            //     echo "soal id untuk user ". $peserta->userid . " adalah " . $soal;
            //     echo "<br/>";
            // }

            // $dups = array();
            // foreach(array_count_values($all_soal_id) as $val => $c)
            // if($c > 1) $dups[] = $val;

            // var_dump($dups);

            for($i = 1; $i <= 76; $i++){
                if($i >= 1 && $i<= 15){
                    UserAnswers::create([
                        'no_soal' => $i,
                        'soalid' => $all_soal_id[$i - 1],
                        'userid' => $peserta_olim->userid,
                        'status' => 'unlocked'
                    ]);
                }
                else{
                    UserAnswers::create([
                        'no_soal' => $i,
                        'soalid' => $all_soal_id[$i - 1],
                        'userid' => $peserta_olim->userid
                    ]);
                }                    
            }
            return "Soal TIm " . $peserta_olim->nama_tim . " berhasil tergenerate <br/>";
        } 
    }
}
