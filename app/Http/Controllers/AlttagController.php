<?php

namespace App\Http\Controllers;

use App\Models\alttag;
use App\Http\Requests\StorealttagRequest;
use App\Http\Requests\UpdatealttagRequest;
use App\Models\about_contact;
use App\Models\banner_video;
use App\Models\blog;
use App\Models\Service;

class AlttagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function alttag()
    {
        $aboutimage = '';
        $bannervideos = '';
        $blog = '';
        $service = '';

        // about page images
        $aboutimage = about_contact::select('id', 'image')->get();
        $bannervideos = banner_video::select('id', 'thumbnail')->get();
        $service = Service::select('id', 'Image')->get();
        $blog = blog::select('id', 'image')->get();

        $allimages = [];

        foreach ($aboutimage as $image) {
            if ($image->image != null) {
                $allimages['about_contacts'][$image->id] = $image->image;
            }
        }
        foreach ($bannervideos as $image) {
            if ($image->thumbnail != null) {
                $allimages['banner_videos'][$image->id] = $image->thumbnail;
            }
        }
        foreach ($service as $image) {
            if ($image->Image != null) {
                $allimages['services'][$image->id] = $image->Image;
            }
        }
        foreach ($blog as $image) {
            if ($image->image != null) {
                $allimages['blogs'][$image->id] = $image->image;
            }
        }
        // echo "<pre>";
        // print_r($allimages);
        // echo "</pre>";
        // exit;
        return view('admin.alttag', ['page_name' => 'Alt Tag', 'navstatus' => "alttag", 'allimages' => $allimages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorealttagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(alttag $alttag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alttag $alttag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatealttagRequest $request, alttag $alttag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alttag $alttag)
    {
        //
    }
}
