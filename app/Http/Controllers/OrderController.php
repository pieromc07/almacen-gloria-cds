<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Supplier;
use Dflydev\DotAccessData\Data;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::all();
        // return $orders[0]->order_supplier->business_name;
        return view('order.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $totalOrder = Order::all()->count();
        $supplier = Supplier::find($request->id);
        $products = Product::all();
        $categories = ProductCategory::all();
        $codeOrder = "";
        if ($totalOrder < 10) {
            $codeOrder = "PD-00000" . ($totalOrder + 1);
        } else if ($totalOrder < 100) {
            $codeOrder = "PD-0000" . ($totalOrder + 1);
        } else if ($totalOrder < 1000) {
            $codeOrder = "PD000" . ($totalOrder + 1);
        } else if ($totalOrder < 10000) {
            $codeOrder = "PD-00" . ($totalOrder + 1);
        } else if ($totalOrder < 100000) {
            $codeOrder = "PD-0" . ($totalOrder + 1);
        }


        return view('order.create', compact('codeOrder', 'supplier', 'products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $products = $request->list_products;
        $quantities = $request->list_quantity;
        $data_currrent = date('Y-m-d');
        $order = Order::create([
            'code' => $request->code,
            'user_id' => 1,
            'date_current' => $data_currrent,
            'date_required' => $request->date_required,
            'supplier_id' => $request->supplier_id,
            'status' => "PENDIENTE"
        ]);

        for ($i=0; $i < sizeof($products); $i++) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $products[$i],
                'quantity' => $quantities[$i],
            ]);
        }

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function createo()
    {
        return view('order.order');
    }

    public function reception()
    {
        return view('reception.product');
    }
}
