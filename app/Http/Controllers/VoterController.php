<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoterController extends Controller
{
    function voterView(){
      return view('voter.ballot');
    }
}
