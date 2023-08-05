<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\HeadphoneResource;
use App\Models\Headphone;
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
        $headphone = Headphone::all();

        return $this->returnData($headphone);
    }

    public function getHeadphoneByBrandId(int $id)
    {
        $headphone = Headphone::where('brand_id', '=', $id);

        return $this->returnData($headphone);
    }

    public function getHeadphoneByColor(string $color)
    {
        $headphone = Headphone::where('headphone_color', '=', $color);

        return $this->returnData($headphone);
    }

    public function getHeadphoneByType(string $type)
    {
        $headphone = Headphone::where('headphone_type', '=', $type);

        return $this->returnData($headphone);
    }
}
