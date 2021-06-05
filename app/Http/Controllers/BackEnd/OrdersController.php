<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function AuthCheck()
    {
        $user_name = Session::get('user_name');
        $email = Session::get('password');

        if ($user_name) {
            return;
        } else {

            return Redirect::to('/admin_login')->send();
        }
    }
    public function pending_order()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $pending_order = view('BackEnd/OrderLayout/pending_order');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $pending_order)
            ->with('footer', $footer);
    }
    public function orderDetails($id)
    {

        $orderData = DB::table('order')->where('id', $id)->first();
        $shippingData = DB::table('shipping')->where('order_id', $orderData->id)->first();
        // $orderDetails = DB::table('order_details')->where('order_id', $orderData->id)->get();

        $orderDetails = DB::table('order_details')
            ->where('order_details.order_id', $orderData->id)
            ->join('product', 'order_details.product_id', 'product.id')
            ->select('product.*', 'order_details.*')
            ->get();

        // echo "<pre>";
        // print_r($orderData);
        // print_r($shippingData);
        // print_r($orderDetails);
        // exit();

        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $orderDetails = view('BackEnd/OrderLayout/order_details')
            ->with('orderData', $orderData)
            ->with('shippingData', $shippingData)
            ->with('orderDetails', $orderDetails);
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $orderDetails)
            ->with('footer', $footer);
    }

    public function confirm_order()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $confirm_order = view('BackEnd/OrderLayout/confirm_order');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $confirm_order)
            ->with('footer', $footer);
    }
    public function processing_order()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $processing_order = view('BackEnd/OrderLayout/processing_order');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $processing_order)
            ->with('footer', $footer);
    }
    public function delivery_done()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $delivery_done = view('BackEnd/OrderLayout/delivery_done');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $delivery_done)
            ->with('footer', $footer);
    }
    public function cancel_order()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $cancel_order = view('BackEnd/OrderLayout/cancel_order');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $cancel_order)
            ->with('footer', $footer);
    }
    public function accept_payment(request $request)
    {
        $id = $request->id;
        $accept = DB::table('order')->where('id',$id)->update(['status' => 1]);
        return redirect('confirm_order');
    }
    public function progress_order(request $request)
    {
        $id = $request->id;
        $accept = DB::table('order')->where('id',$id)->update(['status' => 2]);
        return redirect('processing_order');
    }
    public function done_delivery(request $request)
    {
        $id = $request->id;
        $accept = DB::table('order')->where('id',$id)->update(['status' => 3]);
        return redirect('delivery_done');
    }
    public function order_cancel(request $request)
    {
        $id = $request->id;
        $accept = DB::table('order')->where('id',$id)->update(['status' => 4]);
        return redirect('cancel_order');
    }

}
