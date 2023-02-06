<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function form(){
        return view('admin.pages.forms');
    }
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
    public function table(){
        return view('admin.pages.tables');
    }
    public function home(){
        return view('website.pages.home');
    }
}
