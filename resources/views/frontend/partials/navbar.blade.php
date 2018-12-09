<?php
         $menus = App\Menu::where('parent_id',0)->orderby('order', 'asc')->get();
?>
<style type="text/css">
  @media  (max-width: 767px){
    .d_logo_destop{
      margin-top:0px !important;
      margin-bottom: 0px !important;
    }
    .navbar-toggle{
      margin-top:0px !important;
      margin-bottom: 0px !important;
    }
    #owl-demo {
        margin-top: 57px !important;
    }
  }
  
      
</style>
 <nav class="d_navbar_bg d_navbar_menu_top navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom" role="navigation">
            <div class="container">
                <div class="row">
                    <!-- logo -->
                    <div class="d_logo_destop col-md-2 pull-left" style="margin-left:15px;"><a class="logo-light" href="{{url('')}}"><img alt="" src="{{asset('frontend/img/logo.png')}}" class="logo" /></a><a class="logo-dark" href="{{url('')}}"><img alt="" src="{{asset('frontend/img/logo.png')}}" class="logo" /></a></div>
                    <!-- end logo -->
                    <!-- toggle navigation -->
                    <div class="navbar-header col-sm-8 col-xs-2 pull-right">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="d_icon_dropdown_menu fa fa-th-large"></span></button>
                    </div>
                    <!-- toggle navigation end -->
                    <!-- main menu -->
                    <div class="d_list_menu_destop col-md-12 accordion-menu">
                        <div class="navbar-collapse collapse">
                            <ul id="accordion" class="nav d_navbar_nav navbar-nav panel-group">
                                <!-- menu item -->
                                  <li class="dropdown panel">
                                      <a href="{{url('')}}">Trang chủ</a>
                                  </li>
                                 <?php $i=0;?>
                                   @foreach($menus as $key1=>$v1)
                                   <li class="dropdown panel">
                                      <a href="#collapse{{$key1}}" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-hover="dropdown">{{$v1->name}}<i class="fa fa-angle-down"></i></a>

                                    
                                      @if($v1->subcategory->count())
                                         <ul id="collapse{{$key1}}" class="vananh dropdown-menu mega-menu panel-collapse collapse mega-menu-full">
                                            <?php $a1 = array(); $a2 = array(); $a3 = array(); $a4 = array();?>
                                             @foreach($v1->subcategory as $v2)
                                                @if($v2->subcategory->count())
                                                   <li class="mega-menu-column col-sm-3">
                                                       <ul>
                                                           <li class="dropdown-header">{{$v2->name}}</li>
                                                           @foreach($v2->subcategory as $v3)
                                                             <li><a href="{{url($v3->link)}}">
                                                                <img src="{{asset('frontend/img/la menu hover.png')}}" class="d_la_menu_ohio_a" alt="{{$v2->name}}">
                                                                {{$v3->name}}</a>
                                                            </li>
                                                           @endforeach
                                                      </ul>
                                                    </li>
                                                @else
                                                   <?php $i++;
                                                   if($i%4 == 1) array_push($a1,$v2);
                                                   if($i%4 == 2) array_push($a2,$v2);
                                                   if($i%4 == 3) array_push($a3,$v2);
                                                   if($i%4 == 0) array_push($a4,$v2);
                                                ?>
                                              @endif
                                             @endforeach
                                             @if($a1 || $a2 || $a3 || $a4)
                                              <li class="mega-menu-column col-sm-3">
                                                  <!-- sub menu item  -->
                                                  <ul>
                                                      @foreach($a1 as $item)
                                                        <li><a href="{{url($item->link)}}"> 
                                                            <img src="{{asset('frontend/img/la menu hover.png')}}" class="d_la_menu_ohio_a" alt="{{$item->name}}">
                                                            {{$item->name}}
                                                            </a>
                                                        </li>
                                                      @endforeach
                                                  </ul>
                                                  <!-- end sub menu item  -->
                                              </li>
                                              <li class="mega-menu-column col-sm-3">
                                                  <!-- sub menu item  -->
                                                  <ul>
                                                      @foreach($a2 as $item)
                                                        <li><a href="{{url($item->link)}}"> 
                                                            <img src="{{asset('frontend/img/la menu hover.png')}}" class="d_la_menu_ohio_a" alt="{{$item->name}}">
                                                            {{$item->name}}
                                                            </a>
                                                        </li>
                                                      @endforeach
                                                  </ul>
                                                  <!-- end sub menu item  -->
                                              </li> <li class="mega-menu-column col-sm-3">
                                                  <!-- sub menu item  -->
                                                  <ul>
                                                      @foreach($a3 as $item)
                                                        <li><a href="{{url($item->link)}}"> 
                                                            <img src="{{asset('frontend/img/la menu hover.png')}}" class="d_la_menu_ohio_a" alt="{{$item->name}}">
                                                            {{$item->name}}
                                                            </a>
                                                        </li>
                                                      @endforeach
                                                  </ul>
                                                  <!-- end sub menu item  -->
                                              </li> <li class="mega-menu-column col-sm-3">
                                                  <!-- sub menu item  -->
                                                  <ul>
                                                      @foreach($a4 as $item)
                                                        <li><a href="{{url($item->link)}}"> 
                                                            <img src="{{asset('frontend/img/la menu hover.png')}}" class="d_la_menu_ohio_a" alt="{{$item->name}}">
                                                            {{$item->name}}
                                                            </a>
                                                        </li>
                                                      @endforeach
                                                  </ul>
                                                  <!-- end sub menu item  -->
                                              </li>
                                             @endif 
                                         </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                    <!-- sub menu -->
                                   
                                     
                                <!-- end menu item -->
                                <!-- menu item -->
                                <li class="dropdown panel">
                                    <a class="d_contact_click" >Liên Hệ</a>
                                </li>
                                <!-- end menu item -->
                                <!-- menu item --><?php $hotline = App\Item::where('key_layout','=','hot_line')->where('key_item','=','Số điện thoại')->first();?>
                                <li class="dropdown panel">
                                    <a href="#" class="dropdown-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Hotline <span style="color:#FFC000;">{{$hotline->value}}</span></a>
                                </li>
                                <!-- end menu item -->
                            </ul>
                        </div>
                    </div>
                    <!-- end main menu -->
                </div>
            </div>
        </nav>