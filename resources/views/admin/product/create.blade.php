@extends('admin.layout')
@section('title','Create product')

@section('content')
<div class="form">


    <form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" required placeholder="Enter name">
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
                    <input name="desc" type="text" class="form-control" required placeholder="Enter description">

                  
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Price</label>
                    <input name="price" type="text" class="form-control" required placeholder="Enter description">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($category as $item)
                        <option class="form-control" value="">{{$item -> name}}</option>

                        @endforeach
                    </select>
                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">Add</button>

    </form>

</div>




@endsection