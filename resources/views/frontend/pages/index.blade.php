@extends('frontend.layout')
@section('title', 'Vay mua ô tô - Lãi suất ưu đãi')
@section('content')
<!-- slider section -->
<section id="slider" class="no-padding rlt"> 
    <div id="owl-demo1" class="owl-carousel owl-theme light-pagination">
        @if($bigSlide)
        @foreach($bigSlide as $item)
        <div class="item owl-bg-img">
            <img src="{{asset($item->img_1)}}" alt="" class="img-responsive">
        </div>
        @endforeach
        @endif
    </div>
</section>
<!-- end slider section -->
<!-- about section -->
<section class="page-title bg-white t-container1">
    <div class="container border-bottom pad40">
        <div class="row">
            <div class="col-md-6 col-sm-6 wow fadeInUp d_margin_top_60" data-wow-duration="300ms">
                <b class="t-b">Giới thiệu chung</b><br><br>
                <!-- page title tagline -->
                <span>@if($gtnd) {{$gtnd->value}} @endif
                </span><br>
            </div>
            <div class="col-md-6 col-sm-6 wow fadeInUp d_margin_top_60" data-wow-duration="300ms">
                <div>
                    <img src="{{ asset($gta->value) }}">
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--Phần dịch vụ tiêu biểu-->
    <section id="features" class="features animate slow-mo even fadeIn xs-onepage-section" data-anim-type="fadeIn" data-anim-delay="200">
        <div class="container">
            <div class="row" style="padding-bottom: 30px ">
                <!-- section title -->
                <div class="col-md-12">
                    <b class="t-b">Nhân sự</b>
                </div>
                <!-- end section title -->
            </div>
            <div class="row">
                <!-- features grid -->
                <!-- features item -->
                @if($kh)
                @foreach($kh as $int => $item)
                <div class="col-md-4 col-sm-4 wow fadeInUp about-onepage">
                    <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 border-right about-onepage-number position-relative overflow-hidden sm-no-border-right xs-text-center">
                        <span class="about-onepage-number-default fast-red-text font-weight-100 position-absolute xs-position-inherit">0{{$int+1}}</span>
                        <span class="about-onepage-number-hover green-text font-weight-100 position-absolute xs-display-none">0{{$int+1}}</span>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 about-onepage-text">
                        <div class="about-onepage-text-sub sm-no-margin-left xs-text-center">
                            <span class="black-text">{{$item->text_1}}</span>
                            <p class="text-med no-margin-bottom sm-width-100">{{$item->text_2}}</p>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- end features item -->
            </div>
        </div>
    </section>

    <section id="portfolio" class="grid-wrap work-4col margin-top-section no-margin-top   xs-onepage-section">
        <div class="container border-top">
            <div class="row no-padding"> 
                <div class="col-md-12 t_t" style="">
                    <b class="t-b padding-bottom-two">Sản phẩm và dịch vụ</b>
                </div>
            </div>
            <div class="row">
                <?php 
                    $posts = App\Post::take(8)->get();
                 ?>
                 @if($posts)
                @foreach($posts as $post)
                <div class="col-sm-3 col-md-3 col-xs-12 wow fadeInUp xs-margin-top-20 md-margin-top-20">
                    <a href="{{ Route('blog', ['id'=>$post->id, 'slug' =>$post->slug]) }}">
                        <div class="img-block">

                            @if($post->img)
                            <img src="{{ asset($post->img) }}">
                            @else

                            <img src="{{ url('/assets/post/5b0e15748feb4-30-05-2018-slide-3jpg.jpg') }}">
                            @endif
                        </div>
                        <div class="title-block">
                            <h5 class="text-center text-uppercase">{{ $post->title }}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="brand">

        <div class="container border-top">
            <div class="t_t">
                <b class="t-b">Đối tác</b>
            </div>
            <div class="row">
                @if($dt)
                @foreach($dt as $item)
                <div class="col-md-2 col-xs-4 col-sm-4 wow fadeInUp" style="margin-bottom: 20px ">
                    <div class="logo_doitac-item">
                        <img src="{{asset($item->img_1)}}" alt="" class="img-responsive">
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @endsection
    @section('js')
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
                        'url' : '{{Route('post.form')}}',
                        'type' : 'post',
                        'data' : {
                            'name' : $('#name').val(),
                            'email' : $('#email').val(),
                            'money' : $('#money').val(),
                            'sdt' : $('#sdt').val(),
                            'loan' : $('#loan').val(),
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
    @endsection