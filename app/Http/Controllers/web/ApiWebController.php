<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiWebController extends Controller
{
    public function index(){
        return view('web.index');
    }
}