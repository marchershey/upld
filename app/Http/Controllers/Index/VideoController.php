<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index($vid)
    {
        return view('sections.index.video');
    }
}
