<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function list()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
}
