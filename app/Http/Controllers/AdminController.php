<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import class Request
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class AdminController extends Controller
{

    public function AuthLogin(){
        $UserAd_id = Session::get('UserId');
        if($UserAd_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('login-admin')->send();
        }
    }

    public function index()
    {
        return View('login-admin');
    }

    public function admin()
    {
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
        
        return View('Admin.dashboard')
        ->with('statistical', $statistical)
        ->with('contactqty', $contactqty)
        ->with('quantitySold', $quantitySold);
    }

    public function admin_dashboard(Request $request) // Sử dụng class Request
    {
        $email = $request->input('email'); // Lấy giá trị của trường email từ request
        $password_hash = md5($request->input('password_hash')); // Lấy giá trị của trường password_hash từ request và mã hóa

        // Sử dụng DB facade để truy vấn dữ liệu
        $result = DB::table('tb_user')
            ->join('tb_role', 'tb_user.RoleId', '=', 'tb_role.RoleId')
            ->where('tb_user.email', $email)
            ->where('tb_user.password_hash', $password_hash)
            ->where('tb_role.RoleName', 'Admin')
            ->first();

        if ($result) {
            // Người dùng đã đăng nhập thành công
            Session::put('FullName', $result->FullName);
            Session::put('UserId', $result->UserId);
            return Redirect::to('/admin');
        } else {
            // Người dùng không có quyền truy cập vào trang admin hoặc thông tin đăng nhập không chính xác
            Session::put('message', 'Email hoặc mật khẩu bị sai hoặc bạn không có quyền truy cập vào trang admin');
            return Redirect::to('/login-admin');
        }
    }

    public function logout() {
        $this->AuthLogin();
        Session::forget('FullName');
        Session::forget('UserId');
        return Redirect::to('/login-admin');
    }
}
