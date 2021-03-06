<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'villages';

    public function kecamatan()
     {
     	return $this->belongsTo('App\Kecamatan','district_id');
     } 
    public function aplikan()
    {
    	return $this->hasMany('App\Aplikan','village_id');
    }

    public function full()
    {
    	return $this->kecamatan->kabupaten->provinsi->name.', '.$this->kecamatan->kabupaten->name.', '.$this->kecamatan->name.', '.$this->name;
    }
}
