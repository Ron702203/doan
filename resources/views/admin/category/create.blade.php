@extends('admin.layout')
@section('title','Create Category')

@section('content')

<div class="form">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('admin.category.create')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control" required placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Img</label>
                    <input name="img" value="{{old('img')}}" type="file" class="form-control">
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="desc" value="{{old('desc')}}" type="text" class="form-control" placeholder="Enter description">
                </div>
            </div>



        </div>
        <button class="btn btn-success"  type="submit">Add</button>

    </form>

</div>



@endsection