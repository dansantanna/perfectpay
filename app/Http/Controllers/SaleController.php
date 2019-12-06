<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;

class SaleController extends Controller
{

    public function list(Request $request)
    {
        $sales = Sale::with(['product', 'customer']);
        if ($request->has('customer_id'))
            $sales->whereHas('customer', function ($query) use ($request) {
                $query->where('id', $request->customer_id);
            });

        if ($request->has('created_at'))
            $sales->whereDate("created_at", $request->created_at);

        return response()->json($sales->get());
    }

    public function show($id)
    {
        $sale = Sale::with(['product', 'customer'])->find($id);
        return response()->json($sale);
    }

    public function groups()
    {
        $groups = Sale::selectRaw("status, sum(sale_amount) amount, sum(quantity) quantity")->groupBy('status')->get();
        return response()->json($groups);
    }

    public function update($id, Request $request)
    {
        $sale = Sale::find($id);
        $sale->fill($request->all());
        $sale->save();
        return response()->json($sale);
    }
}
