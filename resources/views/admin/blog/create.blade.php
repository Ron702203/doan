@extends('admin.layout')
@section('title','Create Blog')

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

    <form action="{{route('admin.blog.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" value="{{old('title')}}" type="text" class="form-control" required
                        placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Img</label>
                    <input name="image" value="{{old('image')}}" type="file" class="form-control">
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" id="body" placeholder="Enter the Description" name="desc"></textarea>
                </div>
            </div>



        </div>
        <button class="btn btn-success" type="submit">Add</button>

    </form>

</div>
<script>

    ClassicEditor

        .create(document.querySelector('#body'))

        .catch(error => {

            console.error(error);

        });

</script>



@endsection