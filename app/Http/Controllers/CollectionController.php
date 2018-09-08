<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CollectionController extends Controller
{

	public function fatwa()
	{
		$fatwas = \App\Collection::whereTypeId(1)->get();
		return view('fatwa/index',compact(['fatwas']));
	}
    public function addFatwa()
    {
    	$categories = \App\Category::whereTypeId(1)->lists('name','id')->prepend('Pilih','')->toArray();
    	return view('fatwa.add',compact(['categories']));
    }

    public function insertFatwa(Request $request)
    {
    	$fatwa = \App\Collection::create($request->all());
    	$file = $request->file('filename');
        $filename = time().'_'.$file->getClientOriginalName();

    	$file->move(public_path('assets/uploads/files/fatwa/'),$filename);

    	$fatwa->filename = $filename;
    	$fatwa->save(); 

    	return redirect()->route('fatwa.index')->with('success','Data Fatwa Berhasil ditambahkan');
    }
}
