<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard', ['page_name' => 'dashboard', 'navstatus' => "dashboard"]);
    }

    public function adminuser()
    {
        $adminuser = User::get();
        // echo "<pre>";
        // print_r($adminuser);
        // echo "</pre>";
        // exit;
        $adminuserdata = [];
        foreach ($adminuser as $data) {
            $adminuser = $data->name;
            $adminid = $data->id;
            $adminuserdata[$adminid] = $data;
        }
        return view('admin.adminuser', ['page_name' => 'Admin detail', 'navstatus' => "adminuser", "adminuserdata" => $adminuserdata]);
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteadmin(Request $request)
    {
        $id = base64_decode($request->id);
        //echo json_encode(array('status' => 1, 'msg' => $id));
        $adminuser = User::where('id', $id)->delete();
        if ($adminuser) {
            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
