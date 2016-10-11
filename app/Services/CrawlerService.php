<?php

namespace App\Services;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client as Guzzle; 
use App\Models\Crawler as Models;

class CrawlerService
{

	protected $client;
	protected $crawler;
	protected $guzzle;
	protected $models;

	public function __construct(
		Client $client,
		Crawler $crawler,
		Guzzle $guzzle,
		Models $models
	)
	{
		$this->client = $client;
		$this->crawler = $crawler;
		$this->guzzle = $guzzle;
	}

	public function run($data)
	{
		$array = [];
		$crawler = $this->client->request('GET', $data->url);
		$parent = $this->parent($crawler, $data->parent_class);
		$childs = $this->child( json_decode($data->child_class, true) );
		
		foreach($parent as $key => $value) {
			$newCrawler = new Crawler($value);
			$array[$key] = [
				'title' => (array_key_exists('title', $childs) ? $newCrawler->filter($childs['title'])->text() : ''),
				'link' => (array_key_exists('link', $childs) ? $newCrawler->filter($childs['link'])->attr('href') : ''),
				'image' => (array_key_exists('image', $childs) ? $newCrawler->filter($childs['image'])->attr('src') : ''),
				'description' => (array_key_exists('description', $childs) ? $newCrawler->filter($childs['description'])->text() : ''),
				'crawler_id' => $data->id
			];
		}

		return $array;
	}

	protected function parent($crawler, $class)
	{
		return $crawler->filter($class)
			->each(function($node) {
    			return $node->html();
			});
	}

	protected function child($childs)
	{
		$array = [];

		foreach($childs as $child) {
			foreach($child as $key => $val) {
				$array[$key] = $val;
			}
		}

		return $array;
	}

}