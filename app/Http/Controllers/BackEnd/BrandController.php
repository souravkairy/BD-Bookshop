<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
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
    public function brand()
    {
        $this->AuthCheck();
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $brand = view('BackEnd/BrandLayout/brand');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $brand)
            ->with('footer', $footer);

    }
    public function save_brand(request $request)
    {
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['status'] = 1;

        $brand_image =$request->brand_image;

        $image= hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->save('public/ExtraImages/brand/'.$image);
        $data['brand_image']='public/ExtraImages/brand/'.$image;

        $save = DB::table('brand')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'Brand saved successfully',
                'alert-type' => 'success'
            );

            return redirect('brand')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('brand')->with($notification);
        }



    }
    public function delete_brand($id)
    {
        $success = DB::table('brand')->where('id',$id)->delete();
        if ($success) {
            $notification = array(
                'message' => 'Brand deleted successfully',
                'alert-type' => 'success'
            );

            return redirect('brand')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('brand')->with($notification);
        }
    }

}
