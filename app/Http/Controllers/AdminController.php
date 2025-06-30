<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
      public function admin()
    {
        return view('admino.sidebar');
    }

        public function dashboard()
    {
        return view('dashboard');
    }
   }
