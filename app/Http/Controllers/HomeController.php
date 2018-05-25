<?php namespace App\Http\Controllers;

//Facades
use PDF;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('puerto.puerto');
    }
    
    public function test()
    {
        $pdf = PDF::loadView('testpdf');
        return $pdf->stream('test.pdf');
    }
    
}