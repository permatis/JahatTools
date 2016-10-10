<?php

Route::get('/', function () {
	$folder = 'hello/';
	echo rtrim($folder, '/').'/'.date("Y_m_d_His");
    // return view('welcome');
});

Route::resource('crawlers', 'CrawlerController');
Route::post('scrapping', 'ScrappingController@ready');
Route::get('products/crawler/{id}', function($id) {
	$products = \App\Models\Product::where('crawler_id', $id)->get();

	return view('products/crawler_id', compact('products'));
});
