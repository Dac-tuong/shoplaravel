@extends('admin_layout')
@section('admin_content')
<h1>Trang danh sách loại sản phẩm</h1>
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên phiếu giảm giá</th>
                <th>Mã giảm giá</th>
                <th>Số lượng phiếu</th>
                <th>Giảm theo</th>
                <th>Giá trị giảm</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $list_coupon as $coupon)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $coupon->name_coupon }}</td>
                <td>{{ $coupon->coupon_code }}</td>
                <td>{{ $coupon->coupon_qty }}</td>
                <td>{{ $coupon->coupon_type }}</td>
                <td>{{ $coupon->discount }}</td>
                <td>{{ $coupon->start_date }}</td>
                <td>{{ $coupon->end_date }}</td>
                <td><a href="">Sửa</a>/<a href="{{URL::to('/delete-coupon'.'/'.$coupon->id_coupon)}}">Xóa</a></td>
            </tr>

            @endforeach
        </tbody>

    </table>
</div>

@endsection