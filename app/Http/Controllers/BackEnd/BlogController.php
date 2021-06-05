<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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
    public function index()
    {
        $header = view('BackEnd/MasterLayout/header');
        $sidebar = view('BackEnd/MasterLayout/sidebar');
        $blog = view('BackEnd/BlogLayout/blog');
        $footer = view('BackEnd/MasterLayout/footer');
        return view('BackEnd/MasterLayout/master')
            ->with('header', $header)
            ->with('sidebar', $sidebar)
            ->with('dashboard', $blog)
            ->with('footer', $footer);
    }
    public function save_blog(Request $request)
    {
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['status'] = 1;

        $blog_image =$request->image;

        $image= hexdec(uniqid()).'.'.$blog_image->getClientOriginalExtension();
        Image::make($blog_image)->save('public/ExtraImages/blog/'.$image);
        $data['image']='public/ExtraImages/blog/'.$image;

        $save = DB::table('blog')->insert($data);
        if ($save) {
            $notification = array(
                'message' => 'Blog saved successfully',
                'alert-type' => 'success'
            );

            return redirect('blog')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Somethings is wrong',
                'alert-type' => 'error'
            );
            return redirect('blog')->with($notification);
        }
    }

}
