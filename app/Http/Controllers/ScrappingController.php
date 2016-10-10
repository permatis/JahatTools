<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CrawlerService;
use App\Services\ImageService;
use App\Models\Crawler;
use App\Models\Product;

class ScrappingController extends Controller
{
	private $client;
	private $crawler;
	private $images;
	private $products;

	public function __construct(
		CrawlerService $client,
		Crawler $crawler,
		ImageService $images,
		Product $products
	)
	{
		$this->client = $client;
		$this->crawler = $crawler;
		$this->images = $images;
		$this->products = $products;
	}

	public function ready(Request $request)
	{
		$data = $this->crawler->find($request->get('id'));
		$products = $this->client->run($data);
		$images = $this->getImages($products);

		//Save to products table
		foreach($products as $product) {
			$this->products->create($product);
		}
		
		//Download Images
		$this->images->download($images, $data->img_path, $data->img_prefix);
		//Save to images table
		//Save relation products with image
		
		return redirect('/products/crawler/'.$data->id);
	}

	protected function getImages($products)
	{
		$images = [];

		foreach ($products as $value) {
			if(array_key_exists('image', $value)) { 
				$images[] = ['image' => $value['image']];
			}
		}

		return $images;
	}

}
