<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelWebController extends Controller
{
    public function create()
    {
        return view('admin.master-data.KategoriArtikel.create', [
            'title' => 'Kategori Artikel',
            'subtitle' => 'Tambah Kategori Artikel',
            'active' => 'KategoriArtikel',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'KategoriArtikel_name' => 'required|unique:kategori_artikels,name',
            ],
            [
                'KategoriArtikel_name.required' => 'Kategori Artikel name is required!',
                'KategoriArtikel_name.unique' => 'Kategori Artikel name is already exists!',
            ]
        );

        KategoriArtikel::create([
            'name' => $request->KategoriArtikel_name,
        ]);

        return redirect()->route('KategoriArtikel')->with('Berhasil', 'Kategori Artikel Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        return view('admin.master-data.KategoriArtikel.edit', [
            'title' => 'Kategori Artikel',
            'subtitle' => 'Edit Kategori Artikel',
            'active' => 'KategoriArtikel',
            'data' => KategoriArtikel::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'KategoriArtikel_name' => 'required|unique:kategori_artikels,name,' . $id,
            ],
            [
                'KategoriArtikel_name.required' => 'Kategori Artikel name is required!',
                'KategoriArtikel_name.unique' => 'Kategori Artikel name is already exists!',
            ]
        );

        $KategoriArtikel = KategoriArtikel::findOrFail($id);

        $KategoriArtikel->update([
            'name' => $request->KategoriArtikel_name,
        ]);

        return redirect()->route('KategoriArtikel')->with('Berhasil', 'Kategori Artikel Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $KategoriArtikel = KategoriArtikel::findOrFail($id);
        $KategoriArtikel->delete();

        return redirect()->route('KategoriArtikel')->with('Berhasil', 'Kategori Artikel Berhasil Di Hapus');
    }

    public function Artikelcreate()
    {
        return view('admin.master-data.Artikel.create', [
            'title' => 'Artikel',
            'subtitle' => 'Tambah Artikel',
            'active' => 'Artikel',
            'KategoriArtikel' => KategoriArtikel::all()

        ]);
    }

    public function Artikelstore(Request $request)
    {
        $this->validate(
            $request,
            [
                'parent' => 'required',
                'judul' => 'required',
                'isi_artikel' => 'required',
                'cover' => 'required|image|mimes:png,jpg,jpeg',
            ],
            [
                'parent.required' => 'Artikel name is required!',
            ]
        );

        $image = $request->file('cover');
        $image_name = time() . '-' . rand(1, 100) . '-' . $request->judul . '.' . $image->extension();
        $image->move(public_path('uploads/catalog/image'), $image_name);

        Artikel::create([
            'title' => $request->judul,
            'kategori_id' => $request->parent,
            'body' => $request->isi_artikel,
            'cover' => $image_name
        ]);

        return redirect()->route('Artikel')->with('success', 'Artikel Berhasil Di Tambahkan');
    }

    public function Artikeledit($id)
    {
        return view('admin.master-data.artikel.edit', [
            'title' => 'Artikel',
            'subtitle' => 'Edit Artikel',
            'active' => 'Artikel',
            'data' => Artikel::findOrFail($id),
            'KategoriArtikel' => KategoriArtikel::all()
        ]);
    }

    public function Artikelupdate(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'parent' => 'required',
                'judul' => 'required',
                'isi_artikel' => 'required',
            ],
            [
                'parent.required' => 'Artikel name is required!',
            ]
        );

        $artikel = artikel::findOrFail($id);
        $image = $request->file('cover');


        if ($image != null) {
            $image_name = time() . '-' . rand(1, 100) . '-' . $request->judul . '.' . $image->extension();
            $image->move(public_path('uploads/catalog/image'), $image_name);

            $artikel->update([
                'title' => $request->judul,
                'kategori_id' => $request->parent,
                'body' => $request->isi_artikel,
                'cover' => $image_name
            ]);

        } else {
            $artikel->update([
                'title' => $request->judul,
                'kategori_id' => $request->parent,
                'body' => $request->isi_artikel,
            ]);
        }



        return redirect()->route('Artikel')->with('Berhasil', 'Artikel Berhasil Di Edit');
    }

    public function Artikeldestroy($id)
    {
        $KategoriArtikel = Artikel::findOrFail($id);
        $KategoriArtikel->delete();

        return redirect()->route('Artikel')->with('Berhasil', 'Artikel Berhasil Di Hapus');
    }
}
