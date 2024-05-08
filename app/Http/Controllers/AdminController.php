<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            // $adminuser = $data->name;
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
     * Show the form for editing the admin resource.
     */
    public function editadmin($id)
    {
        $id = base64_decode($id);

        $adminuser = User::where('id', $id)->first();

        //dd($adminuser);
        return view('admin.editadminuser', ['page_name' => 'editadminuser', 'admin' => $adminuser, 'navstatus' => "adminuser"]);
    }

    /**
     * Update the Admin detail resource in storage.
     */
    public function updateadminuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $userdata = User::where('id', $request->id)->first();
        //dd($email);
        if ($userdata->email != $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class]
            ]);
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['usertype'] = $request->usertype;

        //dd($data);
        if (!empty($request->password) or  $request->password != "") {
            $request->validate(['password' => ['required', 'confirmed', Rules\Password::defaults()]]);

            $data['password'] = Hash::make($request->password);
        }
        //dd($data);
        $update = User::where('id', $request->id)
            ->update($data);

        //set session
        if ($update) {
            session(['status' => "1", 'msg' => 'Admin data Update is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Admin data is not Updated']);
        }
        return redirect('/adminuser');
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
