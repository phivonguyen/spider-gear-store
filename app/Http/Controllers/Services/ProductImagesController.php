<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    public function getAllImagesByProductId(string $id)
    {
        $images = Image::where('product_id', '=', $id)->get();

        if ($images->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ImageResource::collection($images), 'Ok', 200);
    }
}
