<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    public function getVideo($vid)
    {
        //
    }

    public function upload($file)
    {
        // generate unique id and check if exists
        do {
            $mid = Str::lower(Str::random(4));
        } while ($this::where('mid', $mid)->exists());

        $media = new $this;
        $media->mid = $mid;
        $media->user = (Auth::check()) ? Auth::user()->id : session('_token');
        $media->path = public_path('m') . '/' . $mid;
        $media->save();

        Storage::putFileAs('public/media', $file, $mid);

        return $mid;
    }
}
