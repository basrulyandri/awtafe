<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{    

    public function tambahtahunakademikbaru(Request $request)
    {
        //dd($request->all());
    	 session(['setup.tahun_akademik_id' => $request->input('tahun_akademik_id')]);
    	 session(['setup.semester' => 1]);
         $tahunakademik = \App\Tahunakademik::find($request->input('tahun_akademik_id'));
    	 $html = '<div class="list-group-item"><h4>Tahun Akademik</h4><p class="list-group-item-text">'.$tahunakademik->nama.'</p></div>';
        
        return response()->json(['html' => $html]);
    } 

    public function biayasama(Request $request)
    {
    	session()->put('setup.biaya','sama');
    	$html = '<div class="list-group-item"><h4>Biaya</h4><p class="list-group-item-text">Sama seperti semester lalu</p></div>';
    	return response()->json(['html' => $html]);
    }

    public function biayabaru(Request $request)
    {    	
    	foreach($request->input('biaya') as $biaya){
    		session()->push('setup.biaya',$biaya);
    	}

    	return response()->json(['biaya' => $request->input('biaya')]);
    }

    public function potongansama(Request $request)
    {
    	session()->put('setup.potongan','sama');
    	$html = '<div class="list-group-item"><h4>Potongan</h4><p class="list-group-item-text">Sama seperti semester lalu</p></div>';
    	return response()->json(['html' => $html]);
    }

    public function ambilbiaya(Request $request)
    {
    	$html = '<option> Pilih Biaya</option>';
    	foreach(session('setup.biaya') as $key => $biaya){
    		$html .= '<option value="'.$biaya['id'].'">'.$biaya['nama'].'</option>';
    	}
    	return response()->json(['html' => $html]);
    }

    public function tambahpotonganbaru(Request $request)
    {
    	session()->push('setup.potongan',$request->all());
    	return response()->json(['potongan' => session('setup.potongan')]);
    }
}
