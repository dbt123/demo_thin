<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Frame;
use App\Attribute;
use App\FrameAttribute;
use App\FrameImage;
use Session;
use App\Filter;

use App\GroupAttribute;
use App\Model\RelationFrame;
use App\Model\RelationProduct;
use App\Model\FolderAttribute;
use DB;
use App\Post;
use App\Category;
use App\Post_category;

use App\CommentFrame;
use App\Account;
use App\Config_distric;
use App\District;

class PageController extends Controller
{
  // Tìm kiếm sản phẩm
  public function seachpro( Request $req){
      if($req->list){
            // dd($req->list);
            $search = $req['search'];
            $a = trim($search);
            $list_filter = $req->list;
            if(!$list_filter) $list_filter = array();
            $arr = array();
            $group_name = array();
            foreach ($list_filter as $key => $value) {
                if(!in_array($value,$arr)) array_push($arr, $value);
            }
            $filter_0 = Filter::whereIn('id',$arr)->where('type',0)->get();
            $filter_1 = Filter::whereIn('id',$arr)->where('type',1)->get();
            $ATTR_IN = array();
            foreach ($filter_0  as $key => $value) {
              if(!in_array($value->attribute_id, $ATTR_IN))array_push($ATTR_IN, $value->attribute_id);
            }
            $query_1 = "";
            foreach ($ATTR_IN as $key => $value) {
                if( $key == sizeof($ATTR_IN) - 1){
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%' ) ";
                }else{
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%') AND ";
                }
            }
            $query_2 = "";
            $c_a = 0;
            foreach ($filter_1  as $key => $value) {
              $str  = "";
              $attr = Attribute::where('name',$value->name)->where('type',0)->get();
              $c = 0;
              foreach ($attr as $k => $v) {
                if($v->value >= $value->min && $v->value <= $value->max){
                  if($c==0){
                    $str .="( string_attr LIKE '%,".$v->id.",%' ) ";
                  }else{
                    $str .=" or ( string_attr LIKE '%,".$v->id.",%' ) ";
                  }
                    $c++;
                }
              }
              if($c){
                if($c_a==0){
                  $query_2 .= " ( ".$str." ) ";
                }else{
                  $query_2 .= " AND ( ".$str." ) ";
                }
                $c_a++;
              } 
            }
            if($query_1){
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where (frames.name LIKE '%".$search."%' or frames.code_frame LIKE '%".$search."%' ) and frame_attributes.status_frame = 1  GROUP BY frame_attributes.frame_id HAVING ".$query_1." and ".$query_2." "));
              }else{
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where (frames.name LIKE '%".$search."%' or frames.code_frame LIKE '%".$search."%' ) and frame_attributes.status_frame = 1  GROUP BY frame_attributes.frame_id HAVING ".$query_1." "));
              }
            }else{
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where (frames.name LIKE '%".$search."%' or frames.code_frame LIKE '%".$search."%' ) and frame_attributes.status_frame = 1 GROUP BY frame_attributes.frame_id HAVING ".$query_2."  "));
              }else{
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where (frames.name LIKE '%".$search."%' or frames.code_frame LIKE '%".$search."%' ) and frame_attributes.status_frame = 1 GROUP BY frame_attributes.frame_id "));
              }
            }
            $arr = array();
            foreach ($xyz as $key => $value) {
              array_push($arr, $value->frame_id);
            }
            $list_san_pham = Frame::select("frames.*")->whereIn('id',$arr)->where('status',1)->orderby('id','desc')->paginate(9);
            $attribute_count = FrameAttribute::select('frame_attributes.attribute_id','attributes.value','attributes.name','attributes.avaiable','attributes.id',DB::raw('count(*) as num'))->whereIn('frame_attributes.frame_id',$arr)->where('status_frame',1)->groupby('frame_attributes.attribute_id')->leftjoin('attributes',"frame_attributes.attribute_id",'=','attributes.id')->orderby('attributes.name','asc')->get();
            $danh_sach_dinh_tinh = array(); //danh sách định tính
            $danh_sach_dinh_luong = array(); // danh sách định lượng
            foreach ($attribute_count as $key => $value) {
                $root_attr = Attribute::where('name',$value->name)->where('type',1)->first();
                if($root_attr){
                    if($root_attr->status == 1){
                        if($value->avaiable==0){
                            array_push($danh_sach_dinh_tinh,$value->id);
                        }else{
                            array_push($danh_sach_dinh_luong,$value);
                        }
                    }
                }
            }
            $filter_0 = Filter::wherein('attribute_id',$danh_sach_dinh_tinh)->where('type',0)->orderby('name','desc')->get();
            $filter_1 = Filter::where('type',1)->orderby('name','desc')->get();
            $filter_y = array();
            $in_filter = array();
            foreach ($danh_sach_dinh_luong as $key1 => $value1) {
                foreach ($filter_1 as $key3 => $value3) {
                    if(ctype_digit((string) $value1->value)){
                      if($value1->name == $value3->name && (int)$value1->value <= (int)$value3->max && (int)$value1->value >= (int)$value3->min){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }else{
                      if($value1->name == $value3->name && (float)$value1->value <= (float)$value3->max && (float)$value1->value >= (float)$value3->min){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }
                }
            }
            $filter_y = Filter::where('type',1)->whereIn('id',$in_filter)->orderby('name','desc')->orderby('min','asc')->get();
            foreach ($filter_0 as $key => $value) {
                $value->num = 0;
                foreach ($attribute_count as $key2 => $value2) {
                    if($value->attribute_id == $value2->attribute_id){
                      $filter_0[$key]->num = $value2->num;
                    }
                }            
            }
            foreach ($filter_y as $key => $value3) {
                $value3->num = 0;
                foreach ($attribute_count as $key2 => $value1) {
                    if($value1->name == $value3->name && $value1->value <= $value3->max && $value1->value >= $value3->min){
                        $filter_y[$key]->num +=$value1->num;
                    }
                }            
            }
            $html = view('frontend.filter.load-filter',['filter_0'=>$filter_0,'filter_y'=>$filter_y,'list_filter'=>$list_filter,'group_name'=>$group_name]);
            $product_view = view('frontend.filter.load-filter-list-product',array('cate'=>$list_san_pham));

            return view('frontend.pages.search',['product_view'=>$product_view."",'filter_view'=>$html.'','total'=>$list_san_pham->total(),'search'=>$search,'type'=>"list",'list_filter'=>$list_filter] );

        }else{
            $search = $req['search'];
            $a = trim($search);
            $pro_search = Frame::select("frames.*")->where(function ($query) use ($a) {
                    $query->where('name','like',"%$a%")->orwhere('code_frame','like',"%$a%");
            })->where('status',1)->orderby('created_at','desc')->paginate(9);
            return view('frontend.pages.search',['pro_search'=>$pro_search,'search'=>$a,'type'=>"no-list",'search'=>$search] );
        }
       
  }
  // Tìm kiếm dựa trên thuộc tính
  public function attrpro( Request $req){
      if($req->list){
            // dd($req->list);
            $search = $req['search'];
            $a = trim($search);
            $list_filter = $req->list;
            if(!$list_filter) $list_filter = array();
            $arr = array();
            $group_name = array();
            foreach ($list_filter as $key => $value) {
                if(!in_array($value,$arr)) array_push($arr, $value);
            }
            $filter_0 = Filter::whereIn('id',$arr)->where('type',0)->get();
            $filter_1 = Filter::whereIn('id',$arr)->where('type',1)->get();
            $ATTR_IN = array();
            foreach ($filter_0  as $key => $value) {
              if(!in_array($value->attribute_id, $ATTR_IN))array_push($ATTR_IN, $value->attribute_id);
            }
            $query_1 = "";
            foreach ($ATTR_IN as $key => $value) {
                if( $key == sizeof($ATTR_IN) - 1){
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%' ) ";
                }else{
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%') AND ";
                }
            }
            $query_2 = "";
            $c_a = 0;
            foreach ($filter_1  as $key => $value) {
              $str  = "";
              $attr = Attribute::where('name',$value->name)->where('type',0)->get();
              $c = 0;
              foreach ($attr as $k => $v) {
                if($v->value >= $value->min && $v->value <= $value->max){
                  if($c==0){
                    $str .="( string_attr LIKE '%,".$v->id.",%' ) ";
                  }else{
                    $str .=" or ( string_attr LIKE '%,".$v->id.",%' ) ";
                  }
                    $c++;
                }
              }
              if($c){
                if($c_a==0){
                  $query_2 .= " ( ".$str." ) ";
                }else{
                  $query_2 .= " AND ( ".$str." ) ";
                }
                $c_a++;
              } 
            }
            if($query_1){
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where frame_attributes.status_frame = 1  GROUP BY frame_attributes.frame_id HAVING ".$query_1." and ".$query_2." "));
              }else{
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where frame_attributes.status_frame = 1  GROUP BY frame_attributes.frame_id HAVING ".$query_1." "));
              }
            }else{
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where frame_attributes.status_frame = 1 GROUP BY frame_attributes.frame_id HAVING ".$query_2."  "));
              }else{
                $xyz = DB::select(DB::raw("select frame_attributes.frame_id, frame_attributes.product_id , CONCAT(',', GROUP_CONCAT(frame_attributes.attribute_id) ,',')  as string_attr FROM frame_attributes left join frames on frames.id = frame_attributes.frame_id where frame_attributes.status_frame = 1 GROUP BY frame_attributes.frame_id "));
              }
            }
            $arr = array();
            foreach ($xyz as $key => $value) {
              array_push($arr, $value->frame_id);
            }
            $list_san_pham = Frame::select("frames.*")->whereIn('id',$arr)->where('status',1)->orderby('id','desc')->paginate(9);
            $attribute_count = FrameAttribute::select('frame_attributes.attribute_id','attributes.value','attributes.name','attributes.avaiable','attributes.id',DB::raw('count(*) as num'))->whereIn('frame_attributes.frame_id',$arr)->where('status_frame',1)->groupby('frame_attributes.attribute_id')->leftjoin('attributes',"frame_attributes.attribute_id",'=','attributes.id')->orderby('attributes.name','asc')->get();
            $danh_sach_dinh_tinh = array(); //danh sách định tính
            $danh_sach_dinh_luong = array(); // danh sách định lượng
            foreach ($attribute_count as $key => $value) {
                $root_attr = Attribute::where('name',$value->name)->where('type',1)->first();
                if($root_attr){
                    if($root_attr->status == 1){
                        if($value->avaiable==0){
                            array_push($danh_sach_dinh_tinh,$value->id);
                        }else{
                            array_push($danh_sach_dinh_luong,$value);
                        }
                    }
                }
            }
            $filter_0 = Filter::wherein('attribute_id',$danh_sach_dinh_tinh)->where('type',0)->orderby('name','desc')->get();
            $filter_1 = Filter::where('type',1)->orderby('name','desc')->get();
            $filter_y = array();
            $in_filter = array();
            foreach ($danh_sach_dinh_luong as $key1 => $value1) {
                foreach ($filter_1 as $key3 => $value3) {
                    if(ctype_digit((string) $value1->value)){
                      if($value1->name == $value3->name && (int)$value1->value <= (int)$value3->max && (int)$value1->value >= (int)$value3->min){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }else{
                      if($value1->name == $value3->name && (float)$value1->value <= (float)$value3->max && (float)$value1->value >= (float)$value3->min){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }
                }
            }
            $filter_y = Filter::where('type',1)->whereIn('id',$in_filter)->orderby('name','desc')->orderby('min','asc')->get();
            foreach ($filter_0 as $key => $value) {
                $value->num = 0;
                foreach ($attribute_count as $key2 => $value2) {
                    if($value->attribute_id == $value2->attribute_id){
                      $filter_0[$key]->num = $value2->num;
                    }
                }            
            }
            foreach ($filter_y as $key => $value3) {
                $value3->num = 0;
                foreach ($attribute_count as $key2 => $value1) {
                    if($value1->name == $value3->name && $value1->value <= $value3->max && $value1->value >= $value3->min){
                        $filter_y[$key]->num +=$value1->num;
                    }
                }            
            }
            $html = view('frontend.filter.load-filter',['filter_0'=>$filter_0,'filter_y'=>$filter_y,'list_filter'=>$list_filter,'group_name'=>$group_name]);
            $product_view = view('frontend.filter.load-filter-list-product',array('cate'=>$list_san_pham));

            return view('frontend.pages.only-filter',['product_view'=>$product_view."",'filter_view'=>$html.'','total'=>$list_san_pham->total(),'list_filter'=>$list_filter] );
        }else{
           return redirect('/');
        }
       
  }
   // Danh mục sản phẩm
  public function views( $aliadsdsds,$id,Request $req){
    if($req->list){
            // dd($req->list);
            $group = GroupAttribute::where('id',$id)->first();
            if($group){
                  if(! (str_slug($group->name) == $aliadsdsds)){
                       return view('errors.404');
                  }
            }
            $list_filter = $req->list;
            if(!$list_filter) $list_filter = array();
            $group = GroupAttribute::find($id);           
            //_________________ GET FILTER IN GROUP ATTRIBUTE __________________
            $c = 0;
            $arr = array();
            $group_name = array();
            $route_attr = array();
            foreach ($list_filter as $key => $value) {
                if(!in_array($value,$arr)) array_push($arr, $value);
            }
            if($group){
              if(!in_array($group->filter_id,$arr)) array_push($arr, $group->filter_id);
            }
            while ($group) {
              $filter = Filter::find($group->filter_id);
              if($filter){
                  array_push($group_name, $filter->name);
                  array_push($route_attr,$group);
              }
              $group = $group->parent;
              if($group){
                  if(!in_array($group->filter_id,$arr)) array_push($arr, $group->filter_id);
              }
              $c++; if( $c > 20 ) break;
            }
             //_________________ END FILTER IN GROUP ATTRIBUTE __________________
            $filter_0 = Filter::whereIn('id',$arr)->where('type',0)->get();
            $filter_1 = Filter::whereIn('id',$arr)->where('type',1)->get();
            $ATTR_IN = array();
            foreach ($filter_0  as $key => $value) {
              if(!in_array($value->attribute_id, $ATTR_IN))array_push($ATTR_IN, $value->attribute_id);
            }
            $query_1 = "";
            foreach ($ATTR_IN as $key => $value) {
                if( $key == sizeof($ATTR_IN) - 1){
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%' ) ";
                }else{
                  $query_1 .= " ( string_attr LIKE '%,".$value.",%') AND ";
                }
            }
            $query_2 = "";
            $c_a = 0;
            foreach ($filter_1  as $key => $value) {
              $str  = "";
              $attr = Attribute::where('name',$value->name)->where('type',0)->get();
              $c = 0;
              foreach ($attr as $k => $v) {
                if(ctype_digit((string) $v->value)){
                    if((int)$v->value >= (int)$value->min && (int)$v->value <= (int)$value->max){
                      if($c==0){
                        $str .="( string_attr LIKE '%,".$v->id.",%' ) ";
                      }else{
                        $str .=" or ( string_attr LIKE '%,".$v->id.",%' ) ";
                      }
                      $c++;
                    }
                }else{
                    if((float)$v->value >= (float)$value->min && (float)$v->value <= (float)$value->max){
                      if($c==0){
                        $str .="( string_attr LIKE '%,".$v->id.",%' ) ";
                      }else{
                        $str .=" or ( string_attr LIKE '%,".$v->id.",%' ) ";
                      }
                      $c++;
                    }
                }
              }
              if($c){
                if($c_a==0){
                  $query_2 .= " ( ".$str." ) ";
                }else{
                  $query_2 .= " AND ( ".$str." ) ";
                }
                $c_a++;
              } 
            }
            // dd($query_2);
            if($query_1){
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_id, product_id , CONCAT(',', GROUP_CONCAT(attribute_id) ,',')  as string_attr FROM frame_attributes  where status_frame = 1  GROUP BY frame_id HAVING ".$query_1." and ".$query_2));
              }else{
                $xyz = DB::select(DB::raw("select frame_id, product_id , CONCAT(',', GROUP_CONCAT(attribute_id) ,',')  as string_attr FROM frame_attributes where status_frame = 1  GROUP BY frame_id HAVING ".$query_1));
              }
            }else{
              if($query_2){
                $xyz = DB::select(DB::raw("select frame_id, product_id , CONCAT(',', GROUP_CONCAT(attribute_id) ,',')  as string_attr FROM frame_attributes  where status_frame = 1 GROUP BY frame_id HAVING ".$query_2));
              }else{
                $xyz = DB::select(DB::raw("select frame_id, product_id , CONCAT(',', GROUP_CONCAT(attribute_id) ,',')  as string_attr FROM frame_attributes  where status_frame = 1 GROUP BY frame_id "));
              }
            }
            // return json_encode($xyz);
            $arr = array();
            foreach ($xyz as $key => $value) {
              array_push($arr, $value->frame_id);
            }
            $list_san_pham = Frame::select("frames.*")->whereIn('id',$arr)->where('status',1)->orderby('id','desc')->paginate(9);
            $attribute_count = FrameAttribute::select('frame_attributes.attribute_id','attributes.value','attributes.name','attributes.avaiable','attributes.id',DB::raw('count(*) as num'))->whereIn('frame_attributes.frame_id',$arr)->where('status_frame',1)->groupby('frame_attributes.attribute_id')->leftjoin('attributes',"frame_attributes.attribute_id",'=','attributes.id')->orderby('attributes.name','asc')->get();
            $danh_sach_dinh_tinh = array(); //danh sách định tính
            $danh_sach_dinh_luong = array(); // danh sách định lượng
            foreach ($attribute_count as $key => $value) {
                $root_attr = Attribute::where('name',$value->name)->where('type',1)->first();
                if($root_attr){
                    if($root_attr->status == 1){
                        if($value->avaiable==0){
                            array_push($danh_sach_dinh_tinh,$value->id);
                        }else{
                            array_push($danh_sach_dinh_luong,$value);
                        }
                    }
                }
            }
            $filter_0 = Filter::wherein('attribute_id',$danh_sach_dinh_tinh)->where('type',0)->orderby('name','desc')->get();
            $filter_1 = Filter::where('type',1)->orderby('name','desc')->get();
            $filter_y = array();
            $in_filter = array();
            foreach ($danh_sach_dinh_luong as $key1 => $value1) {
                foreach ($filter_1 as $key3 => $value3) {
                    if(ctype_digit((string) $value1->value)){
                      if($value1->name == $value3->name && ((int)$value1->value) <= ((int)$value3->max) && ((int)$value1->value) >= ((int)$value3->min) ){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }else{
                     
                      if($value1->name == $value3->name && ((float)$value1->value) <= ((float)$value3->max) && ((float)$value1->value) >= ((float)$value3->min) ){
                            array_push($in_filter,$value3->id);
                            unset($filter_1[$key3]);
                      }
                    }
                    
                }
            }
            $filter_y = Filter::where('type',1)->whereIn('id',$in_filter)->orderby('name','desc')->orderby('min','asc')->get();

            $filter = array();
            $group = GroupAttribute::find($id);   
            foreach ($filter_0 as $key => $value) {
                $value->num = 0;
                foreach ($attribute_count as $key2 => $value2) {
                    if($value->attribute_id == $value2->attribute_id){
                      $filter_0[$key]->num = $value2->num;
                    }
                }            
            }
            foreach ($filter_y as $key => $value3) {
                $value3->num = 0;
                foreach ($attribute_count as $key2 => $value1) {
                    if($value1->name == $value3->name && $value1->value <= $value3->max && $value1->value >= $value3->min){
                        $filter_y[$key]->num +=$value1->num;
                    }
                }            
            }
            $html = view('frontend.filter.load-filter',['filter_0'=>$filter_0,'filter_y'=>$filter_y,'list_filter'=>$list_filter,'group_name'=>$group_name]);
            $product_view = view('frontend.filter.load-filter-list-product',array('cate'=>$list_san_pham));

            return view('frontend.pages.category',['product_view'=>$product_view."",'filter_view'=>$html.'','total'=>$list_san_pham->total(),'n'=>$group,'type'=>"list",'route_attr'=>$route_attr,'list_filter'=>$list_filter]);
      
    }else{
          $group_attribute = GroupAttribute::where('id',$id)->first();
          if($group_attribute){
                  if(! (str_slug($group_attribute->name) == $aliadsdsds)){
                       return view('errors.404');
                  }
                  $products = Frame::select("frames.*")->where('relation_frame.group_id',$group_attribute->id)->where('frames.status',1)->leftjoin('relation_frame','frames.id',
                    '=','relation_frame.frame_id')->orderby('frame_id','desc')->paginate(9);

                  $attribute_count = FolderAttribute::where('folder_attributes.group_id',$group_attribute->id)->leftjoin('attributes','attributes.id','=','folder_attributes.attribute_id')->where('folder_attributes.status',1)->orderby('name','asc')->get();
                  $c = 0;
                  $arr = array();
                  $arr_filter = array();
                  $group_name = array();
                  $route_attr = array();
                  $parent = $group_attribute->id;
                  while ($c < 10) {
                    $parent_obj = GroupAttribute::find($parent);
                    if($parent_obj){
                      array_push($arr,$parent_obj->filter_id);
                      $filter = Filter::find($parent_obj->filter_id);
                      if($filter){
                        array_push($arr_filter, $filter->name);
                      }
                      array_push($group_name,$parent_obj->name);
                      array_push($route_attr,$parent_obj);
                      $parent = $parent_obj->group_id;
                    }else{
                      break;
                    }
                  }
                  $not_filter = Filter::whereIn('id',$arr)->get();
                  $arr_name = array();
                  foreach ($not_filter as $key => $value) {
                    array_push($arr_name, $value->name);
                  }
                  return view('frontend.pages.category',['cate'=>$products,'n'=>$group_attribute,'type'=>"no-list",'route_attr'=>$route_attr]);
          }else{
                 return view('errors.404');
          }
      }
     

  }
  // Tim kiem autocomplate
  public function searchajax( Request $req ){
    $value = $req->key;
    $att_search = Filter::where(function ($query) use ($value) {
                    $query->where('value','like',"%$value%")->where('type',0);
            })->orWhere(function ($query) use ($value) {
                    $query->where('config_name','like',"%$value%")->where('type',1);
            })->limit(5)->get();

    // where('value','like',"%$value%")->where('type',0)->limit(5)->get();
    if ($att_search != "") {
        $a = sizeof($att_search);
        $b = 5 - $a;
        $pro_search = array();
        if($a < 5){
            $pro_search = Frame::Where('name','like',"%$value%")->orWhere('code_frame','like',"%$value%")->orderBy('id','desc')->Where('status',1)->limit($b)->get();
        }
        $html_search = view('frontend.ajax.search_ajax',compact('pro_search','att_search'));
        return json_encode(array('status'=>true,'html'=> $html_search.""));
    }else{
        return json_encode(array('status'=>false));	
    }
  }
  public function getProDetail( $slug, $id){
        $frame = Frame::where('id',$id)->where('status',1)->first();
        if ($frame != null) {
            $pic_frame = FrameImage::where('frame_id',$frame->id)->get();
        $frame_pro = Frame::where('product_id',$frame->product_id)->whereNotIn('id',[$frame->id])->where('status',1)->get();
        return view('frontend.pages.product_detail',compact('frame','frame_pro','pic_frame'));
        }
       

  }
  public function prodetaiajax(Request $req){
        $id = $req->id_pro;
        $frame = Frame::where('id',$id)->where('status',1)->first();
        $pic_frame = FrameImage::where('frame_id',$frame->id)->get();
        $frame_pro = Frame::where('product_id',$frame->product_id)->whereNotIn('id',[$frame->id])->where('status',1)->get();
        $pro_detai = view('frontend.ajax.pro_ajax',compact('frame','pic_frame','frame_pro'));
        $box_content = view('frontend.ajax.box_content_product',compact('frame','pic_frame','frame_pro'));
        $pro_like = view('frontend.ajax.ajax_like_pro',compact('frame'));
        return json_encode(array('status'=>true,'html'=> $pro_detai."",'html_box' =>$box_content."",'html_like_pro' =>$pro_like."",'frame'=>$frame));
  }
    public function addcartpro(Request $req ){
        $num = $req->num;
        $size = $req->size;
        $proid =$req->cart;
        $frame = Frame::find($proid);
        if ($frame) {
            $add = array(
                'num'=>$num,'size'=>$size,'frame'=> $frame,
            );
            $list_frame = Session::get('frame');
            $c = 0;
            if ($list_frame !=null) {
                foreach ($list_frame as $keyl => $valuel) {
                   if ( $frame->id == $valuel['frame']->id) {
                      $c++;
                      $valuel['size'] = $size;
                      
                   }
                }           
            }
            if($c == 0) {
                Session::push('frame',$add);
            }else{
                Session::set('frame',$list_frame);
            }
            $list_frame = Session::get('frame');
            if($frame){
                $total = 0;
                foreach ($list_frame as $keyl1 => $valuel1) {
                    if ($valuel1['frame']->price_sale) {
                       $price = $valuel1['frame']->price_sale;
                    }else{
                        $price = $valuel1['frame']->price; 
                    }
                    $total += $price;
                }
              $total = $total;
              $view = view('frontend.ajax.ajax_cart',compact('list_frame','total'));
              return json_encode(array('status'=>true,'html'=>$view.""));
            }
            
        }else{
            return json_encode(array('status'=>true,'frame'=>null));
        }
       
    }
  
    public function search_attr ($id){
      $array = array();
      $pro_search = FrameAttribute::leftjoin('frames','frame_attributes.frame_id','=','frames.id')->where('frame_attributes.attribute_id',$id)->Where('frames.status',1)->get();
        foreach ($pro_search  as  $item) {
         array_push($array, $item->id);
       }
         $attr = FrameAttribute::join('attributes', 'frame_attributes.attribute_id','=', 'attributes.id')->select('frame_attributes.frame_id as frame_id', 'attributes.name as attr_name', 'attributes.value as value_attr')->wherein('frame_attributes.frame_id', $array)->get();

      $key = 1;
       return view('frontend.pages.search',compact('pro_search',' key','attr'));
    }
    public function cartpro(){
      return view('frontend.pages.cart');
    }
     public function delprocart( Request $req){
      $id_frame = $req->id_pro;
      $list_frame = Session::get('frame');
      if($list_frame !=null){
          foreach ($list_frame as $key => $value){
              if($id_frame == $value['frame']->id){
                  unset($list_frame[$key]);
              }
          }
        }
      Session::set('frame',$list_frame);
      $list_frame = Session::get('frame');
      $total = 0;
      if($list_frame) {
          foreach ($list_frame as $key => $value) {
          if($value['frame']->price_sale){
            $price = $value['frame']->price_sale;
          }else{
            $price = $value['frame']->price;
          }
          $total += $price *  $value['num'];
          }
        }
      $view_pro_cart = view('frontend.ajax.cart_pro_ajax');
      return json_encode(array('status'=>true,'html'=>$view_pro_cart."",'total'=>$total,'list_frame'=>$list_frame));
    }
  public function addprocartnum(Request $req){
      $num = $req->num;
      $proid =$req->cart;
      $list_frame = Session::get('frame');
      if ($list_frame != null) {
        foreach ($list_frame as $key => $value) {
          if ($proid == $value['frame']->id) {
            $list_frame[$key]['num'] = $num;

          }
          
        }
      }
      Session::set('frame',$list_frame); 
      $list_frame = Session::get('frame');
       $total = 0;
      if($list_frame) {
          foreach ($list_frame as $key => $value) {
          if($value['frame']->price_sale){
            $price = $value['frame']->price_sale;
          }else{
            $price = $value['frame']->price;
          }
          $total += $price *  $value['num'];
          }
        }
      return json_encode(array('status'=>true,'html'=>$list_frame,'num'=>$num,'total'=>$total));
  }
  public function ajaxcomentrating( Request $req){

    if (Session('user')) {
      $id_ac = Account::where('social_id',Session('user')['id'])->first();
       if ($req->comment != null) {

        $cmt = new CommentFrame;
        $cmt->frame_id = $req->id_frame;
        $cmt->account_id = $id_ac->id;
        $cmt->comment = $req->comment;
        $cmt->rating = $req->rating;
        $cmt->status = 0;
        $cmt->save();
        $rating = Frame::find($id_fra);
        $rating->rating = ($rating->rating*$rating->number_rate+$nu_ra)/($rating->number_rate+1);
        $rating->number_rate = $rating->number_rate + 1;
        $rating->save();
      }
      return json_encode(array('status'=>true));
    }
      return json_encode(array('status'=>false));
  }
  public function ajaxdistric(Request $req){
    $dis = $req->dis;

    if ( $dis != null) {
      $view = view('frontend.ajax.huyen',compact('dis'));
      return json_encode(array('status'=>true,'dis'=>$dis,'html'=>$view.""));

    }else{
       return json_encode(array('status'=>false));
    }
   
  }
  public function ajaxhuyenpro(Request $req){
    $dis = $req->dis;
     $list_frame = Session::get('frame');
     $total_weight = 0;
     $total = 0;
     if($list_frame) {
          foreach ($list_frame as $key => $value) {
             if($value['frame']->price_sale){
                $price = $value['frame']->price_sale;
              }else{
                $price = $value['frame']->price;
              }
              $total += $price *  $value['num'];
              $total_weight += $value['frame']->weight;
          
          }
        }
      $total_weight = $total_weight;
       $total = $total;
      // đặt phí
      $district = District::where('id',$dis)->first();
      $some = 0;
      if(sizeof($district)){
          $list_phi = Config_distric::where('district_id',$dis)->get();
          if(sizeof($list_phi)){
              foreach ($list_phi as $key => $value2) {
                  if((float)$total_weight > (float)$value2->min_weigh && (float)$total_weight <= (float)$value2->max_weigh ){
                      $some = $value2->price;
                  }
                  if((float)$total_weight > (float)$value2->max_weigh){
                      $max = Config_distric::where('district_id',$district->id)->max('price');
                      $max_w = Config_distric::where('district_id',$district->id)->max('max_weigh');
                      $c = (float)$total_weight - (float)$max_w;
                      $d = ((float)$c*(float)$value2->init_price)/$value2->init_weigh; 
                      $some = (float)$max + (float)$d;
                  }
              }
          }else{
              $some = 0;
          }
      }
       return json_encode(array('status'=>true,'some'=>$some,'total'=>$total));     
  }
  public function oderprott( Request $req){
    $list_frame = Session::get('frame');
    $dis = $req->dis;
     $total_weight = 0;
     $total = 0;
     if($list_frame) {
          foreach ($list_frame as $key => $value) {
             if($value['frame']->price_sale){
                $price = $value['frame']->price_sale;
              }else{
                $price = $value['frame']->price;
              }
              $total += $price *  $value['num'];
              $total_weight += $value['frame']->weight;
          
          }
        }
      $total_weight = $total_weight;
       $total = $total;
      // đặt phí
      $district = District::where('id',$dis)->first();
      $some = 0;
      if(sizeof($district)){
          $list_phi = Config_distric::where('district_id',$dis)->get();
          if(sizeof($list_phi)){
              foreach ($list_phi as $key => $value2) {
                  if((float)$total_weight > (float)$value2->min_weigh && (float)$total_weight <= (float)$value2->max_weigh ){
                      $some = $value2->price;
                  }
                  if((float)$total_weight > (float)$value2->max_weigh){
                      $max = Config_distric::where('district_id',$district->id)->max('price');
                      $max_w = Config_distric::where('district_id',$district->id)->max('max_weigh');
                      $c = (float)$total_weight - (float)$max_w;
                      $d = ((float)$c*(float)$value2->init_price)/$value2->init_weigh; 
                      $some = (float)$max + (float)$d;
                  }
              }
          }else{
              $some = 0;
          }
      }

    return view('frontend.pages.checkout',compact('some','total'));
  }
  public function getBlog( $alias, $id ){
    $blog = Post::find($id);
    $bloglist = Post::leftjoin('post_category', 'post_category.post_id','=','posts.id')->where('posts.status',1)->get();
    return view('frontend.pages.blog-detail',['item'=>$blog,'bloglist'=>$bloglist, 'id'=>$id]);
  }
}
