<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
class imageServe extends Controller
{
    //
    public function image($type,$name)
    {
        $storagePath = storage_path('/images/' . $type . '/' . $name );

        return response()->file($storagePath);
    }
}
