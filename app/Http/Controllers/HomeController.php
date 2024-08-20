<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
session_start();
use Mail;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{



    //FrontEnd
    public function send_mail(){
        $to_name = "D-Shop.com";
        $to_email = "binhduongofficial@gmail.com";//send to this email

        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>"Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php

        Mail::send('Pages.Mail.send-mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Quên mật khẩu Admin D-Shop.com');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });

        return Redirect('/')->with('message','');

    }

    public function index()
    {
        $userId = Session::get('UserID');
        $name = DB::table('tb_user')->where('UserId', $userId)->first();
        $totalItems = DB::table('tb_cart')->where('UserId', $userId)->count();
        // truy xuất hiện thị danh mục sả phẩm
        $cate_product = DB::table('tb_productcategory')->where('IsActive', '01')
            ->orderBy('CategoryProductId', 'desc')->get();

        // truy xuất và hiện thị nó lên menu tất cả các thương hiệu
        $trade_product = DB::table('tb_trademark')->orderBy('TrademarkId', 'desc')->get();

        //hiện thị thương hiệu lên trang home
        $trade_home = DB::table('tb_trademark')->orderBy('TrademarkId','desc')->limit(6)->get();

        // Tính số lượng sản phẩm cho mỗi thương hiệu
        foreach ($trade_home as $trade) {
            $trade->product_count = DB::table('tb_product')
                ->where('TrademarkId', $trade->TrademarkId)
                ->count();
        }

        // Truy xuất cả sản phẩm hot và mới
        $hot_product = DB::table('tb_product')->where('IsHot', '1')
            ->orderBy('ProductId', 'desc')->limit(4)->get();

        $new_product = DB::table('tb_product')->where('IsNew', '1')
            ->orderBy('ProductId', 'desc')->limit(4)->get();

        
        

        return view('welcome')
            ->with('cate_product', $cate_product)
            ->with('trade_product', $trade_product)
            ->with('trade_home', $trade_home)
            ->with('hot_product', $hot_product)
            ->with('totalItems', $totalItems)
            ->with('name', $name)
            ->with('new_product', $new_product);
            
    }

    public function search(Request $request){
        $userId = Session::get('UserID');
         $name = DB::table('tb_user')->where('UserId', $userId)->first();
        $totalItems = DB::table('tb_cart')->where('UserId', $userId)->count();
        // truy xuất hiện thị danh mục sả phẩm
        $cate_product = DB::table('tb_productcategory')->where('IsActive', '01')
            ->orderBy('CategoryProductId', 'desc')->get();

        // truy xuất và hiện thị nó lên menu tất cả các thương hiệu
        $trade_product = DB::table('tb_trademark')->orderBy('TrademarkId', 'desc')->get();

        //hiện thị thương hiệu lên trang home
        $trade_home = DB::table('tb_trademark')->orderBy('TrademarkId','desc')->limit(6)->get();

        // Tính số lượng sản phẩm cho mỗi thương hiệu
        foreach ($trade_home as $trade) {
            $trade->product_count = DB::table('tb_product')
                ->where('TrademarkId', $trade->TrademarkId)
                ->count();
        }

        // Truy xuất cả sản phẩm hot và mới
        $hot_product = DB::table('tb_product')
        ->where('IsHot', '1')
        ->orderBy('ProductId', 'desc')
        ->limit(4)->get();

        $new_product = DB::table('tb_product')
        ->where('IsNew', '1')
        ->orderBy('ProductId', 'desc')
        ->limit(4)->get();

        //Tìm kiếm

        $keywords = $request->keywords_submit;

        $search_product = DB::table('tb_product')->where('Name','like','%'. $keywords. '%')
        ->get();

        return view('Pages.Product.search')
            ->with('cate_product', $cate_product)
            ->with('trade_product', $trade_product)
            ->with('trade_home', $trade_home)
            ->with('hot_product', $hot_product)
            ->with('new_product', $new_product)
            ->with('totalItems', $totalItems)
            ->with('name', $name)
            ->with('search_product', $search_product);

    }

}
