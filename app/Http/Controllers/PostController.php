<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    public function AuthLogin(){
        $UserAd_id = Session::get('UserId');
        if($UserAd_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('login-admin')->send();
        }
    } 

    public function all_post(){

        $this->AuthLogin();
        
       //thống kê tổng doanh thu
        $statistical = DB::table('tb_order')
        ->where('Status', 3) // Chỉ lấy các đơn hàng có trạng thái là 3
        ->select(DB::raw('SUM(CAST(REPLACE(Total, ",", "") AS FLOAT)) as total_amount'))
        ->value('total_amount');

        // số lượng sản phẩm đã bán ra

        $quantitySold = DB::table('tb_orderdetails')
        ->join('tb_order', 'tb_orderdetails.OrderId', '=', 'tb_order.OrderId')
        ->where('tb_order.Status', 3)
        ->sum('tb_orderdetails.ProductQuantity');

        $contactqty = DB::table('tb_contact')->where('IsRead','0')->count();

        $all_post = DB::table('tb_post')->select('BlogID', 'Name', 'Description', 'Detail', 'Image', 'IsActive')->get();
        $manager_post = view('Admin.Post.all-post')->with('all_post', $all_post);

        return view('Admin.dashboard',['statistical' => $statistical,'quantitySold' => $quantitySold, 'contactqty' => $contactqty])->with('Admin.Post.all-post', $manager_post);
    }

    // Thêm dữ liệu

    public function add_post(){
        $this->AuthLogin();
        return view('Admin.Post.add-post');
    }

    //Lưu dữ liệu đã thêm

    public function save_post(Request $request){
        $data = array();
        $data['Name'] = $request->Name;
        $data['Description'] = $request->Description;
        $data['Detail'] = $request->Detail;
        $data['Image'] = $request->Image;
        $data['IsActive'] = $request->IsActive;
        
        DB::table('tb_post')->insert($data);
        Session::put('success','Thêm bài viết thành công');
        return Redirect::to('/all-post');
    }

    // Sửa dữ liệu

    public function edit_post($id) {
        $this->AuthLogin();
        // Truy vấn bài viết từ cơ sở dữ liệu với id tương ứng
        $edit_post = DB::table('tb_post')->where('BlogId', $id)->get();

        // Kiểm tra xem bài viết có tồn tại không
        if (!$edit_post) {
            // Nếu không tìm thấy bài viết, có thể làm điều gì đó như hiển thị thông báo lỗi hoặc chuyển hướng người dùng
            // Ví dụ:
            abort(404); // Hiển thị trang lỗi 404
        }

        // Trả về view "edit-post" và truyền bài viết cho view để hiển thị trong form chỉnh sửa
        return view('Admin.Post.edit-post', ['edit_post' => $edit_post]);
    }

    //Cập nhật dữ liệu

    public function update_post(Request $request, $id){
        $data = array();
        $data['Name'] = $request->Name;
        $data['Description'] = $request->Description;
        $data['Detail'] = $request->Detail;
        $data['Image'] = $request->Image;
        $data['IsActive'] = $request->IsActive;

        DB::table('tb_post')->where('BlogId',$id)->update($data);
        Session::put('message','Cập nhật bài viết thành công');
        return Redirect::to('/all-post');
    }

    //Xóa dữ liệu

    public function delete_post($id){
        $this->AuthLogin();
        $delete_post = DB::table('tb_post')->where('BlogId',$id)->get();
        return view('Admin.Post.delete-post',compact('delete_post'));
    }

    public function confirm_delete_post($id){
        DB::table('tb_post')->where('BlogId',$id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('/all-post');
    }

    // Fronend

    public function post(){
        $userId = Session::get('UserID');
        $name = DB::table('tb_user')->where('UserId', $userId)->first();
        $totalItems = DB::table('tb_cart')->where('UserId', $userId)->count();

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

        $cate_product = DB::table('tb_productcategory')->orderby('CategoryProductId','desc')->get();
        $trade_product = DB::table('tb_trademark')->orderby('TrademarkId','desc')->get();

        $blog = DB::table('tb_post')->where('IsActive', '1')
            ->get();

        return view('Pages.Post.blog')
        ->with('blog', $blog)
        ->with('totalItems', $totalItems)
        ->with('cate_product', $cate_product)
        ->with('trade_product', $trade_product)
        ->with('hot_product', $hot_product)
        ->with('new_product', $new_product)
        ->with('trade_home', $trade_home)
        ->with('name', $name);
        
    }
}
