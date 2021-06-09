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

        $data = array();
        $id = $request->id;
        $data['contact_number'] = $request->contact_number;
        $data['email'] = $request->email;
        $data['address'] = $request->address;

        // $logo =$request->logo;

        // $image= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
        // Image::make($logo)->save('public/ExtraImages/sitesetting/'.$image);
        // $data['logo']='public/ExtraImages/sitesetting/'.$image;

        $save = DB::table('site_setting_tabel')->where('id',$id)->update($data);
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
