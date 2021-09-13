<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $pen = count(DB::select("SELECT status FROM `orders` WHERE status like 'PENDIENTE'"));
        $rec = count(DB::select("SELECT status FROM `orders` WHERE status like 'RECIBIDO'"));
        $dis = count(DB::select("SELECT status FROM `orders` WHERE status like 'DISTRIBUIDO'"));

        $output = DB::select("SELECT SUM(quantity) as quantity FROM `outputs` INNER JOIN output_details ON outputs.id = output_details.output_id;");
        $outputAlm = $output[0]->quantity;

        $costAlm = 200;
        $Alm = DB::select("SELECT SUM(quantity) as quantity FROM `orders` INNER JOIN order_details ON orders.id = order_details.order_id;");
        
        $uniAlm = $Alm[0]->quantity;

        $cosUniAlm = round($costAlm/$uniAlm,2);
        $cosUniServ = round($costAlm/$outputAlm,2);
        $cosXm = round($costAlm/150,2);





        return view('home', compact('cosUniAlm','cosUniServ','cosXm','pen','rec','dis'));
    }
}
