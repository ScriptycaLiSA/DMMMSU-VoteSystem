<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebmController extends Controller
{
    function index(){
      return view('dashboard.webm.webm');
    }
}
