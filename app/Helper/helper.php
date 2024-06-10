<?php // Code within app\Helpers\Helper.php

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

if (!function_exists('numberService')) {
    function numberService()
    {
        $numberservice = Service::count();
        return $numberservice;
    }
}

if (!function_exists('aboutalldetails')) {
    function aboutalldetails()
    {
        $aboutcontact = about_contact::first();
        return $aboutcontact;
    }
}


if (!function_exists('scociallinks')) {
    function scociallinks()
    {
        //social media link
        $social = Social::where('visibility', '1')->get();
        $socialdata = [];
        $i = 0;
        foreach ($social as $icon) {
            // echo "<pre>";
            // echo $icon;
            // echo "</pre>";
            $socialdata[$i]['id'] = $icon->id;
            $socialdata[$i]['name'] = $icon->name;
            $socialdata[$i]['icon'] = $icon->icon;
            $socialdata[$i]['url'] = $icon->url;
            $socialdata[$i]['visibility'] = $icon->visibility;

            $i++;
        }
        return $socialdata;
    }
}

if (!function_exists('servicelistfooter')) {
    function servicelistfooter()
    {
        //service link
        $services = Service::select('id', 'name')->get();
        $servicedata = [];
        foreach ($services as $service) {
            $servicedata[$service->id] = $service->name;
        }
        return $servicedata;
    }
}


if (!function_exists('blogfilters')) {
    function blogfilters()
    {
        $blogfilters = [];

        $alltags = tag::select('id', 'tag')->get();
        $alltag = [];
        foreach ($alltags as $tag) {
            $alltag[$tag->id] = $tag->tag;
        }
        $blogfilters['alltag'] = $alltag;

        $allkeywords = keyword::select('id', 'keyword')->get();
        $allkeyword = [];
        foreach ($allkeywords as $keyword) {
            $allkeyword[$keyword->id] = $keyword->keyword;
        }
        $blogfilters['allkeyword'] = $allkeyword;

        $allcategories = category::select('id', 'category')->get();
        $allcategory = [];
        foreach ($allcategories as $category) {
            $allcategory[$category->id] = $category->category;
        }
        $blogfilters['allcategory'] = $allcategory;


        return $blogfilters;
    }
}
