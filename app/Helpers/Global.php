<?php

function siteName(){
	return \App\Setting::whereName('site_name')->first()->value;
}

function appLogo(){
	return \App\Setting::whereName('app_logo')->first()->value;
}



function hariList()
{
	return [
		'Senin' => 'Senin',
		'Selasa' => 'Selasa',
		'Rabu' => 'Rabu',
		'Kamis' => 'Kamis',
		'Jumat' => 'Jumat',
		'Sabtu' => 'Sabtu',
		'Minggu' => 'Minggu'
	];
}


function wilayah($idvillage){
	$wilayah =  \DB::table('villages')
            ->join('districts', 'districts.id', '=', 'villages.district_id')
            ->join('regencies', 'regencies.id', '=', 'districts.regency_id')
            ->join('provinces', 'provinces.id', '=', 'regencies.province_id')
            ->select('villages.id', 'villages.name as kelurahan','districts.name as kecamatan','regencies.name as kabupaten','provinces.name as provinsi')
            ->where('villages.id','=',$idvillage)
            ->first();
    return $wilayah->kelurahan.' '.$wilayah->kecamatan.' '.$wilayah->kabupaten.' '.$wilayah->provinsi;
}

function collections()
{
	return \App\Collection::all();
}






		