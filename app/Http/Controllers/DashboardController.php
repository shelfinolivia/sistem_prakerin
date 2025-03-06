<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua laporan dari database
        $reports = Report::all(); 

        return view('dashboard', compact('reports'));
    }
}


