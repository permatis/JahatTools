<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('crawlers', 'CrawlerController');
Route::post('scrapping', 'ScrappingController@ready');
Route::get('products/crawler/{id}', function($id) {
	$products = \App\Models\Product::where('crawler_id', $id)->get();

	return view('products/crawler_id', compact('products'));
});
