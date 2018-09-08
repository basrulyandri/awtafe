<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    public function index(){
    	$roles = \App\Role::all();
    	return view('roles.index',['roles' => $roles,'no' => 1]);
    }

    public function edit($id){

    	$role = \App\Role::findOrFail($id);
        $rolepermissions = $role->permissions()->lists('name_permission','permissions.id');
    	return view('roles.edit',['role' => $role,'rolepermissions'=>$rolepermissions,'allpermissions' => \App\Permission::all()]);
    }

    function update($id, Request $request){
        //dd($request->input('perms'));
    	
        $role = \App\Role::findOrFail($id);    	   	
    	if(!$request->input('perms') == NULL){            
    	   $role->permissions()->sync($request->input('perms'));
        } else{
            $role->permissions()->detach();
        }
    	
    	$role->update(['name' => $request->input('name')]);

    	return redirect()->route('roles.list')->with('success','Edit Role Successfully');


    }
}
