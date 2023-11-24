
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
<h2>{{$data['email']}}</h2>
<strong> {{$data['message']}}</strong>

<p>Cảm ơn bạn, chúng tôi đã nhận được tin nhắn của bạn!</p>
</div>