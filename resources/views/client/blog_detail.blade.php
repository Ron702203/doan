@extends('client.layout')
@section('title','blogDetails')
@section('content')
<div class="container">

    <div class="content__area">
        <div class="row">

            <div class="col-md-6 col-12 product__gallery">
                <div class="img"> <img src="{{asset('images')}}/{{$blog->image}}" alt=""></div>
            </div>
            <div class="col-md-6 col-12">
                <div class="product__summary">
                    <h1>{{$blog->title}}</h1>

                    <p>{{$blog->desc}}</p>


                    <div class="row row-reason mb-4">
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                100% bông trắng tinh khiết
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                Bảo vệ đường chỉ trọn đời
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                Miễn phí gói quà
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                Miễn phí gói chân không
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                100% Ảnh chụp tại shop
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-reason">
                            <div class="reason">
                                <i class="fa-solid fa-check"></i>
                                Bảo hành gấu bông 6 tháng
                            </div>
                        </div>
                    </div>

                </div>
                <div class="hotline mb-4">
                    <strong>Đặt hàng online: 0398827475</strong>
                    <strong>Mua hàng buôn/sỉ: 039742682</strong>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection