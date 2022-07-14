@component('mail::message')
# New Payment Received - OrderNo {{$newestorder->orderno}}


<p>A payment of R{{$newestorder->total}} has been made on Tattoo #Me. Congratulations on your sale!</p>

{{-- @component('mail::button', ['url' => '{{route('orders.list.single', $newestorder->id)}}'])
View order
@endcomponent --}}
<a href="{{route('orders.list.single', $newestorder->id)}}" style="background: #151515; padding:8px 10px; border-radius:5px;text-decoration:none;color:#fff;"> View Order</a>

Thanks,<br>
Tattoo #Me
@endcomponent
