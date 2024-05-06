<?php

namespace App\Http\Controllers;

use App\Models\about_contact;
use App\Http\Requests\Storeabout_contactRequest;
use App\Http\Requests\Updateabout_contactRequest;

class AboutContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function magageaboutcontactus()
    {
        return view('admin.magageaboutcontactus', ['page_name' => 'Mange  About and Contact details', 'navstatus' => "magageaboutcontactus"]);
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
    public function update(Updateabout_contactRequest $request, about_contact $about_contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about_contact $about_contact)
    {
        //
    }
}
