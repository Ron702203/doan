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
                        <th>User</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Action</th>
                        <!-- <th>Category</th>
                        <th>Action</th> -->

                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>

                    @foreach($orderList as $item)

                    <tr>
                        <td>{{ $item->user->name}}</td>

                        <td>{{ $item->address}}</td>
                        <td>{{ $item->phone}}</td>
                        <td>{{ $item->code}}</td>

                        @if($item->status ==1)
                        <td class="btn btn-secondary"> Đang xử lí</td>

                        @endif
                        @if($item->status ==2)
                        <td class="btn btn-primary"> Đang giao</td>

                        @endif
                        @if($item->status ==3)
                        <td class="btn btn-success"> Giao Thành công</td>

                        @endif
                        @if($item->status ==4)
                        <td class="btn btn-danger"> Đã hủy</td>

                        @endif
                        <td>
                            <a href="{{route('admin.viewDetail',$item->id)}}" class="btn btn-success">View Detail</a>
                        </td>
                        <!-- <td> <a href="{{route('admin.order.delete',['id' => $item->id])}}">
                                <button class="btn btn-primary ml-4">Delete</button>
                            </a>
                        </td> -->



                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection