<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Pages extends Controller
{
    public function index()
    {
        return view('sections.dashboard.index');
    }

    public function profile()
    {
        return view('sections.dashboard.profile');
    }
}
