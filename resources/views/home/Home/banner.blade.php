<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('home.Home.menu-item')
            </div>
            <div class="col-md-9 row" style="padding-right: 0px">
                <div class="owl-one owl-carousel owl-theme">
                    @foreach($banner as $v)
                        <div class="item">
                            <img class="shopnow1" data-src="123" src="{{URL::asset('')}}upload/banner/{{$v->image}}"
                                 style="height: 435px">
                            <div class="carousel-caption shopnow">
                                <h1 style="color :#fff">Big choice of<br/>Plumbing products</h1>
                                <p style="color: #fff">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Etiam
                                    pharetra laoreet
                                    dui quis molestie.</p>
                                <a class="btn btn-lg btn-warning" href="#" role="button">Mua ngay</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="subtitle">
    <div class="container">
        <div class="row">
            <table  style="box-shadow: 0px 50px 40px -40px">
                <tr>
                    <td width="25%">
                        <img src="{{URL::asset('')}}Home/images/sub1.PNG" alt="">
                        <h3>Free ship</h3>
                        <p>Cho đơn hàng từ 150k</p>
                    </td>
                    <td width="25%">
                        <img src="{{URL::asset('')}}Home/images/sub2.PNG" alt="">
                        <h3>Hỗ trợ 24/7</h3>
                        <p>Bất cứ lúc nào</p>
                    </td>
                    <td width="25%">
                        <img src="{{URL::asset('')}}Home/images/sub3.PNG" alt="">
                        <h3>100% An toàn</h3>
                        <p>Thanh toán</p>
                    </td>
                    <td width="25%">
                        <img src="{{URL::asset('')}}Home/images/sub4.PNG" alt="">
                        <h3>Nhiều ưu đãi</h3>
                        <p>Lên đến 90%</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
