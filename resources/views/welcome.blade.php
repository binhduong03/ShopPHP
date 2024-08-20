<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('public/forntend/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">D</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form method="post" action="{{URL::to('tim-kiem')}}">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="keywords_submit" class="form-control" placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <button type="submit" name="search_item" class="input-group-text bg-transparent text-primary" style="outline: none;" >
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{URL::to('show-cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{$totalItems}}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Danh mục sản phẩm<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($cate_product as $key => $cate)
                                <a href="{{URL::to('/danh-muc-san-pham/'. $cate->CategoryProductId)}}" class="dropdown-item">{{$cate->Name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Thương hiệu<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($trade_product as $key => $trade)
                                <a href="{{URL::to('/thuong-hieu-san-pham/'. $trade->TrademarkId)}}" class="dropdown-item">{{$trade->Name}}</a>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{URL::to('/trang-chu')}}" class="nav-item nav-link active">Trang chủ</a>
                            <a href="{{URL::to('shop')}}" class="nav-item nav-link">Cửa hàng</a>
                            <a href="detail.html" class="nav-item nav-link">Tin tức</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                <div class="dropdown-menu rounded-0 m-0">

                                    <?php
                                        $userid = Session::get('UserID');
                                        $shippingid = Session::get('ShippingId');
                                        if($userid != NULL && $shippingid == NULL){
                                    ?>
                                            <a href="{{URL::to('checkout')}}" class="dropdown-item">Thanh toán</a>
                                    <?php
                                        }elseif($userid != NULL && $shippingid != NULL){
                                    ?>
                                        <a href="{{URL::to('payment')}}" class="dropdown-item">Thanh toán</a>
                                    <?php
                                        }else{
                                    ?>
                                        <a href="{{URL::to('login-checkout')}}" class="dropdown-item">Thanh toán</a>
                                    <?php
                                        }
                                    ?>

                                    <a href="{{URL::to('show-cart')}}" class="dropdown-item">Giỏ hàng</a>
                                    
                                </div>
                            </div>
                            <a href="{{URL::to('contact')}}" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                           @if(Session::has('UserID'))
                            <?php $user = Session::get('User'); ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    {{$name->FullName}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right rounded-0 m-0">
                                    <a href="{{ URL::to('user-info') }}" class="dropdown-item">Thông tin người dùng</a>
                                    <a href="{{ URL::to('order-history') }}" class="dropdown-item">Lịch sử đơn hàng</a>
                                    <a href="{{ URL::to('logout-checkout') }}" class="dropdown-item">Đăng xuất</a>
                                </div>
                            </div>
                        @else
                            <a href="{{ URL::to('login-checkout') }}" class="nav-item nav-link">Đăng nhập</a>
                            <a href="{{ URL::to('register-checkout') }}" class="nav-item nav-link">Đăng ký</a>
                        @endif
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('public/frontend/img/carousel-1.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Uy tín lên hàng đầu</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Laptop hiện đại</h3>
                                    <a href="{{URL::to('shop')}}" class="btn btn-light py-2 px-3">Mua hàng ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('public/frontend/img/carousel-2.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Uy tín lên hàng đầu</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Giá cả hợp lý</h3>
                                    <a href="{{URL::to('shop')}}" class="btn btn-light py-2 px-3">Mua hàng ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hoàn trả trong 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- new product -->
        @yield('content')
    <!-- Products End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Thương hiệu</span></h2>
            </div>
        <div class="row px-xl-5 pb-3">
            @foreach($trade_home as $key => $trade)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{ $trade->product_count }} Sản phẩm</p>
                    <a href="{{URL::to('thuong-hieu-san-pham/'. $trade->TrademarkId)}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('public/backend/assets/img/Trademark/'. $trade->Logo) }}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{$trade->Name}}</h5>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    
    <!-- Offer End -->

    <!-- SẢN PHẨM MỚI NHẤT -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới nhất</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($new_product as $key => $all)
            <?php
                // Tính giá sau khi đã giảm giá
                $discountedPrice = $all->Price - $all->PriceDiscount;
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{asset('public/backend/assets/img/product/'. $all->Thumbnail) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$all->Name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($all->Price). ' '.'VNĐ'}}</h6>
                            
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('product-detail/'. $all->ProductId)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <form action="{{ URL::to('/save-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="productid_hidden" value="{{ $all->ProductId }}">
                            <input type="hidden" name="qty" value="1"> 
                            <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END SẢN PHẨM MỚI NHẤT -->


        <!-- Subscribe Start -->
    
    <!-- Subscribe End -->

    <!-- SẢN PHẨM HOT NHẤT -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm hot nhất</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($hot_product as $key => $all)
            <?php
                // Tính giá sau khi đã giảm giá
                $discountedPrice = $all->Price - $all->PriceDiscount;
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{asset('public/backend/assets/img/product/'. $all->Thumbnail) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$all->Name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($all->Price). ' '.'VNĐ'}}</h6>
                            
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{URL::to('product-detail/'. $all->ProductId)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <form action="{{ URL::to('/save-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="productid_hidden" value="{{ $all->ProductId }}">
                            <input type="hidden" name="qty" value="1"> 
                            <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END SẢN PHẨM HOT NHẤT -->
    

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('public/frontend/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Đường dẫn</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{URL::to('trang-chu')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="{{URL::to('shop')}}"><i class="fa fa-angle-right mr-2"></i>Cửa hàng</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Tin tức</a>
                            <a class="text-dark mb-2" href="{{URL::to('show-cart')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-dark mb-2" href="{{URL::to('checkout')}}"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-dark" href="{{URL::to('contact')}}"><i class="fa fa-angle-right mr-2"></i>Liên lạc</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Đường dẫn</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{URL::to('trang-chu')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="{{URL::to('shop')}}"><i class="fa fa-angle-right mr-2"></i>Cửa hàng</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Tin tức</a>
                            <a class="text-dark mb-2" href="{{URL::to('show-cart')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-dark mb-2" href="{{URL::to('checkout')}}"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-dark" href="{{URL::to('contact')}}"><i class="fa fa-angle-right mr-2"></i>Liên lạc</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{asset('public/frontend/img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('public/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('public/frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>

</html>