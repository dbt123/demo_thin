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
use App\Content;
use App\Category;
use App\Post_category;
use App\Contact;

use App\CommentFrame;
use App\Account;
use App\Config_distric;
use App\District;
use App\Configure_discounts;
use App\Customer;
use App\OrderItem;
use App\Order;
use App\Slide;
use App\Item;
class PageController extends Controller
{
  public function getHome(){
    $bigSlide = Slide::select('img_1', 'text_1', 'text_2', 'text_3')->where('type', 'Big Slide')->where('status', 1)->get();
    $kh = Slide::where('type', 'Khẩu hiệu')->where('status', 1)->get();
    $dt = Slide::where('type', 'Đối tác')->where('status', 1)->get();
    $cate = Category::select('id', 'name', 'prefix')->get();
    $gttd = Item::where('key_layout', 'Giới thiệu')->where('key_item','Tiêu đề')->first();
    $gtnd = Item::where('key_layout', 'Giới thiệu')->where('key_item','Nội dung')->first();
    $gta = Item::where('key_layout', 'Giới thiệu')->where('key_item','Ảnh')->first();
    return view('frontend.pages.index', ['bigSlide' => $bigSlide, 'kh' => $kh, 'dt' => $dt, 'cate' => $cate,'gttd' =>$gttd, 'gtnd' =>$gtnd, 'gta'=>$gta]);
    }

    public function getBlog( $alias, $id ){
        $str = $alias."-".$id;
        $arr = explode('-',$str);
        $id = $arr[sizeof($arr)-1];
        // dd($id);
        $post = Post::where('status',1)->find($id);
        if(!$post){
            return redirect('/');
        } 
        $category = $post->getCategory;
        $categoryID = [];
        $postIDs = [];
        foreach($category as $item){
            // echo $item;
            $postIDarr = Post_category::select('post_id')->where('category_id', $item->pivot->category_id)->get();
            foreach($postIDarr as $postID){
                array_push($postIDs, $postID->post_id);
            }
        }
        $posts = Post::whereIn('id', $postIDs)->where('status', 1)->whereNotin('id',[$id])->get();
        $alias =  substr($str,0,strlen($str) - strlen($id)-1);
        $post = Post::where('status',1)->find($id);
        $content = Content::where('post_id', $id)->get();
        if(sizeof($content) == 0) return redirect('/');
        $list_post = Post::where('status',1)->get();
        return view('frontend.pages.blog-detail',['post'=>$post, 'id'=>$id, 'content' => $content, 'list' => $list_post, 'posts' => $posts]);
    }
    public function postForm(Request $req){
        $ct = new Contact;
        $ct->name = $req->name;
        $ct->phone = $req->sdt;
        $ct->email = $req->email;
        $ct->money = $req->money;
        $ct->loan = $req->loan;
        $ct->description = $req->cmt;
        $ct->save();
    }
    public function showCategory($slug, $categoryID) {
        $str = $slug."-".$categoryID;
        $arr = explode('-',$str);
        if (!empty($arr)) {
            $categoryID = $arr[sizeof($arr)-1];
            $postIDs = Post_category::select('post_id')->where('category_id', $categoryID)->get();
            $category = Category::find($categoryID);
            $items = Post::whereIn('id', $postIDs)->where('status', 1)->get();
            $posts = Post::where('status',1)->get();
            if (!empty($items)) {
                return view('frontend.pages.category', ['posts' => $posts, 'items' => $items, 'category' => $category]);
            } else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
        
    }
}
