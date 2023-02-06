<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        $name = 'Atrihar';
        $phone = '123456';
        $email = 'atr@gmail.com';
        // return view('about',['name'=>$name, 'email'=>$email,'phone'=>$phone]);
        return view('about', compact('name', 'email', 'phone'));
    }

    public function services($running)
    {
        // $service_running = true;
        $services = [
            array('name' => 'Web Development', 'price' => 10000),
            array('name' => 'Graphics Design', 'price' => 20000),
            array('name' => 'SEO', 'price' => 50000)
        ];
        // dd($services);
        return view('service', compact('services', 'running'));
    }

    public function business($x, $y)
    {
        return view('business', compact('x', 'y'));
    }
}