<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\PostNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::all();
        $postnilai = '';
        if(Auth::user()->level == 1) {
            $postnilai = PostNilai::where('user_id', Auth::user()->id)->get();
        }
        return view('nilai', compact('nilai', 'postnilai'));
    }

    public function storePostNilai( Request $request)
    {
        $data = [];
        $error = 1;
        for ($x=0; $x < count($request->get('nilai_id')); $x++) {
            $noId = 0;
            $nilai_id = 0;
            if(!empty($request->get('id')[$x])) {
                $noId = $request->get('id')[$x];
            }
            if(!empty($request->get('nilai_id')[$x])) {
                $nilai_id = $request->get('nilai_id')[$x];
            }

            $data[] = [
                'id' => $noId,
                'user_id' => Auth::user()->id,
                'nilai_id' => $nilai_id,
                'score_s1' => $request->get('s1')[$x],
                'score_s2' => $request->get('s2')[$x],
                'score_s3' => $request->get('s3')[$x],
                'score_s4' => $request->get('s4')[$x],
                'score_s5' => $request->get('s5')[$x]
            ];
        }

        if(count($data) > 0 ) {
            $error = '';
        }

        PostNilai::upsert($data, ['id', 'user_id', 'nilai_id', 'score_s1','score_s2','score_s3','score_s4','score_s5']);
        return redirect(route('nilai'))->with('error', $error);

    }
}
