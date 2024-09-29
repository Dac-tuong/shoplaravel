 <?php

    use Illuminate\Support\Facades\Session;

    $id = Session::get('id_customer');
    $name = Session::get('name_customer')
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="{{asset("user/css/base.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/main.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/toastr.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/bootstrap.css")}}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>

 <body>


     <!-- <ul class="header__navbar-user-menu">

 <a href="{{URL::to('/login-index')}}" class="sign-in">Đăng nhập</a>
                                 <a href="{{URL::to('/register-index')}}" class="sign-up">Đăng ký</a>
                                 <a href="{{URL::to('/logout')}}">Đăng xuất</a>
         <li class="header__navbar-user-list-item">
             <a href="{{URL::to('/cart')}}">Giỏ hàng</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="">Địa chỉ của tôi</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="">Đơn mua</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="{{URL::to('/checkout')}}">Checkout</a>
         </li>
         <li class="header__navbar-user-list-item header__navbar-user-logout ">
             <a href="{{URL::to('/logout')}}">Đăng xuất</a>
         </li>
     </ul> -->
     <div class="app">
         <header class="header">
             <div class="container-xxl" style=" border: 1px solid black;">
                 <!-- header with search -->
                 <div class="header-nav row" style="margin: 0">
                     <div class="col-lg-2 col-md-3 col-sm-5 col-xs-3">
                         <div class="header__logo ">
                             <a href="{{URL::to('/')}}" class="header__logo-home">
                                 logo
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-8 col-md-6 col-sm-7">
                         <div class="header__search ">
                             <form action="{{URL::to('/search')}}" method="POST">
                                 {{csrf_field()}}
                                 <div class="header__search-input-warp">
                                     <input type="text" class="header__search-input" name='keywords_search'
                                         placeholder="Nhập để tìm kiếm">
                                 </div>
                                 <button class="header__search-btn" type="submit" name="search">
                                     <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                                     Tìm
                                 </button>
                             </form>
                         </div>
                     </div>
                     <div class="col-lg-2 col-md-3 col-sm-5 p-0">
                         <div class="controll">
                             <div class="cart">
                                 <a href="{{URL::to('/cart')}}">Cart</a>
                                 <span id="quantity-cart">

                                 </span>
                             </div>


                             <div class="customer">
                                 @if (Session::get('id_customer'))
                                 <!-- User is logged in -->
                                 <a href="{{ URL::to('/logout') }}" class="sign-out">Đăng xuất</a>
                                 @else
                                 <!-- User is not logged in -->
                                 <a href="{{ URL::to('/login-index') }}" class="sign-in">Đăng nhập</a>
                                 <a href="{{ URL::to('/register-index') }}" class="sign-up">Đăng ký</a>
                                 @endif

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </header>
         <section class="app_container">
             <div class="container-xxl" style=" border: 1px solid black;">
                 <div class="nav-sidebar">
                     <ul class="menu">
                         <li class="megamenu"><a href="{{URL::to('/')}}">TRANG CHỦ</a></li>
                         <li class="megamenu">
                             <a href="">ĐIỆN THOẠI</a>
                             <ul class="sub-megamenu">
                                 @foreach ( $brands as $brand )
                                 <li>
                                     <a href="{{URL::to('/brand'.'/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
                                 </li>
                                 @endforeach
                             </ul>
                         </li>

                         <li class="megamenu"><a href="">BLOG</a></li>
                         <li class="megamenu"><a href="">KHÁC</a></li>
                         <li class="megamenu"><a href="">PHỤ KIỆN</a></li>
                         <li class="megamenu"><a href="">TIN TỨC</a></li>
                     </ul>

                 </div>

                 <div class="content">

                     <div class="home-product">
                         @yield('content')
                     </div>
                 </div>
             </div>

         </section>

         <footer class="footer">
             <div class="container-xxl">
                 <div class="row">
                     <div class="col-sm-3">
                         <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Trung tâm trợ giúp</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">TickId Mail</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Hướng dẫn mua hàng</a>
                             </li>
                         </ul>
                     </div>
                     <div class="col-sm-3">
                         <h3 class="footer__heading">Giới thiệu</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Giới thiệu về tickID</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Tuyển dụng</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Điều khoản</a>
                             </li>
                         </ul>
                     </div>

                     <div class="col-sm-3">
                         <h3 class="footer__heading">Theo dõi</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-facebook"></i>
                                     <span>Facebook</span>
                                 </a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-instagram-square"></i>
                                     <span>Instargram</span>
                                 </a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-linkedin"></i>
                                     <span>Linkedin</span>
                                 </a>
                             </li>
                         </ul>
                     </div>

                 </div>
             </div>
         </footer>
     </div>




     <script src="{{asset("user/js/jquery-3.6.0.min.js")}}"></script>
     <script src="{{asset("user/js/sweetalert2.js")}}"></script>
     <script src="{{asset("user/js/toastr.js")}}"></script>

     <script>
         $(document).ready(function() {
             //show quantity cart
             show_cart_quantity();

             function show_cart_quantity() {
                 $.ajax({
                     url: "{{ url('/count-cart') }}", // Sử dụng URL helper để đảm bảo URL chính xác
                     method: "GET",
                     success: function(data) {
                         $('#quantity-cart').html(data);
                     }
                 });
             }


             $('.add-to-cart').click(function() {
                 var id = $(this).data('id_product');

                 // Lấy thông tin sản phẩm từ các input ẩn trong HTML
                 var productData = {
                     cart_product_id: $('.cart_product_id_' + id).val(),
                     cart_product_name: $('.cart_product_name_' + id).val(),
                     cart_product_image: $('.cart_product_image_' + id).val(),
                     cart_product_price: $('.cart_product_price_' + id).val(),
                     cart_product_qty: $('.cart_product_qty_' + id).val(),
                     _token: $('input[name="_token"]').val()
                 };

                 // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
                 $.ajax({
                     url: '{{url("/add-cart")}}',
                     method: 'POST',
                     data: productData,
                     success: function(response) {
                         toastr.options = {
                             "positionClass": "toast-bottom-right",
                             "timeOut": "3000"
                         };
                         toastr.success('Đã thêm sản phẩm vào giỏ hàng', '');
                         show_cart_quantity();

                     },

                 });
             });
         });
     </script>


     <script src="{{asset("user/js/select_shipping.js")}}"></script>
     <script>
         $(document).ready(function() {
             var priceCartText = $('#price_cart').text();
             var priceCartValue = parseInt(priceCartText.replace(/\./g, ''));

             var targetNode = document.getElementById('feeship');

             //  console.log('Giá phí vận chuyển:', priceFeeshipValue);
             var config = {
                 childList: true,
                 characterData: true,
                 subtree: true
             };

             var checkChangeFeeship = function(listFeeships) {
                 for (var feeship of listFeeships) {
                     if (feeship.type === 'childList' || feeship.type === 'characterData') {
                         var priceFeeshipText = $('#feeship').text();
                         var priceFeeshipValue = parseInt(priceFeeshipText.replace(/\./g, ''));


                         totalOrder = priceFeeshipValue + priceCartValue;
                         $("#displayTotal").html(totalOrder);
                     }
                 }
             }
             var observer = new MutationObserver(checkChangeFeeship);
             observer.observe(targetNode, config)

         });
     </script>

     <script>
         $(document).ready(function() {
             $('.send-order').click(function() {

                 var fullname = $('#fullname').val();
                 var phonenumber = $('#phonenumber').val();
                 var email_order = $('#email_order').val();
                 var city = $('#city').val();
                 var district = $('#district').val();
                 var wards = $('#wards').val();
                 var address = $('#address').val();
                 var note_order = $('#note_order').val();
                 var _token = $('input[name="_token"]').val();
                 var priceFeeshipText = $('#feeship').text();
                 var priceFeeshipValue = parseInt(priceFeeshipText.replace(/\./g, ''));
                 var priceOrderText = $('#displayTotal').text();
                 var priceOrderValue = parseInt(priceOrderText.replace(/\./g, ''));

                 // Kiểm tra dữ liệu trước khi gửi


                 $.ajax({
                     url: '/order-product',
                     method: 'POST',
                     data: {
                         fullname: fullname,
                         phonenumber: phonenumber,
                         email_order: email_order,
                         city: city,
                         district: district,
                         wards: wards,
                         address: address,
                         note_order: note_order,
                         feeship: priceFeeshipValue,
                         total_order: priceOrderValue,
                         _token: _token
                     },
                     success: function(response) {
                         if (response.status === 'success') {
                             // Hiển thị thông báo thành công
                             alert(response.message); // Hiển thị thông báo đã lưu thành công
                         }
                     },
                     error: function(xhr, status, error) {
                         alert('Có lỗi xảy ra khi gửi đơn hàng: ' + error);
                     }
                 });
             });

         });
     </script>
 </body>

 </html>