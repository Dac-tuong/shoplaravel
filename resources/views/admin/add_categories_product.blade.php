@extends('admin_layout')
@section('admin_content')
<?php

use Illuminate\Support\Facades\Session;

$message_success = Session::get('message_success');
if ($message_success) {
    echo '<p class="text-success" >', $message_success, '</p>';
    Session::put('message_success', null);
}

?>

<form action="{{URL::to('/save-category-product')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label></label>
        <input type="text" class="form-control" name="categories_product_name" placeholder="Nhập tên loại">
    </div>
    <div class="form-group">
        <label>Tình Trạng</label>
        <select name="categories_product_status" class="form-control">
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>
        </select>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
</form>
@endsection