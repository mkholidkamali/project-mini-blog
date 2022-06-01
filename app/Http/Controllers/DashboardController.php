<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(Request $request)
    {
        $data = $request->validate([

        ]);
    }

    public function edit()
    {
        return view('dashboard.edit');
    }

    public function update()
    {
        // Validasi
        // Destroy Old Image
        // Save Image
        // Update Data
    }

    public function destroy()
    {
        
    }
}
