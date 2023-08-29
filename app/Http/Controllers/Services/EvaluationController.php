<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\EvaluationResource;
use App\Models\Evaluation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function getAll()
    {
        $evaluations = Evaluation::all();

        if ($evaluations->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(EvaluationResource::collection($evaluations), "OK", 200);
    }

    public function getEvaluationById($id)
    {
        $evaluation = Evaluation::where('id', $id)->first();

        if ($evaluation == null) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new EvaluationResource($evaluation), 'OK', 200);
    }

    public function getAllByUserId($id)
    {
        $evaluations = Evaluation::where('user_id', $id)->get();

        if ($evaluations->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new EvaluationResource($evaluations), "OK", 200);
    }

    public function getAllByProductId($id)
    {
        $evaluations = Evaluation::where('product_id', $id)->get();

        if ($evaluations->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new EvaluationResource($evaluations), "OK", 200);
    }

    public function getAllByRating($rating)
    {
        $evaluations = Evaluation::where('rating', $rating)->get();

        if ($evaluations->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new EvaluationResource($evaluations), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $evaluation = new Evaluation();

            $evaluation->fill([
                'user_id' => $req->user_id,
                'product_id' => $req->product_id,
                'content' => $req->content,
                'rating' => $req->rating
            ]);

            $evaluation->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update($req)
    {
        DB::beginTransaction();
        try {
            $result = Evaluation::where('id', $req->id)->update([
                'content' => $req->content,
                'rating' => $req->rating
            ]);

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Updated Successfully', 200);
            }

            return Payload::toJson(false, 'Update fail', 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return $ex;
        }
    }

    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $result = Evaluation::where('id', $id)->delete();

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Removed Successfully', 201);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
