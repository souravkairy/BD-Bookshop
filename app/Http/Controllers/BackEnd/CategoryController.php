<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
    public function category()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $category = view('BackEnd/CategoryLayout/category');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $category)
            ->with('footer', $footer);

    }
    public function save_category_data(request $request)
    {
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['status'] = 1;

        $save = DB::table('category')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'category saved successfully',
                'alert-type' => 'success'
            );

            return redirect('category')->with($notification);
        }
        else{

            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );

            return redirect('category')->with($notification);
        }
    }

    public function sub_category()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $category = view('BackEnd/CategoryLayout/sub_category');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $category)
            ->with('footer', $footer);
    }
    public function save_sub_cat_data(request $request)
    {
        $data['category_id'] = $request->category_id;
        $data['sub_category_name'] = $request->sub_category_name;
        $data['sub_category_desc'] = $request->sub_category_desc;
        $data['status'] = 1;

        $save = DB::table('sub_category')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'category saved successfully',
                'alert-type' => 'success'
            );

            return redirect('sub_category')->with($notification);
        }
        else{

            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );

            return redirect('category')->with($notification);
        }
    }
    public function dlt_cat($id)
    {
        $dlt = DB::table('category')->where('id',$id)->delete();
        if ($dlt) {
            $notification = array(
                'message' => 'category deleted successfully',
                'alert-type' => 'success'
            );

            return redirect('category')->with($notification);
        }
    }
    public function dlt_sub_cat($id)
    {
        $dlt = DB::table('sub_category')->where('id',$id)->delete();
        if ($dlt) {
            $notification = array(
                'message' => 'sub-category deleted successfully',
                'alert-type' => 'success'
            );

            return redirect('sub_category')->with($notification);
        }
    }
}
