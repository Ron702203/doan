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
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                        
                        <!-- <th>Category</th>
                        <th>Action</th> -->

                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>@php $total =0 @endphp
                    @foreach($orderDetail as $item)

                    <tr>
                        <td>{{ $item->product->name}}</td>

                        <td>{{ $item->product->price}}</td>
                        <td>{{ $item->quantity}}</td>
                        <td>{{ number_format($item->product->price * $item->quantity)}}</td>
                        @php $total +=$item->product->price * $item->quantity @endphp
                      
                       
                        <!-- <td> <a href="{{route('admin.order.delete',['id' => $item->id])}}">
                                <button class="btn btn-primary ml-4">Delete</button>
                            </a>
                        </td> -->



                    </tr>
                    @endforeach
                </tbody>
            </table>

         
          <div class="row">
           <div class="col-12">
            Cập nhật trạng thái đơn hàng
           
           </div>
            <div class="col-4">
            
            <form action="{{route('admin.updateOrder')}}" method="post">
                <input type="hidden" name="order_id" value="{{$findOrder->id}}">
                @csrf
    <select name="status" class="form-control" id="">
        @if($findOrder->status == 1) 
            <option value="1" selected>Đang xử lý</option>
        @else
            <option value="1">Đang xử lý</option>
        @endif

        @if($findOrder->status == 2) 
            <option value="2" selected>Đang giao</option>
        @else 
            <option value="2">Đang giao</option>
        @endif

        @if($findOrder->status == 3) 
            <option value="3" selected>Giao thành công</option>
        @else 
            <option value="3">Giao thành công</option>
        @endif

        @if($findOrder->status == 4) 
            <option value="4" selected>Đã hủy</option>
        @else 
            <option value="4">Đã hủy</option>
        @endif
    </select>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
            </div>
           </div>
          
            <h1> total: {{$total}}</h1>
        </div>
    </div>
</div>

@endsection