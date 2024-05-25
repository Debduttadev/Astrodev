<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminservice()
    {
        $services = Service::get();

        $servicedata = [];
        foreach ($services as $data) {
            // $adminuser = $data->name;
            $serviceid = $data->id;

            $servicedata[$serviceid] = $data;
        }

        return view('admin.service', ['page_name' => 'Services', 'navstatus' => "adminservice", "servicedata" => $servicedata]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addservice(Request $request)
    {
        $data = $request->except('_token');
        // dd($request->file('fileToUpload'));

        $request->validate([
            ['name' => 'unique:services,name'],
            ['shortdescription' => ['required|max:255']],
            ['description' => 'required|max:255'],
        ]);

        if ($request->hasFile('fileToUpload')) {
            //dd($data);
            $request->validate([
                'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg']
            ]);

            $file = $request->file('fileToUpload');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Service' . time() . '.' . $ext;
            $file->move(public_path('service'), $filename);

            $shortdescription = htmlentities($data['shortdescription']);
            $description = htmlentities($data['description']);

            $newService = new Service;
            $newService->name = $data['name'];
            $newService->shortdescription = $data['shortdescription'];
            $newService->description = $description;
            $newService->image = $filename;
            //dd($newService);

            if ($newService->save()) {
                session(['status' => "1", 'msg' => 'Service Add is successful']);
            } else {
                session(['status' => "0", 'msg' => 'Service data is not Added']);
            }
        } else {
            session(['status' => "0", 'msg' => 'Image not uploaded']);
        }

        return redirect()->back();
    }

    /**
     * show the resource in user interphase.
     */
    public function servicedetails($name, $id)
    {
        $id = base64_decode($id);
        $servicedata = Service::where('id', $id)->first();
        // dd($servicedata);
        return view('front.servicedetail', ['servicedata' => $servicedata]);
    }

    /**
     * Display the specified resource.
     */
    public function servicelists(Service $service)
    {
        $services = Service::get();
        $allservices = '';
        $servicedata = [];
        $i = 0;
        $servicecount = count($services);
        foreach ($services as $data) {
            // $adminuser = $data->name;
            $serviceid = $data->id;

            $servicedata[$serviceid] = $data;
            $i++;
            if ($i === $servicecount) {
                $allservices .= $data->name;
            } else {
                $allservices .= $data->name . ', ';
            }
        }

        return view('front.servicelist', ['servicedata' => $servicedata, 'allservices' => $allservices]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editservice($id)
    {
        $id = base64_decode($id);
        $servicedata = Service::where('id', $id)->first();

        //dd($servicedata);
        return view('admin.editservice', ['page_name' => 'Services', 'servicedata' => $servicedata, 'navstatus' => "adminservice"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateservice(Request $request)
    {
        $data = $request->except('_token');


        $shortdescription = htmlentities($data['shortdescription']);
        $description = htmlentities($data['description']);

        $updatedata['name'] = $request->name;
        $updatedata['shortdescription'] = $request->shortdescription;
        $updatedata['description'] = $request->description;

        if ($request->hasFile('fileToUpload')) {

            $request->validate([
                'image' => ['image|mimes:jpeg,png,jpg,gif,svg']
            ]);
            $image = public_path('service') . '/' . $request->oldimage;
            unlink($image);
            $file = $request->file('fileToUpload');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Service' . time() . '.' . $ext;
            $file->move(public_path('service'), $filename);
            $updatedata['Image'] = $filename;
        } else {

            $updatedata['Image'] = $request->oldimage;
        }
        // echo $request->id;
        // dd($updatedata);

        $update = Service::where('id', $request->id)
            ->update($updatedata);

        if ($update) {
            session(['status' => "1", 'msg' => 'Service Update is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Service data is not Updated']);
        }

        return redirect('/adminservice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteservice(Request $request)
    {
        $id = base64_decode($request->id);
        $image = public_path('service') . '/' . $request->serviceimage;
        //echo json_encode(array('status' => 1, 'msg' => $image));
        $service = Service::where('id', $id)->delete();
        if ($service) {
            unlink($image);
            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
