<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{URL::asset('')}}Home/images/thai.PNG">
    <link rel="stylesheet" href="{{URL::asset('')}}Home/plug-in/bs3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('')}}Home/plug-in/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="{{URL::asset('')}}Home/plug-in/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{URL::asset('')}}Home/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @yield('css')
</head>
<body>
<div class="icon-up">
    <a href="" id="scroll-top" style="display: none"><img src="https://media3.giphy.com/media/4NcX2yxzh8zsnh0rTk/source.gif" alt=""></a>
</div>
<div class="navbar topbar">
    <div class="container">
        <div class="col-md-6">
            <a class="btn" href="#">Giới thiệu</a>
            <a class="btn" href="#">Liên hệ</a>
            <a class="btn" href="#">Vị trí</a>
            <a class="btn" href="#">Theo dõi chúng tôi</a>
            <a class="btn" href="#">Blog</a>
        </div>
        <div class="col-md-6">
            @if(empty(Auth::guard('home')->user()->email))
                <div class="col-md-6" style="position: absolute;right: 0; top: 40px;z-index: 10">
                    @include('home.Home.Notification')
                </div>
                <div class="nut">
                    <a href="{{action('home\Home@sign_up')}}" class="btn btn-warning pull-right">Đăng ký</a>
                    <a class="btn btn-warning pull-right" id="login" style="margin-right: 5px">Đăng nhập</a>
                </div>
                <form action="{{route('home-login')}}" method="post" class="form-inline" role="form" id="home_login"
                      style="width: 500px">
                    {{csrf_field()}}
                    <div style="margin-top: 0; width: 150px;" class="form-group">
                        <input style="width: 100%" type="email" class="form-control" name="email" id=""
                               placeholder="email ...">
                    </div>
                    <div style="margin-top: 0; width: 150px;" class="form-group">
                        <input style="width: 100%" type="password" class="form-control" name="password" id=""
                               placeholder="password ...">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            @else
                <button class="btn btn-default dropdown-toggle btntopbar pull-right" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    {{Auth::guard('home')->user()->name}}
                    @if(!empty(Auth::guard('home')->user()->avatar))
                        <img src="{{URL::asset('')}}upload/avatar/{{Auth::guard('home')->user()->avatar}}" width="20px" height="20px"
                             class="img-circle">
                        <span class="caret"></span>
                    @else
                        <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png" width="20px" height="20px"
                             class="img-circle">
                        <span class="caret"></span>
                    @endif
                </button>
                <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                    <li>
                        <a>{{Auth::guard('home')->user()->full_name}}</a>
                    </li>
                    <li>
                        <a href="#">Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="#">Đổi mật khẩu</a>
                    </li>
                    <li>
                        <a href="{{route('home-logout')}}">Thoát</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('home')}}"><img
                        src="{{URL::asset('')}}Home/images/thai.PNG" alt=""
                        style="padding-left: 65px; width: 200px"></a>
            </div>
            <div class="col-md-6" id="search">
                <div class="form-group" style="margin-left: 40px;
						box-shadow: 1px 1px 10px -5px #333;">
                    <input type="search" class="form-control" style="width: 100%" name="search_product"
                           id="search_product" placeholder="Tìm kiếm...">
                </div>
                <div id="list_product" style="z-index: 1000; position: absolute;top: 35px; left: 55px;"
                     class="form-group thai"><br></div>
                {{csrf_field()}}
            </div>
            <div class="col-md-3" align="right">
                <p style="color: #999">Hotline</p>
                <p style="font-size: 20px;font-weight:700;font-family: 'Roboto', sans-serif;">(+84)971-874-749</p>
            </div>
        </div>
    </div>
</header>

<div class="main-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <nav class="navbar navbar-inverse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{action('home\Laptop@index')}}">Máy tính</a></li>
                        <li><a href="{{action('home\PhuKien@index')}}">Phụ kiện</a></li>
                        <li><a href="{{action('home\BanGaming@index')}}">Bàn Gaming</a></li>
                        <li><a href="{{action('home\GheGaming@index')}}">Ghế Gaming</a></li>
                        <li><a href="#">News</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right icon-cart">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-heart-empty"></i></a>
                            <span class="icon-number">0</span>
                        </li>
                        <li>
                            <a href="{{route('cart')}}" class="checkout"><i
                                    class="glyphicon glyphicon-shopping-cart"></i></a>
                            <span class="icon-number">{{count($cart->items)}}</span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Liên hệ với chúng tôi</h3>
                        <p style="margin-bottom: 20px">Phục vụ chuyên nghiệp.</p>
                        <p style="margin-bottom: 20px">Giá cả phải chăng.</p>
                        <p><span class="glyphicon glyphicon-globe"></span> Phù Lỗ, Sóc Sơn, Hà Nội.</p>
                        <p><span class="glyphicon glyphicon-envelope"></span> phuongthai98@gmail.com</p>
                        <p><span class="glyphicon glyphicon-phone"></span> (+84) 971-874-749</p>
                        <p><span class="glyphicon glyphicon-dashboard"></span> ( T2-T7 ) 10:00 - 19:00</p>
                    </div>
                    <div class="col-md-2">
                        <h3>Thông tin</h3>
                        <ul>
                            <li>
                                <a href="">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="">Mô tả</a>
                            </li>
                            <li>
                                <a href="">Chính sách bảo mật</a>
                            </li>
                            <li>
                                <a href="">Thương hiệu</a>
                            </li>
                            <li>
                                <a href="">Vị trí</a>
                            </li>
                            <li>
                                <a href="">Liên kết</a>
                            </li>
                            <li>
                                <a href="">Bản đồ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Dịch vụ</h3>
                        <ul>
                            <li>
                                <a href="">Cửa hàng</a>
                            </li>
                            <li>
                                <a href="">Đại lý</a>
                            </li>
                            <li>
                                <a href="">Hợp tác</a>
                            </li>
                            <li>
                                <a href="">Marketing</a>
                            </li>
                            <li>
                                <a href="">Bảo mật</a>
                            </li>
                            <li>
                                <a href="">Hàng đầu Việt Nam</a>
                            </li>
                            <li>
                                <a href="">Khách hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Tin tức</h3>
                        <p>Chúng tôi cam kết cả về chất lượng và giá cả hợp lý. Bảo hành trọn đời!</p>
                        <input type="text" name="" id="input" class="form-control" value="" required="required"
                               pattern="" title="" placeholder="Nhập địa chỉ email của bạn..."
                               style="width: 250px; float: left;margin: 5px 0;">
                        <button type="button" class="btn btn-warning" style="margin: 5px 0 ">Theo dõi</button>
                        <p style="margin: 5px 0;">Theo dõi chúng tôi trên mạng xã hội</p>
                        <ul class="ul-icon">
                            <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer/icon-1.PNG" alt=""></a>
                            </li>
                            <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer/icon-2.PNG" alt=""></a>
                            </li>
                            <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer/icon-3.PNG" alt=""></a>
                            </li>
                            <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer/icon-4.PNG" alt=""></a>
                            </li>
                            <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer/icon-5.PNG" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ft-duoi">
                <div class="left">
                    <p>Bản quyền template - <img style="width: 20px"
                                                 src="https://i.pinimg.com/originals/0c/e6/06/0ce6061c72025cb98854de1ae1bed392.png"
                                                 alt="">
                        <a style="color: #1a66ff" href="https://www.facebook.com/npthaii">Nguyễn PhươngThái</a>
                    </p>
                </div>
                <div class="right">
                    <ul>
                        <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer-duoi/icon-1.PNG" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer-duoi/icon-2.PNG" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer-duoi/icon-3.PNG" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer-duoi/icon-4.PNG" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{URL::asset('')}}Home/images/icon-footer-duoi/icon-5.PNG" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@yield('footer')

<script type="text/javascript" src="{{URL::asset('')}}Home/plug-in/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{URL::asset('')}}Home/plug-in/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript"
        src="{{URL::asset('')}}Home/plug-in/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script type="text/javascript">
    $('.owl-one').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            1000: {
                items: 1
            }
        }
    });
    $('.owl-two').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });
    var mybutton = document.getElementById("scroll-top")
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    $(document).ready(function () {
        $('#search_product').keyup(function () { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url: "{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {query: query, _token: _token},
                    success: function (data) { //dữ liệu nhận về
                        $('#list_product').fadeIn();
                        $('#list_product').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là list_product
                    }
                });
            } else {
                $('#list_product').css('display', 'none');
            }
        });
        $(document).on('click', '.search_li', function () {
            $('#search_product').val($(this).text());
            $('#list_product').fadeOut();
        });
        $(document).on('click', 'body', function () {
            $('#list_product').fadeOut();
        });
    });
    $(document).ready(function () {
        $('#login').on('click', function () {
            $('.nut').css('display', 'none');
            $('#home_login').css({
                'opacity': 1,
                'left': '150px',
                'transition': '1.5s',
                'z-index':10
            });
        })
    });
    $("#scroll-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
</script>
</body>
</html>
