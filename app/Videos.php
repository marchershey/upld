<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Videos extends Model
{
    public function upload($file)
    {

        $id = Storage::putFileAs('public/v', $file, uniqid());

        return $id;
    }
}
