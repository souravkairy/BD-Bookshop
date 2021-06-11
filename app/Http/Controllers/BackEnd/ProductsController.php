<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;

class ProductsController extends Controller
{
    public function AuthCheck()
    {
        $user_name = Session::get('user_name');
        $email = Session::get('password');

        if ($user_name) {
            return;
        }
        else
        {

            return Redirect::to('/admin_login')->send();
        }
    }
    public function all_products()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $products = view('BackEnd/ProductsLayout/products');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $products)
            ->with('footer', $footer);

    }
    public function GetSubcat($category_id)
    {
    	$cat = DB::table("sub_category")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
    public function save_product_data(request $request)
    {
        $data['p_name'] = $request->p_name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat_id'] = $request->sub_category_id;
        $data['brand_id'] = $request->brand_id;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['qty'] = $request->qty;
        $data['unit'] = $request->unit;
        $data['s_price'] = $request->s_price;
        $data['subject'] = $request->subject;
        $data['c_price'] = $request->c_price;
        $data['discount_type'] = $request->discount_type;
        $data['discount'] = $request->discount;
        $data['p_desc'] = $request->p_desc;
        $data['topSelling'] = $request->topSelling;
        $data['hot'] = $request->hot;
        $data['new'] = $request->new;
        $data['status'] = 1;
        $data['p_id'] = 'CK'. rand ( 1000 , 9999 );

        // $data['image1'] = $request->image1;
        // $data['image2'] = $request->image2;
        // $data['image3'] = $request->image3;

        $image1 =$request->image1;
        $image2 =$request->image2;
        if ($image1 && $image2) {
            $imageone= hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(400,400)->save('public/ExtraImages/product/'.$imageone);
            $data['image1']='public/ExtraImages/product/'.$imageone;

            $imagetwo= hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(400,400)->save('public/ExtraImages/product/'.$imagetwo);
            $data['image2']='public/ExtraImages/product/'.$imagetwo;

            $save = DB::table('product')->insert($data);

            if ($save) {
                $notification = array(
                    'message' => 'Product saved successfully',
                    'alert-type' => 'success'
                );
                return redirect('all_products')->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'Somethings is wrong, Try it again',
                    'alert-type' => 'success'
                );
                return redirect('all_products')->with($notification);
            }
        }
        elseif($image1){
            $imageone= hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(400,400)->save('public/ExtraImages/product/'.$imageone);
            $data['image1']='public/ExtraImages/product/'.$imageone;

            $save = DB::table('product')->insert($data);

            if ($save) {
                $notification = array(
                    'message' => 'Product saved successfully',
                    'alert-type' => 'success'
                );
                return redirect('all_products')->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'Somethings is wrong, Try it again',
                    'alert-type' => 'success'
                );
                return redirect('all_products')->with($notification);
            }
        }
        else{
            $notification = array(
                'message' => 'Somethings is missing, Try it again',
                'alert-type' => 'warning'
            );
            return redirect('all_products')->with($notification);
        }
    }
    public function delete_products($id)
    {
       $delete =  DB::table('product')->where('id',$id)->delete();
       if ($delete) {
                $notification = array(
                    'message' => 'Product deleted successfully',
                    'alert-type' => 'success'
                );
           return redirect('all_products')->back($notification);
       }
    }
}
