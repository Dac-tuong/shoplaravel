@extends('layout')
@section('content')

<div class="header-content">
    <h3>DANH MỤC THƯƠNG HIỆU</h3>
    <ul class="menu-brand">
        @foreach ($brands as $brand)
        <li class="brand-item"><a href="">{{$brand->brand_name}}</a></li>
        @endforeach

    </ul>
</div>
<div>
    <h3>SẢN PHẨM MỚI NHẤT</h3>
    <div class="row">
        @foreach ($products as $key => $product)
        <div class="col-lg-2 col-md-4 col-sm-6">
            <form>
                <div class="home-product-item">
                    @csrf
                    <!-- Input ẩn để lưu trữ thông tin sản phẩm -->
                    <input type="hidden" value="{{ $product->product_id }}"
                        class="cart_product_id_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->product_name }}"
                        class="cart_product_name_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->product_image }}"
                        class="cart_product_image_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->product_price }}"
                        class="cart_product_price_{{ $product->product_id }}">
                    <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">

                    <!-- Link đến trang chi tiết sản phẩm -->
                    <a href="{{ URL::to('/detail-product'.'/' . $product->product_id) }}">
                        <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product->product_image) }}"
                            alt="{{ $product->product_name }}" />

                        <h5 class="home-product-item__name">{{ $product->product_name }}</h5>
                        <div class=" home-product-item__price">
                            <span class="home-product-item__price-old">3.899.000 ₫</span>
                            <span class="home-product-item__price-current">
                                {{ number_format($product->product_price, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class=" home-product-item__origin">
                            <span class="home-product-item__origin-brand">{{$product->brand_name}}</span>
                            <span class="home-product-item__origin-warehouse"> Hồ Chí Minh</span>
                        </div>
                    </a>

                    <!-- Nút thêm vào giỏ hàng -->
                    <button type="button" class="btn btn-default add-to-cart"
                        data-id_product="{{ $product->product_id }}" name="add-to-cart">
                        Thêm giỏ hàng
                    </button>
                </div>
            </form>

            @endforeach
        </div>
        <!-- Hiển thị liên kết phân trang tùy chỉnh -->
        <div class="pagination">
            @if ($products->onFirstPage())
            <span>&laquo; Previous</span>
            @else
            <a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            @if ($page == $products->currentPage())
            <span>{{ $page }}</span>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
            @endforeach

            @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" rel="next">Next &raquo;</a>
            @else
            <span>Next &raquo;</span>
            @endif
        </div>

    </div>


    @endsection