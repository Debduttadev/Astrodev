<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Http\Requests\StorecontactusRequest;
use App\Http\Requests\UpdatecontactusRequest;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managecontactus()
    {
        return view('admin.managecontactus', ['page_name' => 'Mange Contact us page', 'navstatus' => "managecontactus"]);
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
    public function destroy(contactus $contactus)
    {
        //
    }
}
