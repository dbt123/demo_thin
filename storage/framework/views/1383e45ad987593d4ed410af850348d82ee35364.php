<!-- javascript libraries / javascript files set #1 --> 
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/modernizr.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap-hover-dropdown.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/smooth-scroll.js')); ?>"></script>
<!-- jquery appear -->
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.appear.js')); ?>"></script>
<!-- animation -->
<script type="text/javascript" src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.easypiechart.js')); ?>"></script>
<!-- parallax -->
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.parallax-1.1.3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.revolution.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.sticky.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- masonry-portfolio  -->
<script type="text/javascript">
  $('#nav-icon1').click(function(){
          if($('#myNavbar').hasClass('in')){
            $(this).removeClass('open');
          }
          else
          {
            $(this).addClass('open');
          }
          
        });
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
  $(document).on('click', '.navbar-nav .caret',function(e){
    $(this).parent().nextAll().find('.abc').removeClass('trans180deg');
    $(this).parent().prevAll().find('.abc').removeClass('trans180deg');

  });
</script>
<script>
  $(document).ready(function () {
    $(".sticky-menu").sticky({topSpacing:0});
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
    var w = $(window).width();
    console.log(w);
    if(w > 991){
      $('.navbar-nav >li').hover(function(){
        $(this).find('ul').fadeIn(100);
        console.log('d');
      },function(){
        $(this).find('ul').fadeOut(100);
      });
    }
  })
</script>

<script>
      $(document).ready(function () {
        //-----------------menu mobile---------------------
        $('.mobile-menu-container .menu-mobile-nav').on('click', function (e) {
          if($(e.target).is('.icon-bar i')){
            $('#cssmenu').slideToggle();
          }
        });

        (function($) {

          $.fn.menumaker = function(options) {

            var cssmenu = $(this), settings = $.extend({
              title: "Menu",
              format: "dropdown",
              sticky: false
            }, options);

            return this.each(function() {

              cssmenu.find('li ul').parent().addClass('has-sub');

              var multiTg = function() {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function() {
                  $(this).toggleClass('submenu-opened');
                  $(this).toggleClass('active');
                  if ($(this).siblings('ul ul').hasClass('open')) {
                    $(this).siblings('ul ul').removeClass('open').slideToggle();
                  }
                  else {
                    $(this).siblings('ul ul').addClass('open').slideToggle();
                  }
                });
              };

              if (settings.format === 'multitoggle') multiTg();
              else cssmenu.addClass('dropdown');

              if (settings.sticky === true) cssmenu.css('position', 'fixed');

              var resizeFix = function() {
                if ($( window ).width() > 768) {
                  cssmenu.find('ul ul').show();
                }

                if ($(window).width() <= 768) {
                  cssmenu.find('ul ul').hide().removeClass('open');
                }
              };
              resizeFix();
              return $(window).on('resize', resizeFix);

            });
          };
        })(jQuery);

        (function($){
          $(document).ready(function() {
            $("#cssmenu").menumaker({
              title: "",
              format: "multitoggle"
            });

            $("#cssmenu").prepend("<div id='menu-line'></div>");

            var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

            $("#cssmenu > ul > li").each(function() {
              if ($(this).hasClass('active')) {
                activeElement = $(this);
                foundActive = true;
              }
            });

            if (foundActive === false) {
              activeElement = $("#cssmenu > ul > li").first();
            }

            defaultWidth = lineWidth = activeElement.width();

                // defaultPosition = linePosition = activeElement.position().left;

                menuLine.css("width", lineWidth);
                menuLine.css("left", linePosition);

                $("#cssmenu > ul > li").on('mouseenter', function () {
                  activeElement = $(this);
                  lineWidth = activeElement.width();
                  linePosition = activeElement.position().left;
                  menuLine.css("width", lineWidth);
                  menuLine.css("left", linePosition);
                },
                function() {
                  menuLine.css("left", defaultPosition);
                  menuLine.css("width", defaultWidth);
                });
              });
        })(jQuery);
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        
        $('.abc').click(function(e){
          e.preventDefault();

          $(this).parent().nextAll().find('.dropdown-menu').slideUp();
          $(this).parent().prevAll().find('.dropdown-menu').slideUp();
          $(this).nextAll().find('.trans180deg').removeClass('trans180deg');
          $(this).prevAll().find('.trans180deg').removeClass('trans180deg');
          $(this).next().slideToggle();
          $(this).toggleClass('trans180deg');
        });
      });
    </script>