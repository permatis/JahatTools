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
				<th>Crawler Name</th>
				<th>URL</th>
				<th>Last Crawler</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($crawlers as $crawler)
			<tr>
				<td>{{ $crawler->name }}</td>
				<td>{{ $crawler->url }}</td>
				<td width="200">
					{{ (!is_null($crawler->product()->first()) ? $crawler->product()->first()->updated_at->diffForHumans() : '') }}
				</td>
				<td>
					@if(is_null($crawler->product()->first()))
					<form action="scrapping" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $crawler->id }}">
						<input type="submit" value="Ready">
					</form>
					@else 
					<a href="/products/crawler/{{ $crawler->id }}">Show Products</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection