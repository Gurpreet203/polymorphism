<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|alpha|min:3|max:255',
            'tag' => 'required|alpha|min:3|max:255'
        ]);

        $video = Video::create([
            'name' => $attributes['name']
        ]);

        $video->tags()->create([
            'name' => $attributes['tag']
        ]);

        return to_route('videos.show', $video);
    }

    public function  show(Video $video)
    {
        return view('videos.show', [
            'video' => $video
        ]);
    }
}
