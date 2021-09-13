<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Output;
use App\Models\OutputDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Reception;
use App\Models\ReceptionDetail;
use App\Models\Storage;
use App\Models\StorageDetail;
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

        for ($i = 0; $i < sizeof($products); $i++) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $products[$i],
                'quantity' => $quantities[$i],
            ]);
        }

        return redirect()->route('home');
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


    public function reception(Request $request)
    {
        $order = Order::find($request->id);
        $date = date('Y-m-d');
        $orderDetails = OrderDetail::all()->where('order_id', $request->id);
        return view('reception.create', compact('order', 'date', 'orderDetails'));
    }

    public function receptionCreate(Request $request)
    {
        // return $request;
        $prices = $request->prices;
        $list_quantity = $request->list_quantity;
        $list_product = $request->list_product;
        $date_reception = $request->date_reception;
        $order_id = $request->order_id;
        $reception = Reception::create([
            'order_id' => $order_id, 'date_reception' => $date_reception
        ]);
        for ($i = 0; $i < sizeof($list_quantity); $i++) {
            ReceptionDetail::create([
                'reception_id' => $reception->id,
                'quantity_received' => $list_quantity[$i],
                'product_id' => $list_product[$i],
                'price_unit' => $prices[$i]
            ]);
        }
        Order::find($order_id)->update([
            'status' => "RECIBIDO"
        ]);
        return redirect()->route('home');
    }

    public function receptionOutput()
    {

        $products = Product::all();
        // return $products;
        return view('reception.output', compact('products'));
    }

    public function warehouse(Request $request)
    {

        $reception = Reception::where('order_id', $request->id)->first();
        $receptionDetails = ReceptionDetail::where('reception_id', $reception->id)->get();
        $codedate = date('Ym');
        $codetime = date('his');
        $day = date('d');
        $lot_number = "LT" . $codedate . "-" . $day . $codetime;
        $totalStorage = Storage::all()->count();
        $codeStorage = "";
        if ($totalStorage < 10) {
            $codeStorage = "AL-00000" . ($totalStorage + 1);
        } else if ($totalStorage < 100) {
            $codeStorage = "AL-0000" . ($totalStorage + 1);
        } else if ($totalStorage < 1000) {
            $codeStorage = "AL000" . ($totalStorage + 1);
        } else if ($totalStorage < 10000) {
            $codeStorage = "AL-00" . ($totalStorage + 1);
        } else if ($totalStorage < 100000) {
            $codeStorage = "AL-0" . ($totalStorage + 1);
        }

        // return $lot_number;
        // return $receptionDetails;
        return view('reception.warehouse', compact('receptionDetails', 'lot_number', 'codeStorage', 'reception'));
    }

    public function storage(Request $request)
    {
        $list_products = $request->list_products;

        $lot_prices = $request->lot_prices;
        $list_quantity = $request->list_quantity;
        $lot_numbers = $request->lot_numbers;

        $storage = Storage::create([
            'code' => $request->code,
            'reception_id' => $request->reception_id
        ]);

        for ($i = 0; $i < sizeof($lot_numbers); $i++) {
            $detail = StorageDetail::create([
                'storage_id' => $storage->id,
                'product_id' => $list_products[$i],
                'lot_number' => $lot_numbers[$i],
                'lot_price' => $lot_prices[$i],
                'quantity' => $list_quantity[$i],
                'location' => $this->alphaNumber($list_products[$i])
            ]);
            Product::find($list_products[$i])->update([
                'stock' => (Product::find($list_products[$i])->stock) + $list_quantity[$i],
                'unit_price' => ($lot_prices[$i] + ($lot_prices[$i] * 0.18)) / $list_quantity[$i]
            ]);
        }

        $reception = Reception::find($request->reception_id);
        Order::find($reception->order_id)->update([
            'status' => "DISTRIBUIDO"
        ]);

        return redirect()->route('home');
    }

    private function alphaNumber($id)
    {
        $product = Product::find($id);
        $category_id = $product->product_categories->id;
        $code = "";
        $pasillo = 0;
        $estanteria = "";
        $estante = 0;
        switch ($category_id) {
            case 1:
                $pasillo = 1;
                $estanteria = "A";
                $estante = random_int(1, 2);
                break;
            case 2:
                $pasillo = 1;
                $estanteria = "A";
                $estante = random_int(3, 4);
                break;
            case 3:
                $pasillo = 2;
                $estanteria = "B";
                $estante = random_int(1, 2);
                break;
            case 4:
                $pasillo = 2;
                $estanteria = "B";
                $estante = random_int(3, 4);
                break;
            case 5:
                $pasillo = 3;
                $estanteria = "C";
                $estante = random_int(1, 2);
                break;
            case 6:
                $pasillo = 3;
                $estanteria = "C";
                $estante = random_int(3, 4);
                break;
            case 7:
                $pasillo = 4;
                $estanteria = "D";
                $estante = random_int(1, 2);
                break;
            case 8:
                $pasillo = 4;
                $estanteria = "D";
                $estante = random_int(3, 4);
                break;
            case 9:
                $pasillo = 5;
                $estanteria = "E";
                $estante = random_int(1, 2);
                break;

            default:
                # code...
                break;
        }

        $category = $product->product_categories->category;
        $nameProduct = $product->name;
        $code = $category[0] . $category[1] . $category[2] . $nameProduct[0] . $nameProduct[1] . $nameProduct[2] . $pasillo . $estanteria . $estante;
        return strtoupper($code);
    }


    public function OutputCreate(Request $request)
    {
        $list_products = $request->list_products;
        $list_quantity = $request->list_quantity;
        $date = date('Y-m-d');
        $output = Output::create([
            'date' => $date
        ]);
        for ($i = 0; $i < sizeof($list_products); $i++) {
            OutputDetail::create([
                'output_id' => $output->id,
                'product_id' => $list_products[$i],
                'quantity' => $list_quantity[$i]
            ]);
            Product::find($list_products[$i])->update([
                'stock' => Product::find($list_products[$i])->stock - $list_quantity[$i]
            ]);
        }
        return redirect()->route('home');
    }
}
