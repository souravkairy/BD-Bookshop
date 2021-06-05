<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
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
    public function all_coupon()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $coupon = view('BackEnd/CouponLayout/coupon');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $coupon)
            ->with('footer', $footer);
    }

    public function save_coupon(request $request)
    {
        $data['c_name'] = $request->c_name;
        $data['c_type'] = $request->c_type;
        $data['c_ammount'] = $request->c_ammount;
        $data['status'] = 1;

        $save = DB::table('coupon')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'Coupon saved successfully',
                'alert-type' => 'success'
            );

            return redirect('all_coupon')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );

            return redirect('all_coupon')->with($notification);
        }


    }
}
