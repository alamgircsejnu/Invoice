<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $path = "images";
        $image->move($path,$imageName);
        return response()->json(['success'=>$imageName]);
    }

    public function imageUpdate($id)
    {
        $deleteImage = Image::find($id);
        $deleteImage->delete();
        unlink($deleteImage->image_path);
        return response($deleteImage);
    }
}
