@extends('admin.layout')
@section('title','Edit Category')

@section('content')

<div class="form">

    <form action="{{route('admin.category.edit',['id' => $category->id])}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" value="{{$category->name}}" class="form-control" required placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Img</label>
                    <input name="img" type="file" class="form-control" placeholder="Enter name">

                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="desc" type="text" value="{{$category->desc }}" class="form-control" required placeholder="Enter description">
                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">update</button>

    </form>

</div>



@endsection