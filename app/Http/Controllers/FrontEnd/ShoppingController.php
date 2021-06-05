<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{

    // public function addcart($id)
    // {
    //     $product =DB::table('product')->where('id',$id)->first();

    //     if ($product->discount_type  == true) {
    //         if ($product->discount_type == 1) {
    //             $prc = $product->s_price-((($product->s_price)*$product->discount)/100);
    //         }
    //         else
    //         {
    //             $prc = $product->s_price-$product->discount;
    //         }
    //     }
    //     else{
    //         $prc = $product->s_price;
    //     }

    //     $data = array();
    //     $data['id']=$product->id;
    //     $data['name']=$product->p_name;
    //     $data['qty']= 1 ;
    //     $data['price']= $prc;
    //     $data['weight']=1;
    //     $data['options']['image']=$product->image1;
    //     $data['options']['code']=$product->p_id;
    //     $data['options']['color']='';
    //     $data['options']['size']='';
    //     Cart::add($data);
    //     // Cart::destroy();

    //     return response()->json(['success' => 'Successfully Added on your Cart']);


    // }
    public function addcart(request $request)
    {
        $id = $request->p_id;
        $product =DB::table('product')->where('id',$id)->first();

        $p_qty = $product->qty;
        if ($p_qty == $request->qty || $p_qty >= $request->qty ) {
            if ($product->discount_type  == true) {
                if ($product->discount_type == 1) {
                    $prc = $product->s_price-((($product->s_price)*$product->discount)/100);
                }
                else
                {
                    $prc = $product->s_price-$product->discount;
                }
            }
            else{
                $prc = $product->s_price;
            }

            $data = array();
            $data['id']=$product->id;
            $data['name']=$product->p_name;
            $data['qty']= $request->qty ;
            $data['price']= $prc;
            $data['weight']= 1;
            $data['options']['image']=$product->image1;
            $data['options']['code']=$product->p_id;
            $data['options']['color']='';
            $data['options']['size']=$request->size;
            Cart::add($data);

            return redirect('/cartPage');

            // return response()->json(['success' => 'Successfully Added on your Cart']);

        }
        else{
            return redirect('/');
        }




    }
    public function delete_product($rowId)
    {
        Cart::remove($rowId);

        $notification = array(
            'message' => 'Login Successfull',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }
    public function cartPage()
    {
        $cartdetails = Cart::content();
        $header = view('FrontEnd/MasterLayout/header');
        $cartpage = view('FrontEnd/ShopLayout/cartPage')
                            ->with('cartData',$cartdetails);
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$cartpage)
                    ->with('footer',$footer);
    }
    public function pToC()
    {
        $user_id = Session::get('id');
        if ($user_id) {
            $sub_total =  Session::get('sub_total');

            $header = view('FrontEnd/MasterLayout/header');
            $checkout = view('FrontEnd/ShopLayout/checkoutPage')
                                ->with('sub_total',$sub_total);
            $footer = view('FrontEnd/MasterLayout/footer');
            return view('FrontEnd/MasterLayout/master')
                        ->with('header',$header)
                        ->with('topSellingProducts',$checkout)
                        ->with('footer',$footer);
        }
        else{
            return redirect('sign-in');
        }


    }
    public function make_payment(request $request)
    {

        $shipping_name = $request->shipping_name;
        $shipping_email = $request->shipping_email;
        $shipping_m_num = $request->shipping_m_num;
        $shipping_m_num2 = $request->shipping_m_num2;
        $division = $request->division;
        $shipping_city = $request->shipping_city;
        $shipping_p_code = $request->shipping_p_code;
        $shipping_address = $request->shipping_address;
        $sub_total = $request->sub_total;

        Session::put('shipping_name',$shipping_name);
        Session::put('shipping_email',$shipping_email);
        Session::put('shipping_m_num',$shipping_m_num);
        Session::put('shipping_m_num2',$shipping_m_num2);
        Session::put('division',$division);
        Session::put('shipping_city',$shipping_city);
        Session::put('shipping_p_code',$shipping_p_code);
        Session::put('shipping_address',$shipping_address);
        Session::put('sub_total',$sub_total);


        $header = view('FrontEnd/MasterLayout/header');
        $checkout = view('FrontEnd/ShopLayout/paymentPage');
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$checkout)
                    ->with('footer',$footer);
    }
    public function confirm_order(request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $user_id = Session::get('id');
		$data=array();
			$data['c_id']= $user_id;
			$data['total']=$request->sub_total;
            $data['payment_method']=$request->p_type;
            $data['txnID']=$request->txnID;
            $data['shipping_method']=$request->shipping_method;
            $data['shipping_charge']=$request->shipping_charge;
    	    $data['status']=0;
    	    $data['date']=date('y-m-d');
    	    $data['month']=date('F');
    	    $data['year']=date('Y');
    	    $data['tracking_code']= mt_rand(100000, 999999);;


    	    $order_id=DB::table('order')->insertGetId($data);

            $shipping=array();
    	    $shipping['order_id']=$order_id;
    	    $shipping['shipping_name']=$request->shipping_name;
    	    $shipping['division']=$request->division;
    	    $shipping['shipping_address']=$request->shipping_address;
    	    $shipping['shipping_city']=$request->shipping_city;
    	    $shipping['shipping_p_code']=$request->shipping_p_code;
    	    $shipping['shipping_email']=$request->shipping_email;
    	    $shipping['shipping_m_num']=$request->shipping_m_num;
    	    $shipping['shipping_m_num2']=$request->shipping_m_num2;

    	    DB::table('shipping')->insert($shipping);

            $content=Cart::content();
    	    $details=array();
    	    	foreach ($content as $row) {
    	    		$details['order_id']= $order_id;
    	    		$details['product_id']=$row->id;
    	    		$details['product_name']=$row->name;
    	    		// $details['color']=$row->options->color;
    	    		$details['size']=$row->options->size;
    	    		$details['qty']=$row->qty;
    	    		$details['single_price']=$row->price;
    	    		$details['total_price']=$row->qty * $row->price;

    	    		DB::table('order_details')->insert($details);
                    $s_qty = DB::table('product')->where('id',$row->id)->first();
                    $p_qty = $s_qty->qty - $row->qty;
                    $u_qty = DB::table('product')->where('id',$row->id)->update( ['qty' =>  $p_qty]);

    	    	}

    	    	Cart::destroy();
    	    	 if (Session::has('c_id')) {
			 	 Session::forget('c_id');

    	     }
    	    return redirect('/confirmOrder');
        // echo "<pre>";
        // print_r($request->all());
        // exit();
    }
    public function confirmOrder()
    {

        $header = view('FrontEnd/MasterLayout/header');
        $thankPage = view('FrontEnd/ShopLayout/thankPage');
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$thankPage)
                    ->with('footer',$footer);
    }
    public function get_division($id)
    {
        $cat = DB::table("districts")->where("division_id",$id)->get();
        return json_encode($cat);
    }




    public function jai()
    {
        echo "<pre>";
        print_r(Cart::content());
        exit();
    }
}
