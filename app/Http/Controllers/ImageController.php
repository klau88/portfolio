<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload()
    {
        return view('images.upload');
    }

    public function save()
    {
        $validate = request()->validate([
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:10240'
        ]);

        if($validate){
            \App\Image::create([
                'name' => request()->image->getClientOriginalName(),
                'imageable_type' => request()->imageable_type,
                'imageable_id' => request()->imageable_id
            ]);

            request()->image->move(public_path('images'), request()->image->getClientOriginalName());
        }

        return back();
    }
}
