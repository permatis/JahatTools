@extends('layouts.app')
@section('content')
	<ul>
		<li><a href="/crawlers">Crawler Lists</a></li>
		<li><a href="/crawlers/create">Add Crawler</a></li>
	</ul>
	<h2>Add New Crawler</h2>
	<form action="/crawlers" method="post">
		{{ csrf_field() }}
		<label>Crawler Name</label>
		<input type="text" name="name"> <br />
		<label>URL</label>
		<input type="text" name="url"> <br />
		<label>Parent Class or Id</label>
		<input type="text" name="parent_class"> <br />
		<label>Child Class or Id :</label> <br />
		<label>Title</label>
		<input type="text" name="child_title"> <br />
		<label>Link</label>
		<input type="text" name="child_link"> <br />
		<label>Image</label>
		<input type="text" name="child_image"> <br />
		<label>Description</label>
		<input type="text" name="child_description"> <br />
		<label>Images Configuration :</label> <br />
		<label>Image Prefix</label>
		<input type="text" name="img_prefix"> <br />
		<label>Image Path</label>
		<input type="text" name="img_path"> <br />
		<input type="submit" value="Add New">
	</form>
@endsection

