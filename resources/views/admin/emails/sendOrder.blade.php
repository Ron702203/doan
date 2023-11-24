
<style>
    .send-mail{
        width: 500px;
        margin: 0 auto;
        padding: 15px;
        text-align: center;
    }
</style>
<div class="send-mail">
    
<h2>Xin chào {{$data['name']}}</h2>


<strong> Mã đơn hàng: {{ $order->code }}</strong>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @php $total = 0 @endphp
    @foreach($orderSend as $item)
    @php $total = $item->product->price * $item->quantity @endphp
 

    <tr>
      <th scope="row">1</th>
      <td>{{$item->product->name}}</td>
      <td>{{$item->quantity}}</td>
      <td>{{$item->product->price}}</td>
 
    </tr>
    @endforeach
  </tbody>
</table>
<strong> {{$data['message']}}</strong>
<strong> {{ $total }}</strong>

<p>Cảm ơn bạn đã đặt hàng</p>
</div>