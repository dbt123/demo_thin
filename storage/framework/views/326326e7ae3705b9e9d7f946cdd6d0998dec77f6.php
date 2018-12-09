<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="Cho vay mua ô tô">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo $__env->yieldContent('meta'); ?>
        <!-- favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('fontend/images/favicon.png')); ?>">
        <link rel="apple-touch-icon" href="<?php echo e(asset('fontend/images/apple-touch-icon-57x57.png')); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('fontend/images/apple-touch-icon-72x72.png')); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('fontend/images/apple-touch-icon-114x114.png')); ?>">
        <!-- animation --> 
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>" />
        <!-- bootstrap --> 
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.css')); ?>" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/et-line-icons.css')); ?>" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>" />
        <!-- revolution slider -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/extralayers.css')); ?>" /> -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/settings.css')); ?>" /> -->
        <!-- magnific popup -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>" /> -->
        <!-- owl carousel -->
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.css')); ?>" />
   <!--      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.transitions.css')); ?>" /> -->
 <!--        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/full-slider.css')); ?>" /> -->
        <!-- text animation -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/text-effect.css')); ?>" /> -->
        <!-- hamburger menu  -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/menu-hamburger.css')); ?>" /> -->
        <!-- common -->
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>" />
        <!-- responsive -->
<!--         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>" /> -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
        <!--[if IE]>
            <link rel="stylesheet" href="css/style-ie.css" />
        <![endif]-->
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <?php $sdt = App\Item::where('key_layout', 'Hotline')->first();
            $gioithieu = App\Item::where('key_layout', 'Giới thiệu dưới chân')->where('key_item','Nội dung')->first();
         ?>
         <link rel="stylesheet" href="<?php echo e(asset('frontend/css/chuan.css')); ?>" />
         <?php echo $__env->yieldContent('css'); ?>
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
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                
              <ul class="nav navbar-nav">
                <?php foreach($item as $value): ?>
                <?php if($value->parent_id == 0): ?>
                <li class="dropdown">
                  <a class="" data-toggle="" href="<?php echo e($value->link); ?>"><?php echo e($value->name); ?></a><span class="caret"></span>
                  <?php subMenu($item, $value->id); ?>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </nav>
        <!-- end navigation panel -->

       <?php echo $__env->yieldContent('content'); ?>
        <!-- footer -->
        <footer>
            <div class="container footer-middle">
                <div class="row">
                    <div class="col-md-3 col-sm-3 footer-link1 xs-display-none">
                        <!-- headline -->
                        <h5>Giới thiệu</h5>
                        <!-- end headline -->
                        <!-- text -->
                        <p class="footer-text"><?php echo e($gioithieu->value); ?></p>
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
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/modernizr.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap.js')); ?>"></script> 
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap-hover-dropdown.js')); ?>"></script>
      <!--   <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.easing.1.3.js')); ?>"></script>  -->
       <!--  <script type="text/javascript" src="<?php echo e(asset('frontend/js/skrollr.min.js')); ?>"></script> -->  
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/smooth-scroll.js')); ?>"></script>
         <!-- jquery appear -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.appear.js')); ?>"></script>
        <!-- animation -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
        <!-- page scroll -->
       <!--  <script type="text/javascript" src="<?php echo e(asset('frontend/js/page-scroll.js')); ?>"></script> -->
        <!-- easy piechart-->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.easypiechart.js')); ?>"></script>
        <!-- parallax -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.parallax-1.1.3.js')); ?>"></script>
        <!--portfolio with shorting tab --> 
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.isotope.min.js')); ?>"></script>  -->
        <!-- owl slider  -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
        <!-- magnific popup  -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/popup-gallery.js')); ?>"></script> -->
        <!-- text effect  -->
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/text-effect.js')); ?>"></script> -->
        <!-- revolution slider  -->
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.tools.min.js')); ?>"></script> -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.revolution.js')); ?>"></script>
        <!-- counter  -->
       <!--  <script type="text/javascript" src="<?php echo e(asset('frontend/js/counter.js')); ?>"></script> -->
         <!-- countTo -->
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.countTo.js')); ?>"></script> -->
        <!-- fit videos  -->
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.fitvids.js')); ?>"></script> -->
        <!-- imagesloaded  -->
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
        <!-- hamburger menu-->
<!--         <script type="text/javascript" src="<?php echo e(asset('frontend/js/classie.js')); ?>"></script> -->
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend/js/hamburger-menu.js')); ?>"></script> -->
        <!-- setting --> 
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
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
    <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>