<?php

namespace App\Http\Controllers;

use App\Models\banner_video;
use App\Http\Requests\Storebanner_videoRequest;
use App\Http\Requests\Updatebanner_videoRequest;

class BannerVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managebannervideo()
    {
        return view('admin.managebannervideo', ['page_name' => 'Mange Banners and Videos', 'navstatus' => "managebannervideo"]);
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
    public function store(Storebanner_videoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(banner_video $banner_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(banner_video $banner_video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatebanner_videoRequest $request, banner_video $banner_video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(banner_video $banner_video)
    {
        //
    }
}
