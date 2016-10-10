@extends('layouts.app')
@section('content')
	<ul>
		<li><a href="/crawlers">Crawler Lists</a></li>
		<li><a href="/crawlers/create">Add Crawler</a></li>
	</ul>
	<h2>Crawler Lists</h2>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Crawler Name</th>
				<th>Title</th>
				<th>Link</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1 ?>
			@foreach($products as $product)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $product->crawler->name }}</td>
				<td>{{ $product->title }}</td>
				<td>{{ $product->link }}</td>
				<td>{{ $product->image }}</td>
			</tr>
				@endforeach
		</tbody>
	</table>
@endsection