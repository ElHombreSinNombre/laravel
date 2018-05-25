<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

class PreavisosTrenesController extends Controller
{

	public function index()
    {
        return view('moduloPreavisosTrenes.index');
    }

}
