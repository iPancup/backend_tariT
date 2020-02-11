<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LatSoal;
use App\JawabLatSoal;


class latSoalController extends Controller
{
    //Latian Soal
    public function createLatSoal(Request $request)
    {
        $quiz = LatSoal::create([
            'soal'    => $request->soal,
            'answer_a'    => $request->answer_a,
            'answer_b'    => $request->answer_b,
            'answer_c'    => $request->answer_c,
            'answer_d'    => $request->answer_d,
            'right_answer'    => $request->right_answer,
            'discuss'    => $request->discuss,
        ]);
        return $quiz;
    }

    public function showLatSoal($id)
    {
        return LatSoal::find($id);
    }

    public function jawabLatSoal(Request $request, $id)
    {
        $article = JawabLatSoal::findOrFail($id);
        $quiz = $request->user_answer;
        $article->update($request->all());
        if($article->user_answer == $article->right_answer){
            $article->result = (20);
            $article->correct = (true);
        };
        $article->update($request->all());
        return $article;
    }

    public function hasilLatSoal()
    {
        $correct = LatSoal::where('correct','=', 1)->count();
        $wrong = LatSoal::where('correct','=', 0)->count();
        $result = LatSoal::all()->sum('result');
        return response()->json(['status' => '200', 'data' => 'Success', 'Result' => $result, 'benar' => $correct, 'salah' => $wrong]);

    }

    // // Quiz
    // public function createQuiz(Request $request)
    // {
    //     $quiz = Quiz::create([
    //         'soal'    => $request->soal,
    //         'answer_a'    => $request->answer_a,
    //         'answer_b'    => $request->answer_b,
    //         'answer_c'    => $request->answer_c,
    //         'answer_d'    => $request->answer_d,
    //         'right_answer'    => $request->right_answer,
    //     ]);
    //     return $quiz;
    // }

    // public function showQuiz($id)
    // {
    //     return Quiz::find($id);
    // }

    // public function quiz(Request $request, $id)
    // {
    //     $article = JawabQuiz::findOrFail($id);
    //     $quiz = $request->user_answer;
    //     $article->update($request->all());
    //     if($article->user_answer == $article->right_answer){
    //         $article->result = (4);
    //         $article->correct = (true);
    //     };
    //     $article->update($request->all());
    //     return $article;
    // }

    // public function quizresult()
    // {
    //     $correct = Quiz::where('correct','=', 1)->count();
    //     $wrong = Quiz::where('correct','=', 0)->count();
    //     $result = Quiz::all()->sum('result');
    //     return response()->json(['status' => '200', 'data' => 'Success', 'Result' => $result, 'benar' => $correct, 'salah' => $wrong]);
    // }
}
