<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post(){

        $all_post = DB::table('tb_post')->get();
        $manager_post = view('Admin.all-post')->with('all_post', $all_post);

        return view('Admin.dashboard')->with('Admin.all-post', $manager_post);
    }

    public function add_post(){
        return view('Admin.Post.add-post');
    }
}
