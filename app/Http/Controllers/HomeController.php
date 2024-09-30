<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\banner_video;
use App\Models\blog;
use App\Models\reviewsection;
use Ixudra\Curl\Facades\Curl;

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

        $reviews = reviewsection::all();

        //@AchariyaDebdutta
        $url1 = 'https://www.googleapis.com/youtube/v3/channels?part=snippet&part=statistics&id=UCqDfG4lWZ5OJgJSc2XK7g4A' . '&key=AIzaSyBUm1uVpuIGK2GudT_jFjagMWqnwZRojNI';

        $response1 = Curl::to($url1)
            ->get();
        //dd($response);
        $response1 = json_decode($response1);
        $youtubechannelitems1 = $response1->items[0];
        $youtubechanneldata1 = $youtubechannelitems1->snippet;
        $youtubechanneldatasubscription1 = $youtubechannelitems1->statistics->subscriberCount;

        //@TheDebduttaShow -
        $url2 = 'https://www.googleapis.com/youtube/v3/channels?part=snippet&part=statistics&id=UCE6Wescg35pfTdUmOpJsYsQ' . '&key=AIzaSyBUm1uVpuIGK2GudT_jFjagMWqnwZRojNI';

        $response2 = Curl::to($url2)
            ->get();
        //dd($response);
        $response2 = json_decode($response2);
        $youtubechannelitems2 = $response2->items[0];
        $youtubechanneldata2 = $youtubechannelitems2->snippet;
        $youtubechanneldatasubscription2 = $youtubechannelitems2->statistics->subscriberCount;

        //dd($youtubechanneldatasubscription2);

        //@AstroAchariya -
        $url3 = 'https://www.googleapis.com/youtube/v3/channels?part=snippet&part=statistics&id=UCHeZB0rv09RBnEySIfehLOA' . '&key=AIzaSyBUm1uVpuIGK2GudT_jFjagMWqnwZRojNI';

        $response3 = Curl::to($url3)
            ->get();
        $response3 = json_decode($response3);
        $youtubechannelitems3 = $response3->items[0];
        $youtubechanneldata3 = $youtubechannelitems3->snippet;
        $youtubechanneldatasubscription3 = $youtubechannelitems3->statistics->subscriberCount;

        return view('front.home', [
            'banner_video' => $banner_video,
            'servicedata' => $servicedata,
            'allservices' => $allservices,
            'youtube_video' => $youtube_video,
            'blogitems' => $blogitems,
            'reviews' => $reviews,
            'youtubechanneldata1' => $youtubechanneldata1,
            'youtubechanneldatasubscription1' => $youtubechanneldatasubscription1,
            'youtubechanneldata2' => $youtubechanneldata2,
            'youtubechanneldatasubscription2' => $youtubechanneldatasubscription2,
            'youtubechanneldata3' => $youtubechanneldata3,
            'youtubechanneldatasubscription3' => $youtubechanneldatasubscription3
        ]);
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
