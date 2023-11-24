@extends('admin.layout')
@section('title','Order')

@section('content')
@if(Session::has('message'))
<h3>{{ Session::get('message') }}</h3>
@endif

<!-- Page Heading -->


@if (Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order_id</th>
                        <!-- <th>Img</th> -->
                        <!-- <th>Desc</th> -->
                        <th>Product_id</th>
                        <!-- <th>Category</th>
                        <th>Action</th> -->

                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>

                    @foreach($orderList as $item)

                    <tr>
                        <td>{{ $item->user_id}}</td>

                        <td>{{ $item->quantity}}</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection