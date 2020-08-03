<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Request;

class Video extends Model
{
    public function upload($file)
    {
        // generate unique id and check if exists
        do {
            $vid = Str::lower(Str::random(4));
        } while ($this::where('vid', $vid)->exists());

        // get user id if they're logged in
        if (Auth::check()) {
            $user = Auth::user()->id;
        } else {
            $user = 0;
        }

        $video = new $this;
        $video->vid = $vid;
        $video->user = (Auth::check()) ? Auth::user()->id : Request::ip();
        $video->path = public_path('v') . '/' . $vid;

        Storage::putFileAs('public/videos', $file, $vid);

        return $vid;
    }
}
