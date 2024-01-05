<?php

namespace App\Http\Controllers;

use App\Pixel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PixelController extends Controller
{
    public function index()
    {
        $pixel = Pixel::first();
        return view('admin.pixel.pixel-view',compact('pixel'));
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'account_name' => 'required',
            'pixel_name' => 'required',
            'pixel_id' => 'required'
        ]);

       DB::table('pixels')
                ->updateOrInsert(
                    ['id' => $request->id],
                    ['pixel_name' => $request->pixel_name, 'pixel_id' => $request->pixel_id,'account_name' => $request->account_name]
                );
         $data = Pixel::first();
        return response()->json($data,200);
    }

    public function delete(Pixel $pixel)
    {
        $pixel->delete();
        return response()->json('successfully deleted');
    }
}
