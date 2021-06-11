<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
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
    public function site_setting()
    {
        $this->AuthCheck();
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $site_setting = view('BackEnd/site_setting/site_setting');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $site_setting)
            ->with('footer', $footer);
    }
    public function save_site_setting_data(Request $request)
    {
        if ($request->facebook || $request->youtube ||$request->instagram || $request->whatsapp) {
            $data = array();
            $id = $request->id;
            $facebook = $request->facebook;
            $youtube = $request->youtube;
            $instagram = $request->instagram;
            $whatsapp= $request->whatsapp;

            $save = DB::table('site_setting')->where('id',$id)->update(['facebook'=> $facebook ,'youtube'=> $youtube ,
            'instagram'=> $instagram ,'whatsapp'=> $whatsapp ]);
            if ($save) {
                $notification = array(
                    'message' => 'Site Setting Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect('site_setting')->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'Somethings is wrong',
                    'alert-type' => 'error'
                );
                return redirect('site_setting')->with($notification);
            }
        }
        else{
            $data = array();
            $id = $request->id;
            $contact_number = $request->contact_number;
            $email= $request->email;
            $address= $request->address;
            $save = DB::table('site_setting')->where('id',$id)->update(['contact_number'=>$contact_number,'email'=>$email,
            'address'=>$address,]);
            if ($save) {
                $notification = array(
                    'message' => 'Site Setting Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect('site_setting')->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'Somethings is wrong',
                    'alert-type' => 'error'
                );
                return redirect('site_setting')->with($notification);
            }
        }



    }
    public function save_slider(Request $request)
    {
        $data = array();
        $data['slider_heading'] = $request->slider_heading;
        $data['slider_sub_heading'] = $request->slider_sub_heading;
        $data['button_text'] = $request->button_text;
        $data['button_link'] = $request->button_link;
        $slider_image =$request->slider_image;

        $image= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->save('public/ExtraImages/slider_image/'.$image);
        $data['slider_image']='public/ExtraImages/slider_image/'.$image;

        $save = DB::table('slider')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect('site_setting')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('site_setting')->with($notification);
        }
    }
    public function delete_slider($id)
    {
	  $data =  DB::table('slider')
                    ->where('id',$id)
                    ->first();

        $image =  $data->slider_image;
        unlink($image);

        $save = DB::table('slider')->where('id',$id)->delete();
        if ($save) {
            $notification = array(
                'message' => 'Slider Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect('site_setting')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('site_setting')->with($notification);
        }
    }
    public function admin_role()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $admin_role = view('BackEnd/AdminRoleLayout/admin_role');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $admin_role)
            ->with('footer', $footer);
    }
    public function save_admin_role_data(Request $request)
    {
        $md5 = md5($request->password);
        $data['user_name'] = $request->user_name;
        $data['email'] = $request->email;
        $data['password'] = $md5;
        $data['dashboard'] = $request->dashboard;
        $data['product_section'] = $request->product_section;
        $data['job_section'] = $request->job_section;
        $data['order_section'] = $request->order_section;
        $data['site_setting'] = $request->site_setting;
        $data['contact_section'] = $request->contact_section;
        $data['blog_section'] = $request->blog_section;
        $data['stock_section'] = $request->stock_section;
        $data['status'] = 1;

        $save = DB::table('admin_login')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'Added Successfully',
                'alert-type' => 'success'
            );

            return redirect('admin_role')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('admin_role')->with($notification);
        }

    }
    public function delete_admin_role($id)
    {
        $delete = DB::table('admin_login')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'message' => ' Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect('admin_role')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('admin_role')->with($notification);
        }
    }
}
