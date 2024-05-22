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

        // about me details
        $about_contact = about_contact::first();

        //  services details
        $services = Service::get();
        $servicedata = [];
        foreach ($services as $data) {
            // $adminuser = $data->name;
            $serviceid = $data->id;

            $servicedata[$serviceid] = $data;
        }

        // youtube video details
        $youtube_video = banner_video::where([
            ['thumbnailtype', '1'],
            ['show', '1'],
        ])->get();

        //social media link
        $social = Social::get();

        $socialdata = [];
        $i = 0;
        foreach ($social as $icon) {
            // echo "<pre>";
            // echo $icon;
            // echo "</pre>";
            $socialdata[$i]['id'] = $icon->id;
            $socialdata[$i]['name'] = $icon->name;
            $socialdata[$i][$icon->name] = $icon->icon;
            $socialdata[$i]['url'] = $icon->url;
            $socialdata[$i]['visibility'] = $icon->visibility;

            $i++;
        }

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
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            $blogitems[$blogdata->id]['image'] = $blogdata->image;
        }
        //dd($blogitems);
        $alltags = tag::select('id', 'tag')->get();
        $alltag = [];
        foreach ($alltags as $tag) {
            $alltag[$tag->id] = $tag->tag;
        }

        $allkeywords = keyword::select('id', 'keyword')->get();
        $allkeyword = [];
        foreach ($allkeywords as $keyword) {
            $allkeyword[$keyword->id] = $keyword->keyword;
        }

        $allcategories = category::select('id', 'category')->get();
        $allcategory = [];
        foreach ($allcategories as $category) {
            $allcategory[$category->id] = $category->category;
        }

        //dd($servicedata);
        return view('front.home', ['banner_video' => $banner_video, 'about_contact' => $about_contact, 'servicedata' => $servicedata, 'youtube_video' => $youtube_video, 'socialdata' => $socialdata, 'blogitems' => $blogitems]);
    }
}
