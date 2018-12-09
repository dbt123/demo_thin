<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="description" content="Cho vay mua ô tô">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- revolution slider -->
    <!--         <link rel="stylesheet" href="{{asset('frontend/css/extralayers.css')}}" /> -->
    <!--         <link rel="stylesheet" href="{{asset('frontend/css/settings.css')}}" /> -->
    <!-- magnific popup -->
    <!--         <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" /> -->
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}" />
    <!--      <link rel="stylesheet" href="{{asset('frontend/css/owl.transitions.css')}}" /> -->
    <!--        <link rel="stylesheet" href="{{asset('frontend/css/full-slider.css')}}" /> -->
    <!-- text animation -->
    <!--         <link rel="stylesheet" href="{{asset('frontend/css/text-effect.css')}}" /> -->
    <!-- hamburger menu  -->
    <!--         <link rel="stylesheet" href="{{asset('frontend/css/menu-hamburger.css')}}" /> -->
    <!-- common -->
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
      <a href="tel:0983232615" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="left: 0px; bottom: 0px; top: 640px;" datasqstyle="{&quot;top&quot;:null}" datasquuid="4c643075-c7e6-4adf-8841-746771cfb831" datasqtop="640">
          <div class="suntory-alo-ph-circle"></div>
          <div class="suntory-alo-ph-circle-fill"></div>
          <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone" style="float: none;"></i></div>
      </a>

      <!-- CSS Call -->

      <style type="text/css">
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
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="/">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        @foreach($item as $value)
        @if($value->parent_id == 0)
        <li class="dropdown">
          <a class="" data-toggle="" href="{{$value->link}}">{{$value->name}}</a><span class="caret"></span>
          <?php subMenu($item, $value->id); ?>
      </li>
      @endif
      @endforeach
  </ul>
</div>
</div>
</nav>
<!-- end navigation panel -->

@yield('content')
<!-- footer -->
<footer>
    <div class="container footer-middle">
        <div class="row">
            <div class="col-md-3 col-sm-3 footer-link1 xs-display-none">
                <!-- headline -->
                <h5>Giới thiệu</h5>
                <!-- end headline -->
                <!-- text -->
                <p class="footer-text">{{$gioithieu->value}}</p>
                <!-- end text -->
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4 footer-link2 col-md-offset-3">
                <!-- headline -->
                <h5>Company</h5>
                <!-- end headline -->
                <!-- link -->
                <ul>
                    <li><a href="about-us.html">About Company</a></li>
                    <li><a href="about-us.html">What We Do</a></li>
                    <li><a href="about-us.html">What We Think</a></li>
                    <li><a href="careers.html">Careers</a></li>
                </ul>
                <!-- end link -->
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4  footer-link3">
                <!-- headline -->
                <h5>Services</h5>
                <!-- end headline -->
                <!-- link -->
                <ul>
                    <li><a href="services.html">Web Development</a></li>
                    <li><a href="services.html">Graphic Design</a></li>
                    <li><a href="services.html">Copywriting</a></li>
                    <li><a href="services.html">Online Marketing</a></li>
                </ul>
                <!-- end link -->
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4  footer-link4">
                <!-- headline -->
                <h5>Introduction</h5>
                <!-- end headline -->
                <!-- link -->
                <ul>
                    <li><a href="team-members.html">Team Members</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                    <li><a href="our-clients.html">Our Clients</a></li>
                    <li><a href="careers.html">Careers With Us</a></li>
                </ul>
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
              <input placeholder="Tên bạn là gì?" type="text" id ="name" required name="name">
              <input placeholder="Email để tiện liên lạc?" type="email" id ="email" required name="email">
              <input placeholder="Và cả số điện thoại nữa" type="text" id ="sdt" required name="sdt">
              <input id ="money" placeholder="Bạn muốn vay ban nhiêu?" id ="money" type="number"  step="1000000" min="0" required name="money">
              <span id="doitien" class="dn">jsdjks</span>
              <textarea placeholder="Bạn có muốn nhắn nhủ điều gì ko?" id ="cmt"></textarea>

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
<!-- javascript libraries / javascript files set #1 --> 
<script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/js/bootstrap-hover-dropdown.js')}}"></script>
<!--   <script type="text/javascript" src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>  -->
<!--  <script type="text/javascript" src="{{asset('frontend/js/skrollr.min.js')}}"></script> -->  
<script type="text/javascript" src="{{asset('frontend/js/smooth-scroll.js')}}"></script>
<!-- jquery appear -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.appear.js')}}"></script>
<!-- animation -->
<script type="text/javascript" src="{{asset('frontend/js/wow.min.js')}}"></script>
<!-- page scroll -->
<!--  <script type="text/javascript" src="{{asset('frontend/js/page-scroll.js')}}"></script> -->
<!-- easy piechart-->
<script type="text/javascript" src="{{asset('frontend/js/jquery.easypiechart.js')}}"></script>
<!-- parallax -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.parallax-1.1.3.js')}}"></script>
<!--portfolio with shorting tab --> 
<!-- <script type="text/javascript" src="{{asset('frontend/js/jquery.isotope.min.js')}}"></script>  -->
<!-- owl slider  -->
<script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- magnific popup  -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('frontend/js/popup-gallery.js')}}"></script> -->
<!-- text effect  -->
<!-- <script type="text/javascript" src="{{asset('frontend/js/text-effect.js')}}"></script> -->
<!-- revolution slider  -->
<!-- <script type="text/javascript" src="{{asset('frontend/js/jquery.tools.min.js')}}"></script> -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.revolution.js')}}"></script>
<!-- counter  -->
<!--  <script type="text/javascript" src="{{asset('frontend/js/counter.js')}}"></script> -->
<!-- countTo -->
<!-- <script type="text/javascript" src="{{asset('frontend/js/jquery.countTo.js')}}"></script> -->
<!-- fit videos  -->
<!-- <script type="text/javascript" src="{{asset('frontend/js/jquery.fitvids.js')}}"></script> -->
<!-- imagesloaded  -->
<script type="text/javascript" src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- hamburger menu-->
<!--         <script type="text/javascript" src="{{asset('frontend/js/classie.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('frontend/js/hamburger-menu.js')}}"></script> -->
<!-- setting --> 
<script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- masonry-portfolio  -->
<script type="text/javascript">
    if ($(window).width() > 1025) {
        setTimeout(function () {
            skrollr.init({
                forceHeight: !1,
                easing: "outCubic",
                mobileCheck: function () {
                    return !1;
                }
            });
        }, 1000);
    }
</script>
<script type="text/javascript">
    $(document).on('click', '.navbar-nav .caret',function(){
        $(this).parent().nextAll().find('.dropdown-menu').slideUp();
        $(this).parent().prevAll().find('.dropdown-menu').slideUp();
        $(this).nextAll().find('.trans180deg').removeClass('trans180deg');
        $(this).prevAll().find('.trans180deg').removeClass('trans180deg');
        $(this).next().slideToggle();
        $(this).toggleClass('trans180deg');

    });
</script>
<script type="text/javascript">
            // sdt = $('.sdt').text();value = sdt.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            //     $('.sdt').text(value);
            $(document).on('keyup','#money',function(){
                value = $(this).val();
                if(value != ''){
                    $('#doitien').removeClass('dn');
                }
                else{
                    $('#doitien').addClass('dn');
                }
                value = parseInt(value);

                value = (value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
                $('#doitien').text(value+'đ');

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("ul:empty").remove();
                $('.navbar-nav .caret').each(function(i,v){
                    a = $(v).parent().children('ul');
                    if(!a.hasClass('dropdown-menu')){
                        $(this).remove();
                    }
                    
                });
            });
            $('.pdct-box-salepr:empty').remove();
            $(document).ready(function() {
                var owl = $("#owl-demo");
                owl.owlCarousel({
                    autoPlay : true,
                    items : 1, //10 items above 1000px browser width
                    itemsDesktop : [1000,3], //5 items between 1000px and 901px
                    itemsDesktopSmall : [900,3], // betweem 900px and 601px
                    itemsTablet: [600,3], //2 items between 600 and 0
                    itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                navigation : true, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                items : 1,
                autoPlay:true,
                itemsDesktop : true,
                itemsDesktopSmall : true,
                itemsTablet: false,
                itemsMobile : false
            });
            });

        </script>
        <script>
            $(document).ready(function(){
                $('.navbar-nav >li').hover(function(){
                    $(this).find('ul').fadeIn(100);
                    console.log('d');
                },function(){
                    $(this).find('ul').fadeOut(100);
                });
            })
        </script>
        @yield('js')
    </body>
    </html>