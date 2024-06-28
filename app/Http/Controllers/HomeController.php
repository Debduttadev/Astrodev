<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\about_contact;
use App\Models\banner_video;
use App\Models\Appointment;
use App\Models\blog;
use App\Models\tag;
use App\Models\category;
use App\Models\keyword;
use App\Models\chamber;
use App\Models\Contactus;
use App\Models\Invoice;
use App\Models\Social;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {

        // banner details
        $banner_video = banner_video::where([
            ['thumbnailtype', '0'],
            ['show', '1'],
        ])->get();

        //  services details
        $services = Service::get();
        $allservices = '';
        $servicedata = [];
        $i = 0;
        $servicecount = count($services);
        foreach ($services as $data) {

            $serviceid = $data->id;

            $servicedata[$serviceid] = $data;
            $i++;
            if ($i === $servicecount) {
                $allservices .= $data->name;
            } else {
                $allservices .= $data->name . ', ';
            }
        }

        // youtube video details
        $youtube_video = banner_video::where([
            ['thumbnailtype', '1'],
            ['show', '1'],
        ])->get();

        // blog details
        $blogs = blog::get();
        $blogitems = [];
        foreach ($blogs as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];
            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];
            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }
            $blogitems[$blogdata->id]['tag'] = $tags;

            $blogitems[$blogdata->id]['description'] = html_entity_decode($blogdata->description);
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }
            $createdat = $blogdata->created_at;
            $blogitems[$blogdata->id]['createdat'] = $blogdata->created_at->format('d F, Y');
        }

        //dd($blogitems);
        return view('front.home', ['banner_video' => $banner_video, 'servicedata' => $servicedata, 'allservices' => $allservices, 'youtube_video' => $youtube_video, 'blogitems' => $blogitems]);
    }

    /**
     * Show page for terms and condition
     */
    public function terms_conditions()
    {
        return view('front.terms_conditions');
    }

    /**
     * Show page for terms and condition
     */
    public function privacy_policy()
    {
        return view('front.privacy_policy');
    }

    /**
     * Show page for terms and condition
     */
    public function refund_policy()
    {
        return view('front.refund_policy');
    }

    /**
     * Show page for shipping
     */
    public function shipping()
    {
        return view('front.shipping');
    }
}
