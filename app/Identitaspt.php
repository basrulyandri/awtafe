<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitaspt extends Model
{
    protected $table = 'identitas_pt';
    protected $fillable = ['kode','kode_hukum','nama','tgl_berdiri','alamat','telepon','fax','website','no_akta','tgl_akta','no_sah','tgl_sah','logo'];
}
