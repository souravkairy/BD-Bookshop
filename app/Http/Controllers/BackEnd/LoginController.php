<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $header = view('BackEnd/MasterLayout/header');
        $loginpage = view('BackEnd/LoginLayout/loginpage');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $loginpage);

    }
    public function data_ck(request $request)
    {
        $user_name = $request->user_name;
        $password = md5($request->password);
        $match = DB::table('admin_login')
                    ->where('user_name',$user_name)
                    ->where('password',$password)
                    ->first();
        if ($match) {

            Session::put('id',$match->id);
            Session::put('user_name',$match->user_name);
            Session::put('password',$match->password);

            $notification = array(
                'message' => 'Login Successfull',
                'alert-type' => 'success'
            );

            return redirect('Admin-Dashboard')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Login failled',
                'alert-type' => 'error'
            );
            return redirect('admin_login')->with($notification);
        }
    }
    public function log_out()
    {
        Session::put('user_name', '');
        Session::put('password', '');
        return redirect('admin_login');
    }
}
