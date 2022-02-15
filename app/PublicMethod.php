<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicMethod extends Model
{
    public static function uploadImage($file, $path, $old = null)
    {
        if ($old != null && file_exists(public_path() . $old)) {
            unlink(public_path() . '/' . $old);
        }
        $image = time() . '_' . $file->getClientOriginalName();
        $file->storeAs("public/$path/", $image);
        return "/storage/$path/" . $image;
    }
}
