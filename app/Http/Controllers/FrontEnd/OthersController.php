<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function contactpage()
    {
        $header = view('FrontEnd/MasterLayout/header');
        $contactpage = view('FrontEnd/OthersLayout/contact');

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$contactpage)
                    ->with('footer',$footer);
    }
    public function aboutpage()
    {
        $header = view('FrontEnd/MasterLayout/header');
        $aboutpage = view('FrontEnd/OthersLayout/about');

        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('topSellingProducts',$aboutpage)
                    ->with('footer',$footer);
    }
}
