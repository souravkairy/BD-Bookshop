<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function signInForm()
    {

        $header = view('FrontEnd/MasterLayout/header');
        $signInForm = view('FrontEnd/CustomerAccountLayout/signInForm');
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$signInForm)
                    ->with('footer',$footer);
    }
    public function add_information(request $request)
    {
       $data = array();
       $data['email'] = $request->email;
       $data['password'] = md5($request->password);
       $data['name'] = $request->name;
       $data['mb1'] = $request->mb1;
       $data['mb2'] = $request->mb2;
       $data['postcode'] = $request->postcode;
       $data['city'] = $request->city;
       $data['division'] = $request->division;
       $data['address'] = $request->address;
       $data['status'] = 1;

       DB::table('customer')->insert($data);
       $last = DB::getPdo()->lastInsertId();
       $result = DB::table('customer')->where('id', $last)->first();

       if ($result) {

           Session::put('id',$result->id);
           Session::put('name',$result->name);
           Session::put('email',$result->email);
           return redirect()->back();
       }
       else{
           alert('no success');
       }
    }
    public function log_out()
    {
        Session::put('id', '');
        Session::put('name', '');
        return redirect()->back();
    }
    public function check_customer(request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $success = DB::table('customer')
                    ->where('email',$email)
                    ->where('password',md5($pass))
                    ->first();

        if ($success) {
            Session::put('name',$success->name);
            Session::put('id',$success->id);
            Session::put('email',$success->email);

           return redirect('/');
        }
        else{
            return redirect('/');
        }
    }
    public function myProfile($id)
    {
        $order= DB::table('customer')
                    ->where('customer.id', $id)
                    ->join('order','customer.id','order.c_id')
                    ->first();
        $orderDetails = DB::table('order_details')
                    ->where('order_id', $order->id)
                    ->get();
        // echo "<pre>";
        // print_r($orderDetails);
        // exit();

        $header = view('FrontEnd/MasterLayout/header');
        $myProfile = view('FrontEnd/CustomerAccountLayout/myProfile')
                        ->with('order',$order)
                        ->with('orderDetails',$orderDetails);

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$myProfile)
                    ->with('footer',$footer);
    }
    public function track_order(request $request)
    {
        $track_number = $request->t_code;
        $trac_info = DB::table('order')->where('tracking_code', $track_number)->first();

        $order_id = $trac_info->id;
        $product_details = DB::table('order_details')->where('order_id', $order_id)->get();
        return view('FrontEnd/MasterLayout/order_tracking')
            ->with('trac_info', $trac_info)
            ->with('order_products', $product_details);
    }
    public function search_data_all(Request $request)
    {
        $fetch_data = DB::table("product")
                        ->where("p_name","LIKE" ,"%{$request->terms}%")
                        ->orWhere("size", "LIKE" ,"%{$request->terms}%")
                        ->orWhere("unit", "LIKE" ,"%{$request->terms}%")
                        ->get();

        //  print_r($fetch_data);
        //  exit();
       return response()->json($fetch_data);
    }
}
