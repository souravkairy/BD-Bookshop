<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function all_products()
    {
        $header = view('FrontEnd/MasterLayout/header');
        $all_products = view('FrontEnd/ShopLayout/all_products');

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_products)
                    ->with('footer',$footer);
    }
    public function all_brands()
    {
        $header = view('FrontEnd/MasterLayout/header');
        $all_brands = view('FrontEnd/ShopLayout/all_brands');

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_brands)
                    ->with('footer',$footer);
    }
    public function products($id,$name)
    {
        $fetchPdata = DB::table('product')->where('sub_cat_id',$id)->get();

        $header = view('FrontEnd/MasterLayout/header');
        $all_s_products = view('FrontEnd/ShopLayout/all_s_products')
                            ->with('fetchPdata',$fetchPdata);

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_s_products)
                    ->with('footer',$footer);

    }
    public function search($mt)
    {
        $fetchdata = DB::table('product')
        ->where('size',$mt)
        ->orWhere('unit',$mt)
        ->orWhere('subject',$mt)
        ->paginate(16);

        $header = view('FrontEnd/MasterLayout/header');
        $all_s_products = view('FrontEnd/ShopLayout/all_products')
                            ->with('fetchdata',$fetchdata);

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_s_products)
                    ->with('footer',$footer);

    }
    public function search_name(request $request)
    {
        $fetchdata = DB::table('product')
        ->where('size',"LIKE" ,"%{$request->search}%")
        ->orWhere('unit',"LIKE" ,"%{$request->search}%")
        ->orWhere('subject',"LIKE" ,"%{$request->search}%")
        ->orWhere('p_name',"LIKE" ,"%{$request->search}%")
        ->get();

        $header = view('FrontEnd/MasterLayout/header');
        $all_s_products = view('FrontEnd/ShopLayout/all_products')
                            ->with('fetchdata',$fetchdata);

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_s_products)
                    ->with('footer',$footer);

    }
    public function product_details($id,$name)
    {
        $product_details = DB::table('product')->where('id',$id)->first();
        $header = view('FrontEnd/MasterLayout/header');
        $all_s_products = view('FrontEnd/ShopLayout/product_details')
                            ->with('product_details',$product_details);
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$all_s_products)
                    ->with('footer',$footer);
    }
    public function job_details($id)
    {
        $f_data = DB::table('brand')->where('id',$id)->first();
        $header = view('FrontEnd/MasterLayout/header');
        $job_details = view('FrontEnd/ShopLayout/job_details')
                            ->with('f_data',$f_data);

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$job_details)
                    ->with('footer',$footer);
    }


}
