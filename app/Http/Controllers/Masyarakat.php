<?php

namespace App\Http\Controllers;

use App\Models\AdminWeb;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Masyarakat extends Controller
{
    public function create()
    {
        return view('admin.master-data.masyarakat.create', [
            'title' => 'Masyarakat',
            'subtitle' => 'Tambah Masyarakat',
            'active' => 'Masyarakat',
        ]);


    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
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
            'role' => 'masyarakat',
            'password' =>  Hash::make($request->new_password),
        ]);

        $admin = AdminWeb::where('user_id', auth()->user()->id)->first();

        \App\Models\Masyarakat::create([
            'user_id' => $user->id,
            'puskesmas_id' => $admin->puskesmas_id,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'nkk'=> $request->nkk,
            'nik'=> $request->nik,
        ]);




        return redirect()->route('Masyarakat')->with('Berhasil', 'Masyarakat Berhasil Di Tambahkan');

    }
}
