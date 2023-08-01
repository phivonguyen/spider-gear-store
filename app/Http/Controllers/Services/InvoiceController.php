<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\InvoiceResource;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  private function returnData($invoice)
  {
    if ($invoice->isEmpty()) {
      return Payload::toJson(null, 'Data Not Found', 404);
    }

    return Payload::toJson(InvoiceResource::collection($invoice), 'Ok', 200);
  }

  public function getAllInvoice()
  {
    $invoice = InvoiceResource::all();

    return $this->returnData($invoice);
  }

  public function getInvoiceByUserId(string $id)
  {
    $invoice = InvoiceResource::where('user_id', '=', $id);

    return $this->returnData($invoice);
  }

  public function getInvoiceByOrderId(int $id)
  {
    $invoice = InvoiceResource::where('order_id', '=', $id);

    return $this->returnData($invoice);
  }
}
