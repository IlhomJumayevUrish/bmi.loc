<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
class PublicMethod extends Model
{
    public static function uploadImage($file, $path,$old = null)
    {




        if ($old != null && file_exists(public_path() . $old)) {
            unlink(public_path() . '/' . $old);
        }
        $image = time() . '_' . $file->getClientOriginalName();

        $img = Image::make($file->getRealPath());
        $img->crop(200,220);
        $img->save(public_path("/storage/$path/" . $image));
        return "/storage/$path/" . $image;
    }
}
