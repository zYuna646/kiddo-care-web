<?php

namespace App\Http\Controllers;

use App\Models\AdminWeb;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'subtitle' => '',
            'active' => 'dashboard',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function KategoriArtikel()
    {
        return view('admin.master-data.KategoriArtikel.index', [
            'title' => 'Kategori Artikel',
            'subtitle' => '',
            'active' => 'KategoriArtikel',
            'datas' => KategoriArtikel::all()
        ]);
    }

    public function Artikel()
    {
        return view('admin.master-data.artikel.index', [
            'title' => 'Artikel',
            'subtitle' => '',
            'active' => 'Artikel',
            'datas' => Artikel::all()
        ]);
    }

    public function Puskesmas()
    {
        return view('admin.master-data.puskesmas.index', [
            'title' => 'Puskesmas',
            'subtitle' => '',
            'active' => 'Puskesmas',
            'datas' => Puskesmas::all()
        ]);
    }

    public function Admin()
    {

        return view('admin.master-data.admin.index', [
            'title' => 'Admin Puskesmas',
            'subtitle' => '',
            'active' => 'Admin',
            'datas' => AdminWeb::all()
        ]);
    }
}
