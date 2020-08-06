<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Media;

class PagesController extends Controller
{
    public function index()
    {
        return view('sections.index.index');
    }

    public function clip($mid)
    {
        $media = Media::where('mid', $mid)->first();
        return view('sections.index.clip')->with('media', $media);
    }
}
