<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class PageController extends Controller
{
    
    public function home(){
    	return view('pages.home');
    }

    public function downloadbrosur()
    {
    	$konsentrasi = \App\Konsentrasi::lists('nama','id')->prepend('Pilih jurusan yg diminati','')->toArray();
    	$kelas = \App\Kelas::lists('nama','id')->prepend('Pilih Program','')->toArray();
    	$pilihan_kampus = \App\Gedung::lists('nama','id')->prepend('Pilihan Kampus','')->toArray();    	

    	return view('pages.downloadbrosur',compact(['konsentrasi','kelas','pilihan_kampus']));
    }

    public function postdownloadbrosur(Requests\AplikanRequest $request)
    { 
        //dd($request->all());
        $aplikan = $request->all();
        $aplikan['token'] = aplikanToken();
        $aplikan['user_id'] = \App\User::whereroleId(2)->first()->id;
        $aplikan['status_aplikan_id'] = 2;
        $aplikan['subject'] = 'Terima Kasih';
        $aplikan['pilihan_kampus'] = 1;
        $aplikan['to'] = explode(',',penerimaNotifikasi());
        \App\Aplikan::create($aplikan);

        Mail::send('layouts.emails.downloadbrosur',compact('aplikan'),function($message) use ($aplikan){
            $message->from(emailPengirim(),PTName())
                    ->to($aplikan['email'])
                    ->subject('Terima Kasih '.$aplikan['nama'].', telah mengisi form download brosur STAI Binamadani ');
        });

        Mail::send('layouts.emails.notifikasidownloadbrosur',compact('aplikan'),function($message) use ($aplikan){
            $message->from(emailPengirim(),PTName())
                    ->to($aplikan['to'])
                    ->subject('Aplikan Baru dari Website');
        });

        return view('pages.postdownloadbrosur',compact('aplikan'));
    }

    public function brosur($token)
    {
        $aplikan = \App\Aplikan::whereToken($token)->first();
        if ( ! is_null($aplikan)) {
            return view('pages.brosur',compact(['aplikan']));
        }

         return redirect()->route('page.downloadbrosur');
    }

    public function gamestebakangka()
    {
        $angkaacak = rand(3,40) * 9;
        return view('pages.tebakangka',compact(['angkaacak']));
    }

    public function prosestebakangka(Request $request)
    {
        $angkaacak = $request->input('angkaAcak');
        $hasil = $request->input('hasil');

        $hasil1 = 9 - array_sum(str_split(array_sum(str_split(array_sum(str_split($hasil))))));

        if(in_array($hasil1,[0,9])){
            return response()->json(['msg' => '0 Atau 9']);            
        }

        return response()->json(['msg' => $hasil1]);
    }

}
