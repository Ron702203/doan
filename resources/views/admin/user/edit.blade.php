@extends('admin.layout')
@section('title','Edit user')

@section('content')

<div class="form">

    <form action="{{route('admin.product.edit',['id' => $product->id])}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" value="{{$product->name}}" class="form-control" required placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="file" class="form-control" require placeholder="Enter name">

                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">update</button>

    </form>

</div>



@endsection