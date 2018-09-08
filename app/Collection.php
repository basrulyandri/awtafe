<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $fillable = ['code','date','type_id','title','description','user_id','content','category_id','parent','author_id'];

	protected $date = ['date'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

}
