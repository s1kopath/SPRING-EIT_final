<?php

namespace App\Http\Controllers;
use App\AboutDescription;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function storeData(Request $request)
    {
        
        $data = AboutDescription::create([
            'about_description' => $request->about_description,
            'sub_title_one' => $request->sub_title_one,
            'sub_one' => $request->sub_one,
            'sub_title_two' => $request->sub_title_two,
            'sub_two' => $request->sub_two,
            'sub_title_three' => $request->sub_title_third,
            'sub_three' => $request->sub_third,
        ]);
        return response()->json($data);
    }

    public function updateData(Request $request, $id)
    {
        
        $data = AboutDescription::findOrFail($id)->update([
            'about_description' => $request->about_description,
            'sub_title_one' => $request->sub_title_one,
            'sub_one' => $request->sub_one,
            'sub_title_two' => $request->sub_title_two,
            'sub_two' => $request->sub_two,
            'sub_title_three' => $request->sub_title_third,
            'sub_three' => $request->sub_third,
        ]);
        // $msg = "Success";
        return response()->json($data);
    }
}
