@if($order->status == 2)
	<p> Đơn hàng của bạn đã bị hủy bởi quản trị viên</p>
	<p>Mã đơn hang : #{!! $order->id !!}</p>
	<p>{!! url('')  !!}</p>
@endif
@if($order->status == 3)
	<p> Đơn hàng của bạn đang được xử lí</p>
	<p>Mã đơn hang : #{!! $order->id !!}</p>
	<p>{!! url('')  !!}</p>
@endif
@if($order->status == 4)
	<p> Thông báo đang giao hàng</p>
	<p>Mã đơn hang : #{!! $order->id !!}</p>
	<p>{!! url('')  !!}</p>
@endif
@if($order->status == 6)
	<p> Thông báo đã nhận hàng thành công</p>
	<p>Mã đơn hang : #{!! $order->id !!}</p>
	<p>{!! url('')  !!}</p>
@endif