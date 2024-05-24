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
