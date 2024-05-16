<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Http\Requests\StorecontactusRequest;
use App\Http\Requests\UpdatecontactusRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managecontactus()
    {
        $contactus = Contactus::get();

        return view('admin.managecontactus', ['page_name' => 'Mange Contact us page', 'navstatus' => "managecontactus", 'contactus' => $contactus]);
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
    public function store(StorecontactusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecontactusRequest $request, contactus $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletecontactdetails(Request $request)
    {
        $id = base64_decode($request->id);
        // echo json_encode(array('status' => 1, 'msg' => $id));
        $contact = Contactus::where('id', $id)->delete();

        if ($contact) {
            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
