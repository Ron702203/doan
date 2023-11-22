@if(Request::is('product_detail/*'))
<div class="container">

    <ul class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{route('clienthome')}}">TRANG CHỦ</a></li>

        <li class="breadcrumb-item">
            <a href="">{{$product->category->name}}</a>

        </li>
        <li class="breadcrumb-item">
            <a href="">{{$product->name}}</a>
        </li>
    </ul>
</div>
@elseif(Request::is('cart'))
<div class="container">

    <ul class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{route('clienthome')}}">TRANG CHỦ</a></li>

        <li class="breadcrumb-item">
            <a href="">Cart</a>

        </li>
    </ul>
</div>

@endif