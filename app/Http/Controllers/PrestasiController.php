<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        if(Auth::user()->level == 1) {
            $prestasi = Prestasi::where('user_id', Auth::user()->id)->get();
        }
        return view('prestasi', compact('prestasi'));
    }

    public function store(Request $request)
    {
        $data = [];
        $error = 1;
        for($x=0; $x < count($request->get('prestasi')); $x++) {
            $noId = 0;
            if(!empty($request->get('id')[$x]) && !$request->get('id')[$x] == 0) {
                $noId = $request->get('id')[$x];
            }
            $data[] = [
                'id' => $noId,
                'user_id' => Auth::user()->id,
                'prestasi' => $request->get('prestasi')[$x],
                'tingkat' => $request->get('tingkat')[$x],
            ];
        }

        if(count($data) > 0) {
            $error = '';
        }
        Prestasi::upsert($data, ['id', 'user_id','prestasi','tingkat']);
        return redirect(route('prestasi'))->with('error', $error);
    }
}
