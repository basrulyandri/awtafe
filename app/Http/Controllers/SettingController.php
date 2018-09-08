<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

class SettingController extends Controller
{
    public function identitaspt()    
    {	
    	$identitas = \App\Identitaspt::first();

    	return view('setting.identitaspt',['identitas' => $identitas]);
    }

    public function identitasptupdate(Request $request)
    {
    	$identitas = \App\Identitaspt::first();
    	
    	
    	$identitas->update($request->all());

    	if($request->hasFile('logo')){
	        $photo = $request->file('logo');
	        $filename = time().$photo->getClientOriginalName();
	        //dd(public_path());

	        if(!Image::make($photo)->resize(150,150)->save(public_path('assets/uploads/'.$filename))){
	          return 'not uploaded';
	        }
	      }

	    $identitas->logo = (isset($filename)) ? $filename :$identitas->logo;
	    $identitas->save();

    	return redirect()->route('setting.identitaspt')->with('success','Berhasil merubah identitas Perguruan Tinggi');
    }

    public function aplikasi()
    {
        $setting = \App\Setting::all();      
        
        $category = \App\Setting::select('category')->GroupBy('category')->orderBy('category','DESC')->get()->all();
        return view('setting.aplikasi',compact(['setting','category']));
    }

    public function update(Request $request)
    {        
        foreach($request->all() as $r => $v){
            if($r != '_token'){
                $s = \App\Setting::whereName($r)->get()->first();
                $s->value = $v;
                $s->save()            ;
            }
        }

        return redirect()->back();
    }

    public function setuptahunakademik()
    {
        session()->forget('setup');

        $idTerakhirBiaya = \App\Biaya::max('id');
        $idTerakhirTahunAkademik = \App\TahunAkademik::max('id');
        $tahunakademik = \App\Tahunakademik::lists('nama','id')->prepend('Pilih Tahun Akademik','')->toArray();
        $biaya = \App\Biaya::whereTahunAkademikId(TASekarang()->id)->get();
        return view('setting.tahunakademik',compact(['tahunakademik','biaya','idTerakhirBiaya','idTerakhirTahunAkademik']));
    }

    public function postsetuptahunakademik(Request $request)
    {
        if(session('setup.biaya') == 'sama'){
            $biayalalu = \App\Biaya::whereTahunAkademikId(TASekarang()->id)->get();
            foreach($biayalalu as $biaya){
                $biayabaru = new \App\Biaya;
                $biayabaru->nama = $biaya->nama;
                $biayabaru->deskripsi = $biaya->deskripsi;
                $biayabaru->nominal = $biaya->nominal;
                $biayabaru->jenis_biaya_id = $biaya->jenis_biaya_id;
                $biayabaru->tahun_akademik_id = session('setup.tahun_akademik_id');
                $biayabaru->save();
            }
        }

        if(is_array(session('setup.biaya'))){
            foreach(session('setup.biaya') as $biaya){
                $biayabaru = new \App\Biaya;
                $biayabaru->id = $biaya['id'];
                $biayabaru->nama = $biaya['nama'];                
                $biayabaru->nominal = $biaya['nominal'];
                $biayabaru->jenis_biaya_id = $biaya['jenis_biaya_id'];
                $biayabaru->tahun_akademik_id = session('setup.tahun_akademik_id');
                $biayabaru->save();
            }
        }

        if(is_array(session('setup.potongan'))){
            foreach(session('setup.potongan') as $potongan){
                $potonganbaru = new \App\Potonganbiaya;
                $potonganbaru->nama = $potongan['nama_potongan'];                
                $potonganbaru->besaran = $potongan['besaran'];
                $potonganbaru->deskripsi = $potongan['deskripsi'];
                $potonganbaru->biaya_id = $potongan['biaya_id'];
                $potonganbaru->tahun_akademik_id = session('setup.tahun_akademik_id');
                $potonganbaru->save();
            }
        }

        if(session('setup.potongan') == 'sama'){
            $potonganlalu = \App\Potonganbiaya::whereTahunAkademikId(TASekarang()->id)->get();
            foreach($potonganlalu as $potongan){
                $potonganbaru = new \App\Potonganbiaya;
                $potonganbaru->nama = $potongan->nama;
                $potonganbaru->besaran = $potongan->besaran;
                $potonganbaru->deskripsi = $potongan->deskripsi;
                $potonganbaru->biaya_id = $potongan->biaya_id;
                $potonganbaru->tahun_akademik_id = session('setup.tahun_akademik_id');
                $potonganbaru->save();
            }
        }

        $tahunakademikaktif = \App\Setting::whereName('TA_aktif')->first();
        $tahunakademikaktif->value = session('setup.tahun_akademik_id');
        $tahunakademikaktif->save();

        $semesteraktif = \App\Setting::whereName('semester_aktif')->first();
        $semesteraktif->value = session('setup.semester');
        $semesteraktif->save();

        $mhs = \App\Mahasiswa::all();
        foreach($mhs as $m){
            if($m->isAktif()){
                $m->semester = $m->semester + 1;
                $m->save();
                $m->buatTagihanRegistrasiUlang();
                $m->buatTagihanBiayaKuliah();
            }

            if($m->status_mahasiswa_id == 6){
                $m->buatTagihanBiayaKuliah();
                $m->buatKrs();
                $m->status_mahasiswa_id = 2;
                $m->save();                
            }
        }

        return view('setting.suksessetuptahunakademik');
    }

    public function setupsemesterbaru()
    {
        return view('setting/semesterbaru');
    }

    public function postsetupsemesterbaru()
    {
        $setting = \App\Setting::whereName('semester_aktif')->first();
        $setting->value = 2;
        $setting->save();

        $mhs = \App\Mahasiswa::all();
        foreach($mhs as $m){
            if($m->isAktif()){
                $m->semester = $m->semester + 1;
                $m->save();
                $m->buatTagihanRegistrasiUlang();
                $m->buatTagihanBiayaKuliah();
            }

            if($m->status_mahasiswa_id == 6){
                $m->buatTagihanBiayaKuliah();
                $m->buatKrs();
                $m->status_mahasiswa_id = 2;
                $m->save();                
            }
        }
        return view('setting.suksessetupsemesterbaru');
    }

}
