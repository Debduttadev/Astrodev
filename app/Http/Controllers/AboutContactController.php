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
     * Update the about us resource in storage.
     */
    public function updateaboutus(Request $request)
    {
        $data = $request->except('_token');

        $updateabout['title'] = htmlentities($request->title);
        $updateabout['description'] = htmlentities($request->description);
        //dd($ifixtitle);
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
     * Update the contact us resource in storage.
     */
    public function updatecontactus(Request $request)
    {
        $data = $request->except('_token');

        $updatecontact['address'] = $request->address;
        $updatecontact['email'] = $request->email;
        $updatecontact['phone'] = implode(",", $request->phone);
        $updatecontact['whatsapp'] = $request->whatsapp;

        //dd($updatecontact);
        $update = about_contact::where('id', $request->contactid)
            ->update($updatecontact);

        if ($update) {
            session(['status' => "1", 'msg' => 'Contact details update is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Contact details is not Updated']);
        }
        return redirect('/magageaboutcontactus');
    }


    /**
     * About details for frontend.
     */
    public function frontabout()
    {
        // about me details
        $aboutcontactus = about_contact::first();

        dd($aboutcontactus);
        return view('front.about', ['aboutcontactus' => $aboutcontactus]);
    }
}
