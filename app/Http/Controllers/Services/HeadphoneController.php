<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\HeadphoneResource;
use Illuminate\Http\Request;

class HeadphoneController extends Controller
{
    private function returnData($headphone)
    {
        if ($headphone->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(HeadphoneResource::collection($headphone), 'Ok', 200);
    }

    public function getAllHeadPhone()
    {
        $headphone = HeadphoneResource::all();

        return $this->returnData($headphone);
    }

    public function getHeadphoneByBrandId(int $id)
    {
        $headphone = HeadphoneResource::where('brand_id', '=', $id);

        return $this->returnData($headphone);
    }

    public function getHeadphoneByColor(string $color)
    {
        $headphone = HeadphoneResource::where('headphone_color', '=', $color);

        return $this->returnData($headphone);
    }

    public function getHeadphoneByType(string $type)
    {
        $headphone = HeadphoneResource::where('headphone_type', '=', $type);

        return $this->returnData($headphone);
    }
}
