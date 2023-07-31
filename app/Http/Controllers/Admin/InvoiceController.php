<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('admin.invoice.index');
    }
}
