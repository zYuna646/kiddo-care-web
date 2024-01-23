<?php

namespace App\Http\Controllers;

use App\Models\AdminWeb;
use App\Models\Puskesmas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.master-data.admin.create', [
            'title' => 'Admin Web',
            'subtitle' => 'Tambah Admin Web',
            'active' => 'User',
            'puskesmas' => Puskesmas::all()
        ]);


    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'puskesmas' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'new_password' => 'required|string|min:6',
                'confirm_new_password' => 'required',
            ],
            [
            ]
        );

        $user = User::create([
            'username'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'role' => 'Puskesmas',
            'password' => $request->new_password
        ]);

        AdminWeb::create([
            'user_id' => $user->id,
            'puskesmas_id' => $request->puskesmas,
        ]);


        return redirect()->route('Admin')->with('Berhasil', 'Admin Web Berhasil Di Tambahkan');

    }
}
