<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function destroy(Request $request)
    {
        $imageId = $request->imageId;
        $image = Image::find($imageId);
        if(File::exists(public_path($image->path))){
            File::delete(public_path($image->path));
            $image->delete();
        }
        return 'OK!';
    }
}
