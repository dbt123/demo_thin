@extends('frontend.layout')
@section('title', $post->title)
@section('meta')
<meta property="og:image" content="@if($post->img){{asset($post->img)}}@endif" />
<meta property="og:url"           content="{{Route('blog', ['slug'=>$post->slug, 'id'=>$post->id])}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$post->name}}" />
<meta property="og:description"   content="{{$post->description}}" />
@endsection
@section('css')
<style type="text/css">
    .navbar-fixed-top{position: relative;background: #3399ff !important}
    .navbar-fixed-top .container{height: 60px}
    .content{padding: 30px 0px 50px 0px}
    p{margin:0 0 10px;}
    .title_lq{margin-bottom: 20px:}
    .ls_post{border-radius: 10px;padding: 40px 30px;background: #f4f4f4;box-shadow: 6px 6px 7px #ccc}
    .blot_tit{font-size: 17pt;font-family: Roboto Bold;position: relative;left: 10px}
    .ls_post li{list-style-type: circle;padding: 20px 0px;border-bottom: 1px solid }
    .blot_tit::before{content: "";position: absolute;height: 3px;width:20px;top: 12px;background: #000;left: -30px}
    .ls_post a{padding: 5px 10px;font-size: 14pt}
    .mgtb30 ul, .mgtb30 ol{padding-left: 40px}
</style>
@endsection
@section('content')
@if($post->img)
<section class="mgtb15">
    <div class="container">
        <img style="width:100%;border-radius: 4px"  src="{{asset($post->img)}}" >
    </div>
</section>
@endif
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <h1 class="t-b">{{$post->title}}</h1>
                <div class="mgtb30">
                    {!! $content[0]->content !!}
                </div>
                @if(sizeof($posts) >0)
                <div class="gb-listservicerecent">
                    <h4><img data-thumb="pico" original-height="64" original-width="64" src="//bizweb.dktcdn.net/thumb/pico/100/297/763/files/plus-c827c674-c34a-452f-a5b8-0c005ad733f4.png?v=1525254064677"> Tìm hiểu thêm một số dịch vụ khác của chúng tôi.</h4>
                    <ul>
                    
                        @foreach($posts as $post)
                        <li><a href="{{ Route('blog', ['id'=>$post->id, 'slug'=>$post->slug]) }}"><img src="https://bizweb.dktcdn.net/100/297/763/themes/645555/assets/rightnp.png?1525253656971" style="height: 12px; width: 14px;">{{ $post->title }}</a></li>
                        @endforeach
                        
                      </ul>
                </div>
                @endif
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ls_post">
                    <p class="blot_tit">Bài viết gần đây</p>
                    <div class="mgtb20">
                        <ul>
                        @if($list)
                        @foreach($list as $item)
                            @if($item->id != $id)
                                <li><a href="{{Route('blog', ['id'=>$item->id, 'slug' =>$item->slug])}}">{{ $item->title }}</a></li>
                            @endif
                        @endforeach
                        @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection