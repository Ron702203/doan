@extends('admin.layout')
@section('title','Create user')

@section('content')
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
@if(Session::has('message'))
<h3>{{ Session::get('message') }}</h3>
@endif
<div class="form">

    <form action="{{route('admin.user.create')}}" method="post">
        @csrf
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="form-control"  placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Emai</label>
                    <input name="email" type="text" value="{{ old('email') }}"  class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" value="{{ old('password') }}"  class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for=""> Confirm Password</label>
                    <input name="cpassword" type="password" value="{{ old('cpassword') }}"  class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">address</label>
                    <input name="address" type="address" value="{{ old('address') }}"  class="form-control" placeholder="Dia Chi">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">phone</label>
                    <input name="phone" type="phone" value="{{ old('phone') }}"  class="form-control" placeholder="SDT">
                </div>
            </div>




        </div>
        <button class="btn btn-success" type="submit">Add</button>

    </form>

</div>



@endsection value="{{ old('name') }}"