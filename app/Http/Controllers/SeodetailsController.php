<?php

namespace App\Http\Controllers;

use App\Models\seodetails;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\blog;
use App\Http\Requests\StoreseodetailsRequest;
use Illuminate\Http\Request;


class SeodetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seodetails()
    {
        $seodata = seodetails::where('relatedid', '=', '0')->get();
        $seodetails = [];

        foreach ($seodata as $key => $data) {
            $seodetails[$key]['page'] = $data->page;
            $seodetails[$key]['pagetype'] = "static";
            $seodetails[$key]['relatedid'] = $data->relatedid;
            $seodetails[$key]['status'] = 1;
        }
        //dd($seodetails);

        $i = 0;
        $newseo = [];
        $services = Service::select('id', 'nameurl')->get();
        foreach ($services as $service) {
            $newseo[$i]['page'] = "service/" . $service->nameurl;
            $newseo[$i]['pagetype'] = "service";
            $newseo[$i]['relatedid'] = $service->id;
            $seostatus = seodetails::where([['relatedid', '=', $service->id], ['page', '=', 'service']])->first();
            if ($seostatus) {
                $newseo[$i]['status'] = 1;
            } else {
                $newseo[$i]['status'] = 0;
            }
            $i++;
        }

        $blogs = blog::select('id', 'nameurl')->get();
        foreach ($blogs as $blog) {
            $newseo[$i]['page'] = "blog/" . $blog->nameurl;
            $newseo[$i]['pagetype'] = "relatedid";
            $newseo[$i]['relatedid'] = $blog->id;
            $seostatus = seodetails::where([['relatedid', '=', $blog->id], ['page', '=', 'blog']])->first();
            if ($seostatus) {
                $newseo[$i]['status'] = 1;
            } else {
                $newseo[$i]['status'] = 0;
            }
            $i++;
        }
        //dd($newseo);
        return view('admin.seodetails', ['page_name' => 'Manage Seo details', 'navstatus' => "seodetails", 'seodetails' => $seodetails, 'newseo' => $newseo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function xmlupload(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);

        if ($request->hasFile('sitemap')) {
            //dd($data);
            $file = $request->file('sitemap');
            $ext = $file->getClientOriginalExtension();
            $filename = 'sitemap' . '.' . $ext;

            $image = public_path('sitemap') . '/' . $filename;
            if (file_exists($image)) {
                unlink($image);
            }

            if ($file->move(public_path('sitemap'), $filename)) {
                session(['status' => "1", 'msg' => 'Sitemap Uploaded Successfully']);
            } else {
                session(['status' => "0", 'msg' => 'Sitemap Uploaded not done']);
            }
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreseodetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(seodetails $seodetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editseo($pagetype, $nameulr)
    {
        $seodata = [];
        $seodetails = seodetails::where('page', '=', $pagetype)->first();

        if (!empty($seodetails) && $seodetails != null) {
            $seodata['page'] = $seodetails->page;
            $seodata['pagetype'] = $pagetype;
            $seodata['relatedid'] = $seodetails->relatedid;
            $seodata['title'] = $seodetails->title;
            $seodata['keywords'] = $seodetails->keyword;
            $seodata['description'] = $seodetails->description;
            $seodata['metadata'] = json_decode($seodetails->metadata);
        } else {
            if ($pagetype == 'service') {
                $service = Service::select('id')->where('nameurl', $nameulr)->first();
                $relatedid = $service->id;
            } elseif ($pagetype == 'blog') {
                $blog = blog::select('id')->where('nameurl', $nameulr)->first();
                $relatedid = $blog->id;
            } else {
                $relatedid = 0;
            }

            $seodata['page'] = $nameulr;
            $seodata['pagetype'] = $pagetype;
            $seodata['relatedid'] = $relatedid;
            $seodata['title'] = "";
            $seodata['keywords'] = "";
            $seodata['description'] = "";
            $seodata['metadata'] = [];
        }
        //dd($seodata);
        return view('admin.editseo', ['page_name' => 'Edit Seo details', 'navstatus' => "seodetails", 'seodata' => $seodata]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateseo(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if (seodetails::where([['page', '=', $request->pagetype], ['relatedid', '=', $request->relatedid]])->exists()) {
            // page found
            $updateseo['title'] = $data['title'];
            $updateseo['keyword'] = $data['keyword'];
            $updateseo['description'] = $data['description'];
            $updateseo['metadata'] = json_encode($data['metadata']);

            $update = seodetails::where([['page', '=', $request->pagetype], ['relatedid', '=', $request->relatedid]])->update($updateseo);

            if ($update) {
                session(['status' => "1", 'msg' => 'Seo Updated successfully']);
            } else {
                session(['status' => "0", 'msg' => 'Seo Updated not done']);
            }
        } else {
            //page not found
            $newseo = new seodetails;
            $newseo->page = $data['pagetype'];
            $newseo->relatedid = $data['relatedid'];
            $newseo->title = $data['title'];
            $newseo->keyword = $data['keyword'];
            $newseo->description = $data['description'];
            $newseo->metadata = json_encode($data['metadata']);

            if ($newseo->save()) {
                session(['status' => "1", 'msg' => 'Seo Add is successful']);
            } else {
                session(['status' => "0", 'msg' => 'Seo data is not Added']);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(seodetails $seodetails)
    {
        //
    }
}
