@extends('main')

@section('title','| Homepage')
@section('welcome','active')
@section('content')
        <div class = "row">
            <div class = "col-md-12">
                <div class="jumbotron">
                    <h1>Welcome to my blog</h1>
                    <p class="lead">Thank you so much for visiting.This is my test website built with Laravel.Please read my popular post </p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div><!-- end of header .row -->
        <div class = "row">
            <div class = "col-md-8">

              @foreach($posts as $post)

                  <div class = "post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body), 0, 30) }}{{ strlen(strip_tags($post->body)) > 30 ? "..." : "" }}</p>
                    <a href ="{{ url('blog/'.$post->slug) }}" class ="btn btn-primary">Read More</a>
                  </div>

                  <hr>
              @endforeach

            </div>
            <div class = "col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
                
            </div>

        </div>
@endsection



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  </body>
</html>