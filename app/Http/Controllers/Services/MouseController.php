<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\MouseResource;
use App\Models\Mouse;
use Illuminate\Http\Request;

class MouseController extends Controller
{
    private function returnData($mouse)
    {
        if ($mouse->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(MouseResource::collection($mouse), 'Ok', 200);
    }

    public function getAllMouse()
    {
        $mouse = Mouse::all();

        return $this->returnData($mouse);
    }

    public function getMouseByBrandId(int $id)
    {
        $mouse = Mouse::where('brand_id', '=', $id)->first();

        return $this->returnData($mouse);
    }

    public function getMouseByColor(string $color)
    {
        $mouse = Mouse::where('mouse_color', '=', $color)->get();

        return $this->returnData($mouse);
    }

    public function getMouseByTechnology(string $tech)
    {
        $mouse = Mouse::where('technology', '=', $tech)->get();

        return $this->returnData($mouse);
    }
}
