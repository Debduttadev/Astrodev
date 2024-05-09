<?php

namespace App\Http\Controllers;

use App\Models\banner_video;
use App\Http\Requests\Storebanner_videoRequest;
use App\Http\Requests\Updatebanner_videoRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BannerVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managebannervideo()
    {
        $bannervideo = banner_video::get();
        //dd($bannervideo);
        return view('admin.managebannervideo', ['page_name' => 'Manage Banners and Videos', 'navstatus' => "managebannervideo", 'bannervideo' => $bannervideo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addbannervideo(Request $request)
    {

        $request->validate([
            'url' => 'url:http,https',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('fileToUpload')) {
            //dd($data);
            $request->validate([
                'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg']
            ]);

            $file = $request->file('fileToUpload');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Banner' . time() . '.' . $ext;
            $file->move(public_path('bannervideo'), $filename);

            $newBannerVideo = new banner_video;
            $newBannerVideo->videolink = $data['videolink'];
            $newBannerVideo->thumbnailtype = $data['thumbnailtype'];
            $newBannerVideo->show = $data['show'];
            $newBannerVideo->thumbnail = $filename;
            //dd($newBannerVideo);

            if ($newBannerVideo->save()) {
                session(['status' => "1", 'msg' => 'File Add is successful']);
            } else {
                session(['status' => "0", 'msg' => 'File data is not Added']);
            }
        } else {
            session(['status' => "0", 'msg' => 'File not uploaded']);
        }

        return redirect()->back();
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
    public function editbannervideo($id)
    {
        $id = base64_decode($id);
        $bannervideodata = banner_video::where('id', $id)->first();

        //dd($bannervideodata);
        return view('admin.editbannervideo', ['page_name' => 'Manage Banners and Videos', 'bannervideodata' => $bannervideodata, 'navstatus' => "managebannervideo"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatebannervideo(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletebannervideo(Request $request)
    {
        $id = base64_decode($request->id);
        $image = public_path('bannervideo') . '/' . $request->bannervideoimage;
        // echo json_encode(array('status' => 1, 'msg' => $image));
        $bannervideo = banner_video::where('id', $id)->delete();
        if ($bannervideo) {
            unlink($image);
            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
