<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store()
    {
        
    }

    public function edit()
    {
        return view('dashboard.edit');
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
