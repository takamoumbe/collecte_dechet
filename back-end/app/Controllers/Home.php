<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use CodeIgniter\API\ResponseTrait;

class Home extends ResourcePresenter
{
    use ResponseTrait;
    
    public function index()
    {
        return view('welcome_message');
    }
}
