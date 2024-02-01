<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAnakRequest;
use App\Http\Requests\addAnakStatus;
use App\Http\Requests\addjawabanrequest;
use App\Http\Requests\getHasil;
use App\Http\Requests\getHasilJawaban;
use App\Http\Requests\KlasifikasiAnakRequest;
use App\Http\Requests\MasyarakatAnakRequest;
use App\Http\Requests\pertanyaaRequest;
use App\Http\Requests\PetugasMasyarakatRequest;
use App\Http\Requests\PuskesmasAllRequest;
use App\Http\Requests\PuskesmasMasyarakatRequest;
use App\Http\Requests\updateAnakStatus;
use App\Models\Anak;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Puskesmas;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PuskesmasController extends Controller
{
    public function getAll(Request $request): JsonResponse
    {
        $puskesmas = Puskesmas::all();

        return response()->json([
            'puskesmas' => $puskesmas
        ], 201);
    }
    public function status(addAnakStatus $request): JsonResponse
    {
        $data = $request->validated();

        Status::create([
            'status' => $data['status'],
            'hasil' => $data['hasil'],
            'anak_id' => $data['anak_id'],
        ]);

        return response()->json([
            'data' => true
        ], 201);
    }

    public function updatestatus(updateAnakStatus $request): JsonResponse
    {
        $data = $request->validated();

        $anak = Anak::find($data['anak_id']);
        $anak->status = $data['status'];
        $anak->isBantuan = $data['status'];
        $anak->save();
        return response()->json([
            'data' => true
        ], 201);
    }


    public function pertanyaan(pertanyaaRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Fixing the where condition
        $pertanyaan = Pertanyaan::where('min', '<=', $data['usia'])
            ->where('max', '>=', $data['usia'])
            ->get();

        return response()->json([
            'pertanyaan' => $pertanyaan
        ], 201);
    }

    public function addjawaban(addjawabanrequest $request): JsonResponse
    {
        $data = $request->validated();

        // Fixing the where condition
        Jawaban::create([
            'jawaban' => $data['jawaban'],
            'anak_id' => $data['anak_id'],
            'pertanyaan_id' => $data['pertanyaan_id'],
        ]);

        return response()->json([
            'data' => true
        ], 201);
    }


    public function getById(Request $request): JsonResponse
    {
        $puskesmas = Puskesmas::find($request->id);

        return response()->json([
            'puskesmas' => $puskesmas
        ], 201);
    }

    public function getMasyarakat(PuskesmasMasyarakatRequest $request): JsonResponse
    {
        $data = $request->validated();
        $puskesmas = Puskesmas::find($data['puskesmas_id']);
        $masyarakat = $puskesmas->masyarakat;

        return response()->json([
            'masyarakat' => $masyarakat
        ], 201);
    }

    public function add(AddAnakRequest $request): JsonResponse
    {
        $data = $request->validated();
        Anak::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'berat' => $data['berat'],
            'tinggi' => $data['tinggi'],
            'masyarakat_id' => $data['masyarakat_id'],
            'puskesmas_id' => $data['puskesmas_id'],
            'anak_ke' => $data['anak_ke'],
            'isMenyusui' => $data['isMenyusui'],
            'isBuku' => $data['isMenyusui'],
        ]);
        return response()->json([
            'data' => true
        ], 200);
    }
    public function hasiljawban(getHasilJawaban $request): JsonResponse
    {
        $data = $request->validated();

        $hasil = Jawaban::where('anak_id', $data['anak_id'])
                        ->where('pertanyaan_id', $data['pertanyaan_id'])
                        ->latest('created_at')
                        ->first();

        return response()->json([
            'jawaban' => $hasil
        ], 200);
    }



    public function hasilstatus(getHasil $request): JsonResponse
    {
        $data = $request->validated();
        $status = Status::where('anak_id', $data['anak_id'])->latest('created_at')->first();
        return response()->json([
            'status' => $status
        ], 200);
    }

    public function perbarui(AddAnakRequest $request): JsonResponse
    {
        $data = $request->validated();
        Anak::update([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'berat' => $data['berat'],
            'tinggi' => $data['tinggi'],
            'masyarakat_id' => $data['masyarakat_id'],
            'puskesmas_id' => $data['puskesmas_id'],
            'anak_ke' => $data['anak_ke'],
        ]);
        return response()->json([
            'data' => true
        ], 200);
    }

    public function klasifikasi(KlasifikasiAnakRequest $request): JsonResponse
    {
        $data = $request->validated();
        $hasil = '';
        $standarTinggiBadan = [
            "Laki-Laki" => [
                "0-6 bulan" => 68,
                1,
                "7-12 bulan" => 76,
                5,
                "13-18 bulan" => 84,
                9,
                "19-24 bulan" => 93,
                3,
                "25-60 bulan" => 101,
                7,
                "61-71 bulan" => 109,
                9,
                "72-83 bulan" => 118,
                1,
                "84-95 bulan" => 126,
                3,
                "96-107 bulan" => 134,
                5,
            ],
            "Perempuan" => [
                "0-6 bulan" => 63,
                6,
                "7-12 bulan" => 71,
                9,
                "13-18 bulan" => 80,
                2,
                "19-24 bulan" => 88,
                6,
                "25-60 bulan" => 97,
                0,
                "61-71 bulan" => 105,
                2,
                "72-83 bulan" => 113,
                4,
                "84-95 bulan" => 121,
                6,
                "96-107 bulan" => 129,
                8,
            ],
        ];
        $usia = '';
        if ($data['usia'] <= 6) {
            $usia = "0-6 bulan";
        } else if ($data['usia'] <= 12) {
            $usia = "7-12 bulan";
        } else if ($data['usia'] <= 18) {
            $usia = "13-18 bulan";
        } else if ($data['usia'] <= 24) {
            $usia = "19-24 bulan";
        } else if ($data['usia'] <= 60) {
            $usia = "25-60 bulan";
        } else if ($data['usia'] <= 71) {
            $usia = "61-71 bulan";
        } else if ($data['usia'] <= 83) {
            $usia = "72-83 bulan";
        } else if ($data['usia'] <= 95) {
            $usia = "84-95 bulan";
        } else {
            $usia = "96-107 bulan";
        }

        $selisihTinggiBadan = $data['tinggi'] - $standarTinggiBadan[$data['jenis_kelamin']][$usia];

        // Tentukan status stunting
        if ($selisihTinggiBadan <= -2) {
            $hasil = "Stunting";
        } else if ($selisihTinggiBadan > -2 && $selisihTinggiBadan <= -1) {
            $hasil = "Stunting";
        } else {
            $hasil = 'Tidak';
        }

        return response()->json([
            'Hasil' => $hasil
        ], 200);
    }


    public function getPuskesmasAnak(PetugasMasyarakatRequest $request): JsonResponse
    {
        $data = $request->validated();
        $puskesmas = Puskesmas::find($data['puskesmas_id']);

        return response()->json([
            'anak' => $puskesmas->Anak
        ], 201);
    }
    public function getAnak(MasyarakatAnakRequest $request): JsonResponse
    {
        $data = $request->validated();
        $masyarakat = Puskesmas::find($data['masyarakat_id']);

        return response()->json([
            'anak' => $masyarakat->anak
        ], 201);
    }
}
