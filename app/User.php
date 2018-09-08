<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','NIM','username','password','activated','role_id','first_name','last_name','photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('\App\Role');
    }

    public function getNameOrEmail($fullname = false)
    {
        if($this->first_name){
            if($fullname == true){
                return $this->first_name.' '.$this->last_name;
            }else {
                return $this->first_name;
            }
        }

        return $this->email;
    }

    public function canAccess($routeName)
    {
        $role = \Auth::user()->role;
        $permissions = [];
        foreach($role->permissions as $perm){
            array_push($permissions,$perm->name_permission);
        }
        // if (\Auth::user()->role->name == 'Superadmin') {
        //     return true;
        // }

        if(!in_array($routeName,$permissions) AND \Auth::user()->role->name !== 'Superadmin'){
            return false;
        }

        return true;
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa','NIM','NIM');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function isAdmin()
    {
        if(in_array($this->role->name,['Superadmin','Administrator'])){
            return true;
        }

        return false;
    }

    public function isKeuangan()
    {
        if($this->role->name == 'Keuangan'){
            return true;
        }

        return false;
    }

}
