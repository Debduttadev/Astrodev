<?php

namespace App\Http\Controllers;

use App\Models\chamber;
use App\Http\Requests\StorechamberRequest;
use App\Http\Requests\UpdatechamberRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ChamberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminchamber()
    {

        $chambers = Chamber::get();

        $chamberdata = [];
        foreach ($chambers as $data) {

            $chamberid = $data->id;
            $chamberdata[$chamberid] = $data;
        }

        return view('admin.chamber', ['page_name' => 'Chambers', 'navstatus' => "adminchember", "chamberdata" => $chamberdata]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addchamber(Request $request)
    {
        $data = $request->except('_token');
        $days = $data['day'];
        //dd($data);
        $newChamber = new Chamber;
        $newChamber->locationname = $data['name'];
        $newChamber->availabledays = json_encode($days);
        $newChamber->description = $data['description'];

        //set session
        if ($newChamber->save()) {
            session(['status' => "1", 'msg' => 'Chamber Add is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Chamber data is not Added']);
        }

        return redirect()->back();
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
