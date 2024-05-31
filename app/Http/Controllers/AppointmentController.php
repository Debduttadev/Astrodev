<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\chamber;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminappointment()
    {

        return view('admin.appointment', ['page_name' => 'Appointment', 'navstatus' => "adminappointment"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function appointment()
    {
        $allchamber = chamber::select('id', 'locationname')->get();
        //dd($allchamber);
        return view('front.appoinment', ['allchamber' => $allchamber, 'navstatus' => "adminappointment"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addappointment(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if ($data['appointmentType'] == 'on') {
            $data['chamber'] = null;
        }
        $user = User::select('id')->where('email', $data['email'])->first();
        $userid = "";
        //dd($user->id);
        if ($user->id > 0) {
            $userid = $user->id;
        } else {
            $newuser = new User;
            $newuser->name = ucfirst($data['name']);
            $newuser->email = $data['email'];
            $newuser->password = "";
            $newuser->usertype = "3";
            $newuser->save();
            $userid = $newuser->id;
        }
        $dateOfBirth = date_create($data['dateOfBirth']);
        $bookingDate = date_create('01-' . $data['bookingDate']);
        $timeOfBirth = strtotime($data['timeOfBirth']);
        //dd($timeOfBirth);

        $newappoinment = new Appointment;
        $newappoinment->userid = $userid;
        $newappoinment->phoneNumber = $data['phoneNumber'];
        $newappoinment->whatsappNumber = $data['whatsappNumber'];
        $newappoinment->gender = $data['gender'];
        $newappoinment->dateOfBirth = date_format($dateOfBirth, "Y-m-d H:i:s");
        $newappoinment->timeOfBirth = date(intval($timeOfBirth), 'H:i:s');
        $newappoinment->placeOfBirth = $data['placeOfBirth'];
        $newappoinment->stateOfBirth = $data['stateOfBirth'];
        $newappoinment->bookingDate = date_format($bookingDate, "Y-m-d H:i:s");
        $newappoinment->appointmentType = $data['appointmentType'];
        $newappoinment->chamberId = $data['chamber'];

        //set session
        if ($newappoinment->save()) {
            dd($newappoinment->id);
            session(['status' => "1", 'msg' => 'Appointment Add is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Appointment is not Added']);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
