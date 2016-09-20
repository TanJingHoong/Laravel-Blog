@extends('main')

@section('title','| Create New Post')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/select2.css')!!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector:'textarea',
			plugins: "link code",
			menubar: "false"
		});
	</script>

@endsection

@section('content')

	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			<!-- <form action="/" method="post" enctype="multiport/form-data"> -->
			{!! Form::open(array('route' => 'posts.store','data-parsley-validate' => '', 'files'=>true)) !!}
			    {{ Form::label('title','Title:')}} <!-- label('id','value') -->
			    {{ Form::text('title',null,array('class' => 'form-control','required' => '','maxlength' => '255'))}} <!-- textarea('id',nothing,array(bootstrap class form control)) -->

			    {{ Form::label('slug','Slug:') }}
			    {{ Form::text('slug',null,array('class'=> 'form-control','required'=> '','minlength' => '5', 'maxlength' => '255') ) }}

			    {{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach

				</select>

				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi required " style="width:100%" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

				</select>

				{{ Form::label('featured_image','Upload Featured Image:') }}
				{{ Form::file('featured_image') }}

			   	{{ Form::label('body',"Post Body:")}}
			   	{{ Form::textarea('body', null,array('class' => 'form-control' )) }}

			   	{{ Form::submit('Create Post',array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'))}}
			{!! Form::close() !!}

			<!--
			Code for not using the form helper.
			<div class="row">
			  <div class="col-md-8 col-md-offset-2">
			    <h1>Create New Post</h1>
			    <hr>
			    <form method="POST" action=" { *separate for php { route('posts.store') }}">
			      <div class="form-group">
			        <label name="title">Title:</label>
			        <input id="title" name="title" class="form-control">
			      </div>
			      <div class="form-group">
			        <label name="body">Post Body:</label>
			        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
			      </div>
			      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
			      <input type="hidden" name="_token" value="{ *separate for php { Session::token() }}">
			    </form>
			  </div>
			</div>﻿

			-->

		</div>
	</div>




@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.js') !!}

	<script type="text/javascript">
	$(".select2-multi").select2();

	</script>

@endsection