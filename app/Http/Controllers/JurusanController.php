<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PostJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        $postJurusan = '';

        if(Auth::user()->level == 1) {
            $postJurusan = PostJurusan::where('user_id', Auth::user()->id)->get();
        }

        return view('jurusan', compact('jurusan', 'postJurusan'));

    }

    public function storePostJurusan(Request $request)
    {
        $data = [];
        $error = 1;
        if(count($request->jurusan) > 0) {
            $countid = 0;
            foreach ($request->jurusan as $index => $j) {
                if(!empty($j) && $j != 0) {
                    $noId = 0;
                    if(!empty($request->get('id')[$index])) {
                        $noId = $request->get('id')[$index];
                    }
                    $data[] = [
                        'id' => $noId,
                        'user_id' => Auth::user()->id,
                        'jurusan_id' => $j,
                        'kat' => ($countid + 1)
                    ];

                    $countid++;
                }
            }
        }
        if(count($data) > 0) {
            $error = '';
        }
        PostJurusan::upsert($data, ['id','user_id','jurusan_id','kat']);
        return redirect(route('jurusan'))->with('error', $error);
    }





}
