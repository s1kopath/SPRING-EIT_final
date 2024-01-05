<?php

namespace App\Http\Controllers;
use App\VideoGallary;
use Illuminate\Http\Request;

class VideoGallaryController extends Controller
{
    public function list()
    {
        $video = VideoGallary::all();
        return view('frontend.video-gallery', compact('video'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        VideoGallary::create([
            'title' => $request->v_title,
            'link' => $request->v_link
        ]);
        return redirect()->back()->with('message','Video added Successfully.');
}
    public function delete($id)
    {
        $video = VideoGallary::find($id);
        $video->delete();
        return redirect()->back();
        

    }
}
