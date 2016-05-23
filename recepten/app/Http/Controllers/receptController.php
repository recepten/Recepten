<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class recept extends Controller
{
        public function index()
    {
         $recepten = DB::table('recepten')->where('receptId', )->get();

        return view('recepten', ['recepten' => $recepten]);
    }
}
