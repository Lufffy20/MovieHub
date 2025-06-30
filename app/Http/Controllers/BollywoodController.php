<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BollywoodController extends Controller
{
         public function Bollywood()
    {
        return view('Bollywood');
    }

    
         public function hollywood()
    {
        return view('hollywood');
    }

        public function webseries()
    {
        return view('webseries');
    }

    public function koreandrama()
    {
        return view('koreandrama');
    }

    public function anime()
    {
        return view('anime');
    }
}
