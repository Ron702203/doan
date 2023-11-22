<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('fe')}}/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="" src="{{asset('fe')}}/js/main.js"></script>
    <link rel="stylesheet" href="{{asset('fe')}}/js/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('fe')}}/js/owlcarousel/assets/owl.theme.default.min.css">
</head>

<body>
    @include('client.inc.header')
    @include('client.inc.banner')
    @include('client.inc.services')
    <div class="container">
        <div class="row ">
            @foreach($categoryList as $item)
            <div class="col-6 col-sm-4 home__banner"><a href="{{route('catepr',$item->id)}}">
                    <img src="{{asset('fe')}}/images/{{$item->img}}" alt="">

                </a></div>
            @endforeach
        </div>
        <div class="collection">
            <div class="collection__title">
                <h2>BỘ SƯU TẬP GẤU BÔNG</h2>
            </div>
            <div class="collection__content mt-4">
                <div class=" row ">
                    @foreach($blogList->take(3) as $blog)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="collection__content-post">
                            <a href="">
                                <img src="{{asset('images')}}/{{$blog->image}}" alt="">
                            </a>
                        </div>
                        <div class="collection__content-info">
                            <a href="{{route('show.details',['id' => $blog->id])}}">
                                <p>{{$blog->title}}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- <div class="content__more">
                <a class="btn btn-primary" href="">
                    Xem thêm
                </a>
            </div> -->
            <div class="products">
                <div class="product__title">
                    <h2>{{$catehot->name}}</h2>
                </div>
                <div class="product__content mt-4">
                    <div class=" row ">
                        @foreach ($producthot as $item)
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="product__content-post">
                                <a class="" href="{{route('product_detail',['id' => $item->id])}}">
                                    <img src="{{asset('fe')}}/images/{{ ( $item->img )}}" alt="">
                                    <p>{{$item->name}}</p>

                                </a>
                                <div class="product__content-price">
                                    <span>{{number_format($item->price)}}đ</span>
                                </div>

                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>

                <div class="content__more">
                    <a class="btn btn-primary" href="">
                        Xem tất cả các gấu bông cao cấp
                    </a>
                </div>
            </div>
            <div class="products">
                <div class="product__title">
                    <h2>{{$cateteddy->name}}</h2>
                </div>
                <div class="product__content mt-4">
                    <div class=" row ">
                        @foreach ($productteddy as $item)
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="product__content-post">
                                <a class="" href="{{route('product_detail',['id' => $item->id])}}">
                                    <img src="{{asset('fe')}}/images/{{ ( $item->img )}}" alt="">
                                    <p>{{$item->name}}</p>
                                </a>
                                <div class="product__content-price">
                                    <span>{{number_format($item->price)}}đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="content__more">
                    <a class="btn btn-primary" href="">
                        Xem tất cả các gấu bông teddy hot trend
                    </a>
                </div>
            </div>
            <div class="products">
                <div class="product__title">
                    <h2>{{$catebst->name}}</h2>
                </div>
                <div class="product__content mt-4">
                    <div class=" row ">
                        @foreach ($productbst as $item)
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="product__content-post">
                                <a class="" href="{{route('product_detail',['id' => $item->id])}}">
                                    <img src="{{asset('fe')}}/images/{{ ( $item->img )}}" alt="">
                                    <p>{{$item->name}}</p>
                                </a>
                                <div class="product__content-price">
                                    <span>{{number_format($item->price)}}đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="content__more">
                        <a class="btn btn-primary" href="">
                            Xem tất cả các black friday
                        </a>
                    </div>
                </div>
            </div>
            <div class="products">
                <div class="product__title">
                    <h2>{{$catebstnhimbong->name}}</h2>
                </div>
                <div class="product__content mt-4">
                    <div class=" row ">
                        @foreach ($productbstnhimbong as $item)
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="product__content-post">
                                <a class="" href="{{route('product_detail',['id' => $item->id])}}">
                                    <img src="{{asset('fe')}}/images/{{ ( $item->img )}}" alt="">
                                    <p>{{$item->name}}</p>
                                </a>
                                <div class="product__content-price">
                                    <span>{{number_format($item->price)}}đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="content__more">
                    <a class="btn btn-primary" href="">
                        Xem tất cả các bst hoa không tàn
                    </a>
                </div>
            </div>
            <div class="products">
                <div class="product__title">
                    <h2>{{$categautruc->name}}</h2>
                </div>
                <div class="product__content mt-4">
                    <div class=" row ">
                        @foreach ($productgautruc as $item)
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="product__content-post">
                                <a class="" href="{{route('product_detail',['id' => $item->id])}}">
                                    <img src="{{asset('fe')}}/images/{{ ( $item->img )}}" alt="">
                                    <p>{{$item->name}}</p>
                                </a>
                                <div class="product__content-price">
                                    <span>{{number_format($item->price)}}đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="content__more">
                    <a class="btn btn-primary" href="">
                        Xem tất cả các gấu bông big size
                    </a>
                </div>
            </div>

        </div>

        <div class="  row__home__service mt-5">
            <div class=" col__home__service">
                <a class="home__service" href="">
                    <img src="{{asset('fe')}}/images/content1.png" alt="">
                    <p>Giao hàng tận nhà</p>
                </a>
            </div>
            <div class=" col__home__service">
                <a class="home__service" href="">
                    <img src="{{asset('fe')}}/images/content2.png" alt="">
                    <p>Bọc quà giá rẻ</p>
                </a>
            </div>
            <div class=" col__home__service">
                <a class="home__service" href="">
                    <img src="{{asset('fe')}}/images/content3.png" alt="">
                    <p>Tặng thiệp miễn phí</p>
                </a>
            </div>
            <div class=" col__home__service">
                <a class="home__service" href="">
                    <img src="{{asset('fe')}}/images/content4.png" alt="">
                    <p>Giặt gấu bông</p>
                </a>
            </div>
            <div class=" col__home__service">
                <a class="home__service" href="">
                    <img src="{{asset('fe')}}/images/content5.png" alt="">
                    <p>Nén nhỏ gấu</p>
                </a>
            </div>
        </div>
    </div>
    </div>

    @include('client.inc.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('fe')}}/js/owlcarousel/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({

                dots: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,

                nav: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1,
                        dots: true
                    }
                }
            })
        })
    </script>
</body>

</html>