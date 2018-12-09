<?php $__env->startSection('title', 'Cho vay mua ô tô'); ?>
<?php $__env->startSection('content'); ?>
<!-- slider section -->
        <section id="slider" class="no-padding rlt"> 
            <div id="owl-demo1" class="owl-carousel owl-theme light-pagination">
           
            <?php foreach($bigSlide as $item): ?>
                <div class="item owl-bg-img" style="background-image:url('<?php echo e(asset($item->img_1)); ?>');">
                    <div class="slider-overlay bg-slider"></div>
                    <div class="container full-screen position-relative">
                        <div class="slider-typography">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-middle animated fadeInUp">
                                    <span class="owl-subtitle white-text xs-margin-bottom-four" ><a href="<?php echo e($item->text_3); ?>" style="padding: 10px 15px"><?php echo e($item->text_1); ?></a></span>
                                    <span class="owl-title-big white-text romini"><?php echo e($item->text_2); ?></span><br>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
            <button type="button" data-toggle="modal" data-target="#myModal" class="asl t_modal btn bg_red btn-lg">Tư vấn</button>
        </section>
        <!-- end slider section -->
         <!-- about section -->
        <section class="page-title bg-white t-container1">
            <div class="container border-bottom pad40 padb60">
                <div class="row">
                    <div class="col-md-6 col-sm-6 wow fadeInUp d_margin_top_60" data-wow-duration="300ms">
                        <b class="t-b">VỀ CHÚNG TÔI</b>
                        <h3 class="black-text mgtb20 mgt40"><?php echo e($gttd->value); ?>

                        </h3>
                        <!-- page title tagline -->
                        <span><?php echo e($gtnd->value); ?>

                        </span><br><br>
                        <!-- <div style="width:265px;height:55px;margin-top:30px">
                            <img src="img/chu-ky.png" alt="">
                        </div> -->
                    </div>
                    <div class="col-md-6 col-sm-6 breadcrumb t-content1 bien-di text-uppercase sm-no-margin-top wow fadeInUp " data-wow-duration="600ms">
                       <div class="">
                            <img src="<?php echo e(asset($gta->value)); ?>" class="d-img-responsive" alt=""/>
                       </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Phần dịch vụ tiêu biểu-->
         <section id="features" class="features animate slow-mo even fadeIn xs-onepage-section" data-anim-type="fadeIn" data-anim-delay="200">
            <div class="container">
                <div class="row" style="padding-bottom: 60px ">
                    <!-- section title -->
                    <div class="col-md-12">
                        <b class="t-b">Chúng tôi có những gì?</b>
                    </div>
                    <!-- end section title -->
                </div>
                <div class="row">
                    <!-- features grid -->
                    <!-- features item -->
                    <?php foreach($kh as $int => $item): ?>
                    <div class="col-md-4 col-sm-4 wow fadeInUp about-onepage">
                        <div class="col-md-3 col-sm-12 border-right about-onepage-number position-relative overflow-hidden sm-no-border-right xs-text-center">
                            <span class="about-onepage-number-default fast-red-text font-weight-100 position-absolute xs-position-inherit">0<?php echo e($int+1); ?></span>
                            <span class="about-onepage-number-hover green-text font-weight-100 position-absolute xs-display-none">0<?php echo e($int+1); ?></span>
                        </div>
                        <div class="col-md-9 col-sm-12 about-onepage-text">
                            <div class="about-onepage-text-sub sm-no-margin-left xs-text-center">
                                <span class="black-text"><?php echo e($item->text_1); ?></span>
                                <p class="text-med width-80 no-margin-bottom sm-width-100"><?php echo e($item->text_2); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- end features item -->
                </div>
            </div>
        </section>

        <section id="portfolio" class="grid-wrap work-4col margin-top-section no-margin-top   xs-onepage-section">
            <div class="container border-top">
                <div class="row no-padding"> 
                    <div class="col-md-12 t_t" style="">
                        <b class="t-b padding-bottom-two">Có thể bạn sẽ quan tâm.</b>
                    </div>
                    <!-- ./ Heading div-->
                    <div class="col-md-12 text-center" >
                        <div class="text-center">
                            <ul class="portfolio-filter nav nav-tabs">
                                <li class="nav active"><a data-filter="*">All</a></li>
                                <?php $arr = Array(); ?>
                                <?php foreach($cate as $item): ?>
                                <li class="nav"><a href="" data-filter=".<?php echo e($item->prefix); ?>"><?php echo e($item->name); ?></a></li>
                                <?php array_push($arr, $item->id) ?>
                                <?php endforeach; ?>
                                <?php $post_id = App\Post_category::select('post_id')->wherein('category_id', $arr)->get(); $post = App\Post::select()->wherein('id', $post_id)->where('status', 1)->get();?>
                            </ul>
                        </div>
                    </div>
                    <!-- ./ Filter Head div-->
                    <div class="grid-gallery overflow-hidden" >
                        <div class="tab-content">
                            <ul class="masonry-items  grid">
                                <?php foreach($post as $item): ?>
                                <?php $cate_id = $item->getPostCategory[0]->category_id;
                                        $slug = App\Category::select('prefix')->where('id', $cate_id)->first();
                                 ?>
                                <li class="<?php echo e($slug->prefix); ?>">
                                <a href="<?php echo e(Route('blog', ['id'=>$item->id, 'slug' =>$item->slug])); ?>">
                                    <div class="col-md-12 text-center services-box wow fadeInUp" data-wow-duration="300ms">
                                        <i class="icon-tools small-icon green-text"></i>
                                        <h2 class="black-text margin-five Rob" style="font-size: 14pt"><?php echo e($item->title); ?></h2>
                                        <p><?php echo e($item->description); ?></p>
                                        <figure class="text-uppercase t_fig white-text">
                                            <img style="cursor: pointer;" src="<?php echo e(asset($item->img)); ?>">
                                        </figure>
                                    </div>
                                </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="brand">
            
            <div class="container border-top">
            <div class="t_t">
                <b class="t-b">Đối tác</b>
            </div>
                <div class="row">
                    <?php foreach($dt as $item): ?>
                    <div class="col-md-3 wow fadeInUp" style="margin-bottom: 20px ">
                        <img src="<?php echo e(asset($item->img_1)); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(function(){
        $('#my_form').validate({
            rules : {
                name :{
                    required : true
                },
                email :{
                    required : true,
                    email : true
                },
                sdt :{
                    required : true
                },
                money :{
                    required : true
                },
            },
           
            messages : {
                name : {
                    required : 'Bạn chưa nhập tên !'
                },
                email : {
                    required : 'Bạn chưa nhập email !',
                    email : 'Bạn hãy nhập đúng định dạng email'
                },
                sdt : {
                    required : 'Bạn chưa nhập số điện thoại !'
                },
                money : {
                    required : 'Bạn chưa nhập số tiền !'
                }
            },
             submitHandler : function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url' : '<?php echo e(Route('post.form')); ?>',
                    'type' : 'post',
                    'data' : {
                        'name' : $('#name').val(),
                        'email' : $('#email').val(),
                        'money' : $('#money').val(),
                        'sdt' : $('#sdt').val(),
                        'cmt' : $('#cmt').val()
                    },
                    success : function(data){
                       $('#myModal').modal('hide');
                       $('#myModal2').modal('show');
                    }
                });
            },
        });
    });
</script>
<script>
            $(document).ready(function() {
                    $("#owl-demo1").owlCarousel({
                    navigation : false, // Show next and prev buttons
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>