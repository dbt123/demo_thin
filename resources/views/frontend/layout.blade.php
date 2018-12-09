<!doctype html>
<html class="no-js" lang="en">
<head>
  <title>@yield('title')</title>
   <meta name="keywords" content="Tư vấn giúp khách hàng lựa chọn sản phẩm vay mua ô tô tốt nhất trong hệ thống các ngân hàng.">
  <meta charset="utf-8">
  <meta name="author" content="{{url('')}}">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:title" content="Vay mua ô tô - Lãi suất ưu đãi"/>
  <meta name="description"  content="Tư vấn giúp khách hàng lựa chọn sản phẩm vay mua ô tô tốt nhất trong hệ thống các ngân hàng"/>
  <meta property="og:description" content="Tư vấn giúp khách hàng lựa chọn sản phẩm vay mua ô tô tốt nhất trong hệ thống các ngân hàng"/>
  <meta property="og:site_name" content="{{url('')}}"/>
  <meta property="og:url" content="{{url('')}}"/>
  @yield('meta')
  <!-- favicon -->
  <link rel="shortcut icon" href="{{asset('fontend/images/favicon.png')}}">
  <link rel="apple-touch-icon" href="{{asset('fontend/images/apple-touch-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('fontend/images/apple-touch-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('fontend/images/apple-touch-icon-114x114.png')}}">
  <!-- animation --> 
  <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}" />
  <!-- bootstrap --> 
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}" />
  <!-- et line icon --> 
  <link rel="stylesheet" href="{{asset('frontend/css/et-line-icons.css')}}" />
  <!-- font-awesome icon -->
  <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />

  <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}" />
</style>
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
<!-- responsive -->
<!--         <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}" /> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
        <!--[if IE]>
            <link rel="stylesheet" href="css/style-ie.css" />
          <![endif]-->
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
          <![endif]-->

          <!-- Google Analytics -->

          <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120522903-1"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-120522903-1');
          </script>

   <!--   Anh update code xong, nhắc giúp em để cài goolge master tool ạ. Em cảm ơn anh.

    Nút gọi trực tiếp -->
    <a href="tel:0982781289" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="right: 50%; bottom: -25px; left: 50%" datasqstyle="{&quot;top&quot;:null}" datasquuid="4c643075-c7e6-4adf-8841-746771cfb831" datasqtop="640">
      <div class="suntory-alo-ph-circle"></div>
      <div class="suntory-alo-ph-circle-fill"></div>
      <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone" style="float: none;"></i></div>
    </a>

    <!-- CSS Call -->

    <style type="text/css">
    .caret:after{font-size: 24px}
    .suntory-alo-phone {
      background-color: transparent;
      cursor: pointer;
      height: 120px;
      position: fixed;
      transition: visibility 0.5s ease 0s;
      -webkit-transition: visibility 0.5s ease 0s;
      -moz-transition: visibility 0.5s ease 0s;
      width: 120px;
      z-index: 20000000 !important;
    }
    .suntory-alo-ph-circle {
      animation: 1.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim;
      background-color: transparent;
      border: 2px solid rgba(30, 30, 30, 0.4);
      border-radius: 100%;
      height: 100px;
      left: 0px;
      opacity: 0.1;
      position: absolute;
      top: 0px;
      transform-origin: 50% 50% 0;
      transition: all 0.5s ease 0s;
      width: 100px;
    }
    .suntory-alo-ph-circle-fill {
      animation: 2.3s ease-in-out 0s normal none infinite running suntory-alo-circle-fill-anim;
      border: 2px solid transparent;
      border-radius: 100%;
      height: 70px;
      left: 15px;
      position: absolute;
      top: 15px;
      transform-origin: 50% 50% 0;
      transition: all 0.5s ease 0s;
      width: 70px;
    }
    .suntory-alo-ph-img-circle {
      border: 2px solid transparent;
      border-radius: 100%;
      height: 50px;
      left: 25px;
      opacity: 0.7;
      position: absolute;
      top: 25px;
      transform-origin: 50% 50% 0;
      width: 50px;
      text-align: center;
    }
    .suntory-alo-phone.suntory-alo-hover, .suntory-alo-phone:hover {
      opacity: 1;
    }
    .suntory-alo-phone.suntory-alo-active .suntory-alo-ph-circle {
      animation: 1.1s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
    }
    .suntory-alo-phone.suntory-alo-static .suntory-alo-ph-circle {
      animation: 2.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
    }
    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone:hover .suntory-alo-ph-circle {
      border-color: #00aff2;
      opacity: 0.5;
    }
    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle {
      border-color: #EB278D;
      opacity: 1;
    }
    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle {
      border-color: #bfebfc;
      opacity: 1;
    }
    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone:hover .suntory-alo-ph-circle-fill {
      background-color: rgba(0, 175, 242, 0.9);
    }
    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle-fill {
      background-color: #EB278D;
    }
    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle-fill {
      background-color: rgba(0, 175, 242, 0.9);
    }
    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone:hover .suntory-alo-ph-img-circle {
      background-color: #00aff2;
    }
    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-img-circle {
      background-color: #EB278D;
    }
    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-img-circle {
      background-color: #00aff2;
    }
    @keyframes suntory-alo-circle-anim {
      0% {
        opacity: 0.1;
        transform: rotate(0deg) scale(0.5) skew(1deg);
      }
      30% {
        opacity: 0.5;
        transform: rotate(0deg) scale(0.7) skew(1deg);
      }
      100% {
        opacity: 0.6;
        transform: rotate(0deg) scale(1) skew(1deg);
      }
    }
    @keyframes suntory-alo-circle-img-anim {
      0% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      10% {
        transform: rotate(-25deg) scale(1) skew(1deg);
      }
      20% {
        transform: rotate(25deg) scale(1) skew(1deg);
      }
      30% {
        transform: rotate(-25deg) scale(1) skew(1deg);
      }
      40% {
        transform: rotate(25deg) scale(1) skew(1deg);
      }
      50% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
    }
    @keyframes suntory-alo-circle-fill-anim {
      0% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
      }
      50% {
        opacity: 0.2;
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
      }
    }
    .suntory-alo-ph-img-circle i {

      animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;
      font-size: 30px;
      line-height: 50px;
      color: #fff;
    }
    @keyframes suntory-alo-ring-ring {
      0% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      10% {
        transform: rotate(-25deg) scale(1) skew(1deg);
      }
      20% {
        transform: rotate(25deg) scale(1) skew(1deg);
      }
      30% {
        transform: rotate(-25deg) scale(1) skew(1deg);
      }
      40% {
        transform: rotate(25deg) scale(1) skew(1deg);
      }
      50% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
        transform: rotate(0deg) scale(1) skew(1deg);
      }
      .caret:after{font-size: 24px}
    </style>
<!-- 
  Chát trực tuyến -->
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5b1891578859f57bdc7beaa5/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->



  <?php $sdt = App\Item::where('key_layout', 'Hotline')->first();
  $gioithieu = App\Item::where('key_layout', 'Giới thiệu dưới chân')->where('key_item','Nội dung')->first();
  ?>
  <link rel="stylesheet" href="{{asset('frontend/css/chuan.css')}}" />
  @yield('css')
</head>
<body>
  <?php $item = App\Menu::orderby('order', 'asc')->get(); ?>

  <!--MENU DESKTOP-->
  <nav class="navbar navbar-inverse">
    <div class="container">
     <div class="navbar-header">
      <button id="nav-icon1" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/"><img src="http://chovaymuaoto.com.vn/assets/post/5b93450e844f3-08-09-2018-1ea6106ba424447a1d35jpg.jpg"></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        @foreach($item as $value)
        @if($value->parent_id == 0)
        <li class="dropdown">
          <a class="" href="{{ $value->link }}">{{ $value->name }}</a><i class="caret abc"></i>
          <?php subMenu($item, $value->id); ?>
        </li>
        @endif
        @endforeach
      </ul>
      <ul class="nav navbar-nav navbar-right xs-hidden">
        <li><span class="hotline"><i class="fa fa-phone" aria-hidden="true"></i> 0982.78.1289</span></li>
      </ul>
    </div>   					

  </div>
</div>
</nav>
<!-- end navigation panel -->

@yield('content')
<!-- footer -->
<footer>
  <div class="container footer-middle">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer-link1">
        <!-- headline -->
        <h5>GIỚI THIỆU</h5>
        <!-- end headline -->
        <!-- text -->
        <p class="footer-text">{{$gioithieu->value}}</p>
        <!-- end text -->
      </div>
      <div class="col-md-2 col-sm-6 footer-link2">
        <!-- headline -->
        <h5>DỊCH VỤ</h5>
        <!-- end headline -->
        <!-- link -->
        <ul>
          <li><a href="">Vay mua ô tô mới</a></li>
          <li><a href="">Vay mua ô tô cũ</a></li>
          <li><a href="">Vay thế chấp ô tô</a></li>
          <li><a href="">Vay tín chấp</a></li>
          <li><a href="">Vay mua nhà đất</a></li>
          <li><a href="">Vay mua nhà dự án</a></li>
          <li><a href="">Vay thế chấp nhà đất</a></li>
        </ul>
        <!-- end link -->
      </div>
      <div class="col-md-4 col-sm-6  footer-link3">
        <!-- headline -->
        <h5>THÔNG TIN LIÊN HỆ</h5>
        <!-- end headline -->
        <!-- link -->
        <ul>
          <li><i class="fa fa-mobile" aria-hidden="true"></i> 0982.78.1289</li>
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i>  chovaymuaoto.com.vn@gmail.com</li>
          <li><i class="fa fa-users" aria-hidden="true"></i>  24/7</li>
        </ul>
        <!-- end link -->
      </div>
      <div class="col-md-3 col-sm-3 col-xs-3  footer-link4">
        <!-- headline -->
        <h5>FANPAGE</h5>
        <!-- end headline -->
        <!-- link -->
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCho-vay-v%25E1%25BB%2591n-ng%25C3%25A2n-h%25C3%25A0ng-mua-%25C3%25B4-t%25C3%25B4-483681132086091%2F&tabs=timeline&width=270&height=208&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="270" height="208" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        <!-- end link -->
      </div>
    </div>
    <div class="wide-separator-line bg-mid-gray no-margin-lr margin-three no-margin-bottom"></div>

  </div>
  <div class="container-fluid bg-dark-gray footer-bottom">
    <div class="container">
      <div class="row margin-one">
        <!-- copyright -->
        <div class="col-md-6 col-sm-6 col-xs-12 copyright text-left letter-spacing-1 xs-text-center xs-margin-bottom-one">
          &copy; 2017 Bản quyền thuộc về <span class="green-text">chovaymuaoto.com.vn</span> 
          &thiết kế bởi <a href="" style="text-transform: none">Thin Dinh</a>
        </div>
        <!-- end copyright -->
      </div>
    </div>
  </div>
  <!-- scroll to top --> 
  <a href="javascript:;" class="scrollToTop"><i class="fa fa-angle-up"></i></a> 
  <!-- scroll to top End... --> 
</footer>
<!-- end footer -->
<!-- Popup -->
<button type="button" data-toggle="modal" data-target="#myModal" class="asl t_modal btn bg_red btn-lg btn-dkvayvon">Đăng ký vay vốn</button>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="post" id="my_form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Bạn cần tư vấn?</h3>
        </div>
        <div class="modal-body">
          <input placeholder="Nhập tên của bạn:" type="text" id ="name" required name="name">
          <input placeholder="Số điện thoại" type="text" id ="sdt" required name="sdt">
          <input placeholder="Email" type="email" id ="email" required name="email">
          <div class="form-group">
           <select name="loan" id="loan">
            <option value="Vay mua ô tô mới">Vay muu ô tô mới</option>
            <option value="Vay mua ô tô cũ">Vay mua ô tô cũ</option>
            <option value="Vay thế chấp ô tô">Vay thế chấp ô tô</option>
            <option value="Vay mua nhà đất">Vay mua nhà đất</option>
            <option value="Vay mua nhà dự án">Vay mua nhà dự án</option>
            <option value="Vay thế chấp nhà đất">Vay thế chấp nhà đất</option>
            <option value="Vay tín chấp">Vay tín chấp</option>
          </select>
        </div>
        <input id ="money" placeholder="Số tiền vay?" id ="money" type="number"  step="1000000" min="0" required name="money">
        <span id="doitien" class="dn">jsdjks</span>
        <textarea placeholder="Nội dung cần trao đổi?" id ="cmt"></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default t_fix_btn">Gửi</button>
      </div>
    </form>
  </div>

</div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog t_mg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header t_pd">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center">Xin chân thành cảm ơn</h3>
      </div>
      <div class="modal-body tmodal">
        <p class="text-center">Bạn đã gửi thông tin thành công! chúng tôi sẽ sớm liên hệ lại với bạn</p>
      </div>
    </div>

  </div>
</div>
@include('frontend.partials.js')

    @yield('js')
  </body>
  </html>