<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index (): string
    {
        return view('Backend/Login/login');
    }
    public function forms(): string
    {
        return view('Backend/Login/forms');
    }
}
