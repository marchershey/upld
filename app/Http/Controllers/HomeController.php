<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function fileupload(Request $request)
    {

        if ($request->hasFile('file')) {
            $vid = (new Video)->upload($request->file('file'));
            return $vid;
        }

        // if ($request->hasFile('file')) {

        //     // Upload path
        //     $destinationPath = 'files/';

        //     // Create directory if not exists
        //     if (!file_exists($destinationPath)) {
        //         mkdir($destinationPath, 0755, true);
        //     }

        //     // Get file extension
        //     $extension = $request->file('file')->getClientOriginalExtension();

        //     // Valid extensions
        //     $validextensions = array("jpeg", "jpg", "png", "pdf");

        //     // Check extension
        //     if (in_array(strtolower($extension), $validextensions)) {

        //         // Rename file
        //         $fileName = Str::slug(Carbon::now()->toDayDateTimeString()) . rand(11111, 99999) . '.' . $extension;

        //         // Uploading file to given path
        //         $request->file('file')->move($destinationPath, $fileName);

        //         return $fileName;

        //     }

        // }
    }
}
