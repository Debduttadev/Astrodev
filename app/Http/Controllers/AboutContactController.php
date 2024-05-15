<?php

namespace App\Http\Controllers;

use App\Models\about_contact;
use App\Http\Requests\Storeabout_contactRequest;
use App\Http\Requests\Updateabout_contactRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AboutContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function magageaboutcontactus()
    {
        $aboutcontactus = about_contact::first();
        //dd(($aboutcontactus));
        return view('admin.magageaboutcontactus', ['page_name' => 'Mange  About and Contact details', 'navstatus' => "magageaboutcontactus", 'aboutcontactus' => $aboutcontactus]);
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
    public function store(Storeabout_contactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(about_contact $about_contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about_contact $about_contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateaboutus(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);

        $updateabout['title'] = htmlentities($request->title);
        $updateabout['description'] = htmlentities($request->description);
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'About' . time() . '.' . $ext;
            $file->move(public_path('about'), $filename);

            $updateabout['image'] = $filename;
        } else {
            $updateabout['image'] = $request->oldimage;
        }
        //dd($updateabout);
        $update = about_contact::where('id', $request->id)
            ->update($updateabout);

        if ($update) {
            session(['status' => "1", 'msg' => 'About details update is successful']);
        } else {
            session(['status' => "0", 'msg' => 'About details is not Updated']);
        }
        return redirect('/magageaboutcontactus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about_contact $about_contact)
    {
        //
    }
}
