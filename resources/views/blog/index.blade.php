@extends('main')

@section('title','| Blog')
@section('blog','active')
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Blog</h1>
		</div>
	</div>

	@foreach($posts as $post)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $post->title }}</h2>
			<h5>Published: {{ date('M j, Y',strtotime($post->created_at)) }}</h5>

			<p>{{ substr(strip_tags($post->body),0,25) }}{{ strlen(strip_tags($post->body)) > 25 ? '...' : "" }}</p>
			
			<a href="{{ route('blog.single',$post->slug) }}" class ="btn btn-primary">Read More</a>
		</div>
		<hr>
	</div>
	@endforeach

	<div class="row">
		<div class="text-center">
			{!! $posts->links() !!}
		</div>

	</div>


@endsection