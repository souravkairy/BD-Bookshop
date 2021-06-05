<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function stock_product_list()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $stock_product_list = view('BackEnd/StockProductLayout/stock_product_list');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $stock_product_list)
            ->with('footer', $footer);

    }
    public function stockDetails($id)
    {

        $data = DB::table('product')->where('id',$id)->first();
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $stockDetails = view('BackEnd/StockProductLayout/stockDetails')
                            ->with('data',$data);
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $stockDetails)
            ->with('footer', $footer);
    }
}
