<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\MouseResource;
use Illuminate\Http\Request;

class MouseController extends Controller
{
    private function returnData($mouse)
    {
        if ($mouse->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(MouseResource::collection($mouse), 'Ok', 200);
    }

    public function getAllMouse()
    {
        $mouse = MouseResource::all();

        return $this->returnData($mouse);
    }

    public function getMouseByBrandId(int $id)
    {
        $mouse = MouseResource::where('brand_id', '=', $id);

        return $this->returnData($mouse);
    }

    public function getMouseByColor(string $color)
    {
        $mouse = MouseResource::where('mouse_color', '=', $color);

        return $this->returnData($mouse);
    }

    public function getMouseByTechnology(string $tech)
    {
        $mouse = MouseResource::where('technology', '=', $tech);

        return $this->returnData($mouse);
    }
}
