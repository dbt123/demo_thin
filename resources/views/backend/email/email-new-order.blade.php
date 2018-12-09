<p>Chi tiết đơn hàng : #{!! $order->id !!}</p>
@foreach($orderItem as $item)
	<p>{!! $item->name !!} x {!! $item->quantity !!}</p>
@endforeach
<p>{!! url('') !!}</p>