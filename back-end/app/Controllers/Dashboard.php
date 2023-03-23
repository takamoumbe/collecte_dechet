<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class Dashboard extends ResourceController {
   
    
    public function index() {
        return view('front-end/index');
    }
   

    public function login() {
        return view('front-end/index');
    }
   

    public function home() {
        return view('front-end/home');
    }
   

    public function saving() {
        return view('front-end/save');
    }
   

    public function listing() {
        return view('front-end/list');
    }
}
