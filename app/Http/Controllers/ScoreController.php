<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Olim;
use Symfony\Component\HttpFoundation\Response;
class ScoreController extends Controller
{
    public function generateAllScore(){
        // $data_score_user = Score::where('tahap', 'penyisihan')->get();
        $peserta_olim = Olim::where('status', true)->get();
        
        foreach($peserta_olim as $peserta){
            $data_score_single = Score::where('userid', $peserta->userid)->get()->first();

            if(isset($data_score_single)){
                echo "user ". $peserta->userid . " score telah tergenerate";
                echo "<br/>";
            }
            else{
                Score::create([
                    'userid' => $peserta->userid,
                    'score' => '0',
                    'tahap' => 'penyisihan'
                ]);

                
                echo "Berhasil mengenerate score user id = " . $peserta->userid;
                echo "<br/>";                
            }
                        
        }
    }

    public function getLivescore(){
        $data_livescore = Score::select('olim.id', 'olim.no_peserta', 'olim.nama_tim', 'score')
                            ->join('olim', 'olim.userid', '=', 'score.userid')                            
                            ->orderBy('score','desc')->get();
        
        return response()->json($data_livescore, Response::HTTP_OK);
        // $data_livescore = Score::select('dev_com.id', 'dev_com.no_peserta', 'dev_com.nama_tim', 'sum(user_answers.correct) as ')
    }

    public function generateScoreById(Request $request){
        $tim_id = $request->tim_id;

        $peserta_olim = Olim::where('status', true)->where('id', $tim_id)->get()->first();

        // echo $peserta_olim->userid;
                
        $data_score_single = Score::where('userid', $peserta_olim->userid)->get()->first();

        if(isset($data_score_single)){
            echo "user ". $peserta_olim->userid . " score telah tergenerate";
            echo "<br/>";
        }
        else{
            Score::create([
                'userid' => $peserta_olim->userid,
                'score' => '0',
                'tahap' => 'penyisihan'
            ]);

            
            echo "Berhasil mengenerate score user dengan nama " . $peserta_olim->nama_tim ." id = " . $peserta_olim->userid;
            echo "<br/>";                
        }
                                
    }
}
