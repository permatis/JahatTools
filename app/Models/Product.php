<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = [
		'title', 'link', 'image', 'description', 'crawler_id'
	];

	public function crawler()
	{
		return $this->belongsTo('App\Models\Crawler');
	}

}