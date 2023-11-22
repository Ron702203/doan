<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gaubongonline</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('fe')}}/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="" src="{{asset('fe')}}/js/main.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

</head>

<body>

    @include('client.inc.header')
    @include('client.inc.breadcrumb')
    <div class="container">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($carts->isEmpty())
        <div class="alert alert-warning">
            Your cart is empty!
        </div>
        @else

        <div class="row">
            <div class="col-12 col-md-12 col-lg-9">
                <table class="table ">
                    <thead>
                        <tr class="table__title">
                            <th colspan="2">Product</th>
                            <th class="product__price">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index =0 ?>
                        @foreach ($carts as $cart)
                        <?php $index++?>
                        <tr data-id="{{$cart->id}}">
                            <td> {{ $cart->product->name }}</td>
                            <td> <img src="{{asset('fe')}}/images/{{ $cart->product->img }}" width="60px" alt=""></td>
                            <td class="product__price">{{number_format($cart->product->price)}}đ</td>
                            <td>
                                <form action="{{route('cart.update',$cart->id)}}" method="POST">
                                    <div id="buy-amount">
                                        <div class="minus-btn" onclick="handleMinus()"><i class="fa-solid fa-minus"></i>
                                        </div>
                                        <input type="text" name="quantity" class="quantity cart_update" id="amount"
                                            value="{{$cart->quantity}}">
                                        <div class="plus-btn" onclick="handlePlus()"><i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>{{ number_format( $cart->product->price * $cart->quantity )}}đ</td>
                            <td>
                                <form action="{{route('cart.destroy', $cart->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div class="col-12 col-md-12 col-lg-3 m-auto">
                <div class="total mb-2">
                    <div class="container">
                        <div class="total__content mt-3">
                            <h4 class="text-center">ORDER SUMMARY</h4>
                            <div class="total__subtotal d-flex">
                                <p>Subtotal</p>
                                <p style="color:var(--pink-color)">0đ</p>
                            </div>
                            <div class="Delivery">
                                <p>Delivery</p>
                                <p>free</p>
                            </div>
                            <div class="tax">
                                <p>Tax</p>
                                <p>Free</p>
                            </div>
                            <div class="total__total">
                                <p>TOTAL</p>
                                <p>{{ number_format($total) }} VNĐ</p>
                            </div>
                            <div class="coupon d-flex ">
                                <input type="text" placeholder="Coupon code">
                                <button type="submit">APPLY</button>
                            </div>

                        </div>
                        <div class="Checkout">
                            <form action="/check-out" method="post">
                                @csrf
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}"
                                    required>
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                <input type="hidden" name="total" value="{{$total}}">
                                <button name=""> Process to checkout </button>
                            </form>
                        </div>

                        <div class="Banking ">
                            <form action="/vnpay-payment" method="post">
                                @csrf

                                <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}" required>

                                <input type="hidden" name="total" value="{{$total}}">
                                <button name="redirect"> Thanh toán bằng VnPay </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
    <script type="" src="{{asset('fe')}}/js/main.js"></script>
    <script type="" src="{{asset('fe')}}/js/jquery.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {

            $(".cart_update").change(function (e) {
                console.log("ok");
                e.preventDefault();
                var ele = $(this);
                console.log(ele.parents("tr").find(".quantity").val());
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

</body>



</html>