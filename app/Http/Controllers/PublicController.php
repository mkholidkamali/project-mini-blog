<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function show()
    {
        return view('public.show');
    }
}
