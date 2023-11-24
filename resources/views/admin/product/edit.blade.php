@extends('admin.layout')
@section('title','Edit Product')

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
                    <label for="">Img</label>
                    <input name="img" type="file" class="form-control" onchange="preview()" placeholder="Enter name">
                    <img id="frame" src="" width="100px" height="100px"/>


                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="desc" type="text" value="{{$product->desc }}" class="form-control" required placeholder="Enter description">
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Price</label>
                    <label for="">{{$product->category_id}}</label>
                    <input name="price" type="text" value="{{$product->price }}" class="form-control" required placeholder="Enter description">
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Category</label>
<select name="category_id" class="form-control" id="">
    @foreach($cate as $item)
    @if($item->id == $product->category_id)
    <option value="{{$item->id}}" selected>{{$item->name}}</option>
    @else
    <option value="{{$item->id}}" >{{$item->name}}</option>
@endif
    @endforeach
</select>

                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">update</button>

    </form>

</div>



@endsection