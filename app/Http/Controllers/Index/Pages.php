<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class Pages extends Controller
{
    public function index()
    {
        return view('sections.index.index');
    }
}
