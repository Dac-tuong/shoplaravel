@extends('layout')
@section('content')
<h1>Trang Check Out</h1>
<?php

use Illuminate\Support\Facades\Session;

$cart = Session::get('cart');
$total_price = Session::get('total_price');
$coupon_session = Session::get('coupon');

?>
<div>
    <a href="{{URL::to('/cart')}}">Trở lại trang giỏ hàng</a>
</div>


<div class="row">
    <div class="col-sm-8">
        <div class="check-out">
            <form class="form-group">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                    </div>

                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="text" name="phonenumber" id="phonenumber"
                            placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="email_order" id="email_order"
                        placeholder="Email người nhận">
                </div>

                <div class="mb-3 row">
                    <div class="col-md-4">
                        <select id="city" name="city" class="form-control">
                            <option value="">Chọn tỉnh thành phố</option>
                            @foreach($provinces as $province)
                            <option value=" {{ $province->matp }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select id="district" name="district" class="form-control">
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="wards" name="wards" class="form-control">
                            <option value="">Chọn Xã/Phường</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea class="form-control note-user" name="note_order" id="note_order"
                        placeholder="Ghi chú"></textarea>
                </div>
                <div class="mb-3">
                    <button class="send-order mb-2" type="submit" id="" name="add_shipping_address" id="">Hoàn thành
                        thanh
                        toán</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="cart-info ">
            <h3>Thông tin giao hàng</h3>
            @if($cart && count($cart) > 0)
            <table class="table-cart">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['tensp'] }}</td>
                        <td>hình ảnh</td>
                        <td>{{ number_format($item['gia'], 0, ',', '.') }} VND</td>
                        <td>
                            {{ $item['soluong'] }}
                        </td>
                        <td>{{ number_format($item['total'], 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Giỏ hàng của bạn đang trống.</p>
            @endif

            <div>
                @if ($cart)
                <!-- MỞ ĐẦU CỦA CÂU LỆNH IF CÓ SESSION COUPON -->
                @if ($coupon_session)
                <!-- DÒNG LỆNH LẶP CÁC THÀNH PHẦN TRONG COUPON  -->
                @foreach ($coupon_session as $coupon )
                <!-- NẾU ĐIỀU KIỆN BẰNG PERCENT  -->
                @if ($coupon['coupon_type'] == 'percent')
                @php
                $price_discount = ($total_price * $coupon['discount'])/100;
                $price_cart = ($total_price - $price_discount) ;
                Session::put('final_total_cart',$price_cart)
                @endphp
                <p>Tổng đơn hàng <strong id="price_cart">{{ number_format($price_cart, 0, ',', '.') }}</strong> VNĐ</p>
                <!-- NẾU ĐIỀU KIỆN BẰNG FIXED  -->
                @elseif($coupon['coupon_type'] == 'fixed')
                @php
                $price_discount = $coupon['discount'];
                $price_cart = ($total_price - $price_discount);
                Session::put('final_total_cart',$price_cart)
                @endphp
                <p>Tổng đơn hàng <strong id="price_cart">{{ number_format($price_cart, 0, ',', '.') }}</strong> VNĐ</p>
                @endif
                @endforeach
                <!-- KẾT THÚC VÒNG LẶP FOREACH -->
                <!-- NẾU KHÔNG CÓ SESSION COUPON  -->
                @else
                @php
                $price_cart = $total_price;
                Session::put('final_total_cart',$price_cart)
                @endphp
                <p>
                    Tổng đơn hàng <strong id="price_cart">{{ number_format($price_cart, 0, ',', '.') }}</strong> VNĐ
                </p>
                @endif

                @endif
                <p> Phí vận chuyển <strong id="feeship">0</strong> VND</p>

                <p>Tổng giá trị:<strong id="displayTotal">0</strong> VND</p>
            </div>
        </div>


    </div>
</div>



@endsection