<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index()
    {

        $seoData = DB::table('seo')->first();
        //seo
        SEOMeta::setTitle($seoData->title);
        SEOMeta::setDescription($seoData->description);
        SEOMeta::setCanonical('https://bdbookshop.com/');

        OpenGraph::setDescription($seoData->description);
        OpenGraph::setTitle($seoData->share_title);
        OpenGraph::setUrl('https://bdbookshop.com/');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($seoData->title);
        TwitterCard::setSite($seoData->title);

        JsonLd::setTitle($seoData->title);
        JsonLd::setDescription($seoData->description);
        // JsonLd::addImage($site_setting->main_logo);



        $header = view('FrontEnd/MasterLayout/header');
        $slider = view('FrontEnd/MasterLayout/slider');
        $banner = view('FrontEnd/MasterLayout/banner');
        $topSellingProducts = view('FrontEnd/MasterLayout/topSellingProducts');
        $featuredProducts = view('FrontEnd/MasterLayout/featuredProducts');
        $banner2 = view('FrontEnd/MasterLayout/banner2');
        $partners = view('FrontEnd/MasterLayout/partners');
        $blogsection = view('FrontEnd/MasterLayout/blogsection');
        $footer = view('FrontEnd/MasterLayout/footer');
        return view('FrontEnd/MasterLayout/master')
                    ->with('header',$header)
                    ->with('slider',$slider)
                    ->with('banner',$banner)
                    ->with('topSellingProducts',$topSellingProducts)
                    ->with('featuredProducts',$featuredProducts)
                    ->with('banner2',$banner2)
                    ->with('partners',$partners)
                    ->with('blogsection',$blogsection)
                    ->with('footer',$footer);

    }
}
