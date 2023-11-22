@extends('client.layout')
@section('title','Blog')
@section('content')
<div class="container">
    <div class="row">
        @foreach($blogList as $blog)
        <div class="col-lg-4 col-md-4 col-12">
            <div class="collection__content-post">
                <a href="">
                    <img src="{{asset('images')}}/{{$blog->image}}" alt="">
                </a>
            </div>
            <div class="collection__content-info">
                <a href="{{route('show.details',['id' => $blog->id])}}">
                    <p>{{$blog->title}}</p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection