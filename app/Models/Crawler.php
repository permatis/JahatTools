<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{

	protected $fillable = [
		'name', 'url', 'parent_class', 'child_class', 'img_prefix', 'img_path'
	];

	public function product()
	{
		return $this->hasMany('App\Models\Product');
	}

}