<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\BlogImageResource;
use App\Models\BlogImage;
use Illuminate\Http\Request;

class BlogImagesController extends Controller
{
    public function getAllImagesByBlogId(string $id)
    {
        $blog_images = BlogImage::where('blog_id', '=', $id)->get();

        if ($blog_images->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(BlogImageResource::collection($blog_images), 'Ok', 200);
    }
}
