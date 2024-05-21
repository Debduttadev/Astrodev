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
        $banner_video = banner_video::where([
            ['thumbnailtype', '0'],
            ['show', '1'],
        ])->get();
        //dd($banner_video);
        return view('front.home', ['banner_video' => $banner_video]);
    }
}
