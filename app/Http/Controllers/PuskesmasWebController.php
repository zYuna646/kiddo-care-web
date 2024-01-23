<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;


class PuskesmasWebController extends Controller
{
    public function create($provinsi_id = null, $kabupaten_id = null)
{
    return view('admin.master-data.puskesmas.create', [
        'title' => 'Puskesmas',
        'subtitle' => 'Tambah Puskesmas',
        'active' => 'Puskesmas',
        'provinsi' => (new WilayahController())->fetchProvinsi()['value'],
        'provinsi_id' => $provinsi_id,
        'kabupaten_id' => $kabupaten_id,
        'kabupaten' => $provinsi_id ? (new WilayahController())->fetchKabupaten($provinsi_id)['value'] : [],
        'kecamatan' => $kabupaten_id ? (new WilayahController())->fetchKecamatan($kabupaten_id)['value'] : [],
    ]);
}


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
            ],
            [
            ]
        );

        $wilayah = new WilayahController();


        $provinsi =  $wilayah->fetchProvinsi()['value'];
        $kabupaten = $wilayah->fetchKabupaten($request->provinsi)['value'];
        $kecamatan = $wilayah->fetchKecamatan($request->kabupaten)['value'];

        foreach ($provinsi as $item) {
            if ($item['id'] == $request->provinsi) {
                $provinsi = $item['name'];
            }
        }


        foreach ($kabupaten as $item) {
            if ($item['id'] == $request->kabupaten) {
                $kabupaten = $item['name'];
            }
        }


        foreach ($kecamatan as $item) {
            if ($item['id'] == $request->kecamatan) {
                $kecamatan = $item['name'];
            }
        }


        Puskesmas::create([
            'name' => $request->name,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'provinsi' => $provinsi
        ]);

        return redirect()->route('Puskesmas')->with('Berhasil', 'Puskesmas Berhasil Di Tambahkan');
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
        $KategoriArtikel = Puskesmas::findOrFail($id);
        $KategoriArtikel->delete();

        return redirect()->route('Puskesmas')->with('Berhasil', 'Puskesmas Berhasil Di Hapus');
    }

}
