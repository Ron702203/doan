@extends('admin.layout')
@section('title','Edit Blog')

@section('content')

<div class="form">

    <form action="{{route('admin.blog.edit',['id' => $blog->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" value="{{$blog->title}}" class="form-control" required
                        placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Img</label>
                    <input name="image" type="file" class="form-control" placeholder="Enter name">
                    <input type="hidden" name="oldimg" value="{{$blog->image}}">
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="desc" type="text" value="{{$blog->desc }}" class="form-control" required
                        placeholder="Enter description">
                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">update</button>

    </form>

</div>



@endsection