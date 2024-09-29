@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/update-brand'.'/'. $edit_brand->brand_id)}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label></label>
        <input type="text" class="form-control" name="brand_name" value="{{ $edit_brand->brand_name}}">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
</form>

@endsection