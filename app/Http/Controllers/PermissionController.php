<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller
{
    public function index(){
      $permissions = \App\Permission::all();
      $count = 1;
      return view('permissions.index',compact('permissions','count'));

    }

    public function add(){
      return view('permissions.add');
    }

    public function create(Request $request){
      $this->validate($request,[
        'label' => 'required',
        'name_permission' => 'required',
      ]);
      
      \App\Permission::create($request->all());

      return redirect('permissions')->with('success','1 Permission has been created');
    }

    public function edit($id){
      $permission = \App\Permission::findOrFail($id);
      return view('permissions.edit',compact('permission'));
    }

    public function update($id,Request $request)
    {
      $permission = \App\Permission::findOrFail($id);
      $permission->update($request->all());
      return redirect()->route('permissions.list')->with('success','Permission has been updated successfully.');
    }

    public function delete($id)
    {
      $permission = \App\Permission::findOrFail($id);
      $permission->roles()->detach();
      $permission->delete($id);
      return redirect()->route('permissions.list')->with('success','Permission has been deleted successfully.');

    }
}
