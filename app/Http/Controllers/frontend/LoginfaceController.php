<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FL_uer;
use Session;
use Facebook\Facebook as Facebook;
use Redirect;
use App\Account;


class LoginfaceController extends Controller
{
	public function __construct(){
      session_start();
  }
  public function DangNhapFaceBook(Request $req){
        $cur_url = $req->cur_url;
        // dd($cur_url);
        $fb_app = array(
          'app_id' => '505487949661628',
          'app_secret' => 'eb86b65f5b430db03c2b8a2eea5be330',
          'default_graph_version' => 'v2.7',
        );
        $fb = new Facebook($fb_app);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        $loginUrl = $helper->getLoginUrl(url('/facebook/callback')."?cur_url=".$cur_url,$permissions);
        return Redirect::to($loginUrl);
  }
  public function DangNhapFaceBookCallBack(Request $req){
        $cur_url = $req->cur_url;
        
         $fb_app = array(
                'app_id' => '505487949661628',
                'app_secret' => 'eb86b65f5b430db03c2b8a2eea5be330',
                'default_graph_version' => 'v2.7',
        );
        
        $fb = new Facebook($fb_app);
        $helper = $fb->getRedirectLoginHelper();

        try{
            $accessToken = $helper->getAccessToken();
            $response = $fb->get('/me?fields=id,name,gender,email',$accessToken);

        }catch(Facebook\Exceptions\FacebookSDKException $e){
            // Nếu lỗi trả về tin nhắn. Dừng màn hình trắng.
            echo $e->getMessage();
            Redirect::to('/');
            // echo "Đăng nhập không thành công";
        }
        if (isset($accessToken)) {

            session()->put('facebook_access_token', $accessToken); // Tạo session token facebook.
           
            $graphNode = $response->getGraphNode(); // Lấy thông tin user facebook.
            // Get Info $graphNode->getField('id')
            $id_fb   = $graphNode->getField('id');
          
            $test = Account::select('social_id')->where('status',1)->get();
            $c = 0;
            foreach ($test as $keyt ) {
              if ( $keyt['social_id'] == $graphNode['id']) $c = $c+1;    
            } 
            if ($c != 1) {
              $ac = new Account;
              $ac->social_id =  $graphNode['id'];
              $ac->name = $graphNode['name'];
              $ac->email =  $graphNode['email'];
              $ac->type_social =  "facebook";
              $ac->save();
            }
            $user_f = Session::get('user');
            if ($user_f) {
               Session::set('user',$graphNode);
             }else{
              Session::put('user',$graphNode);
             }
            return redirect($cur_url);
           
        }else{
            return redirect($cur_url);
        }   
  }
}
