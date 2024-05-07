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

        if ($request->hasFile('fileToUpload')) {
            //dd($data);
            $request->validate([
                'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg']
            ]);

            $file = $request->file('fileToUpload');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Service' . time() . '.' . $ext;
            $file->move(public_path('service'), $filename);
            $description = str_replace("\"", "&quot;", $data['description']);
            $description = str_replace("\'", "&apos;", $description);
            $newService = new Service;
            $newService->name = $data['name'];
            $newService->shortdescription = $data['shortdescription'];
            $newService->description = $description;
            $newService->image = $filename;
            //dd($newService);

            if ($newService->save()) {
                session(['status' => "1", 'msg' => 'Service Add is successful']);
            } else {
                session(['status' => "0", 'msg' => 'Service data is not Updated']);
            }
        } else {
            session(['status' => "0", 'msg' => 'Image not uploaded']);
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
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
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteservice(Request $request)
    {
        $id = base64_decode($request->id);
        //echo json_encode(array('status' => 1, 'msg' => $id));
        $service = Service::where('id', $id)->delete();
        if ($service) {
            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
