<?php

namespace App\Http\Controllers;

use App\Models\chamber;
use App\Http\Requests\StorechamberRequest;
use App\Http\Requests\UpdatechamberRequest;

class ChamberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminchamber()
    {
        return view('admin.chamber', ['page_name' => 'Chambers', 'navstatus' => "adminchember"]);
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
    public function store(StorechamberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(chamber $chamber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chamber $chamber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatechamberRequest $request, chamber $chamber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chamber $chamber)
    {
        //
    }
}
