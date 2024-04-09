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
    public function index()
    {
        return View('Admin.dashboard');
    }

    public function admin()
    {
        return View('login-admin');
    }

    public function admin_dashboard(Request $request) // Sử dụng class Request
    {
        $email = $request->input('email'); // Lấy giá trị của trường email từ request
        $password_hash = md5($request->input('password_hash')); // Lấy giá trị của trường password_hash từ request và mã hóa

        // Sử dụng DB facade để truy vấn dữ liệu
        $result = DB::table('tbl_admin')->where('email', $email)->where('password_hash', $password_hash)->first();

        if ($result) {
            Session::put('FullName', $result->FullName);
            Session::put('UserId', $result->UserId);
            return Redirect::to('/admin');
        } else {
            Session::put('message', 'Email hoặc mật khẩu bị sai vui lòng nhập lại');
            return Redirect::to('/login-admin');
        }
    }

    public function logout() {
        echo "click thành công";
    }
}
