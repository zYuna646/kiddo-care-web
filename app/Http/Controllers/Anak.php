<?php

namespace App\Http\Controllers;

use App\Models\AdminWeb;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class Anak extends Controller
{
    public function create()
    {
        $admin = AdminWeb::where('user_id', auth()->user()->id)->first();
        $masyarakat = Masyarakat::where('puskesmas_id', $admin->puskesmas_id)->get();
        return view('admin.master-data.anak.create', [
            'title' => 'Anak',
            'subtitle' => 'Tambah Anak',
            'active' => 'Anak',
            'masyarakat' => $masyarakat
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
            'password' =>  Hash::make($request->new_password),
        ]);

        AdminWeb::create([
            'user_id' => $user->id,
            'puskesmas_id' => $request->puskesmas,
        ]);


        return redirect()->route('Admin')->with('Berhasil', 'Admin Web Berhasil Di Tambahkan');

    }
}
