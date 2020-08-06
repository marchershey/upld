<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Media;
use App\Sites\YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /*
     * Action called when uploading a file
     */
    public function file(Request $request)
    {
        $mid = (new Media)->upload($request->file);
        return [
            'mid' => $mid,
            'response' => 4,
        ];
    }

    /*
     * Action called when uploading from a link
     */
    public function link(Request $request)
    {
        $link = $request->validate([
            'link' => 'required|string|url',
        ], [
            'link.require' => 'Please enter a valid URL.',
            'link.string' => 'Please enter a valid URL.',
            'link.url' => 'Please enter a valid URL.',
        ]);

        $site = parse_url($link['link']);

        if (isset($site['host'])) {
            if (Str::contains($site['host'], 'youtube') || Str::contains($site['host'], 'youtu')) {
                // preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $request->link, $youtubeID);
                $youtube = new YouTube();
                $youtube->setUrl($link['link']);

                // check if the url is valid
                if ($youtube->isValid()) {
                    if ($youtube->hasVideo()) {
                        // Get the video download link info
                        $videoData = $youtube->getVideoData();

                        do {
                            $mid = Str::lower(Str::random(6));
                        } while (Media::where('mid', $mid)->exists());

                        $media = new Media;
                        $media->mid = $mid;
                        $media->title = $videoData[0]['title'];
                        $media->source = "youtube";
                        $media->source_link = $link['link'];
                        $media->thumbnail = $mid . "-thumbnail";
                        $media->duration = $videoData[0]['approxDurationMs'];
                        $media->mime = $videoData[0]['mime'];
                        $media->user = (Auth::check()) ? Auth::user()->id : session('_token');
                        $media->path = public_path('m') . '/' . $mid;
                        $media->save();

                        Storage::putFileAs('public/media', $videoData[0]['url'], $mid);
                        Storage::putFileAs('public/media', $youtube->getThumbnail(), $mid . "-thumbnail");

                        return redirect('/clip/' . $mid);

                    } else {
                        return redirect()->back()->with('error', 'YouTube says that video doesn\'t exist.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Please enter a valid URL');
                }
            } else {
                return redirect()->back()->with('info', 'At this time, we do not support that site.');
            }
        } else {
            return 'not a url';
        }

        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $request->link, $youtubeID);
        return $youtubeID[0];
    }
}
