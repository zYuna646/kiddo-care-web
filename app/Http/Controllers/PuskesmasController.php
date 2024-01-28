<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAnakRequest;
use App\Http\Requests\MasyarakatAnakRequest;
use App\Http\Requests\PetugasMasyarakatRequest;
use App\Http\Requests\PuskesmasAllRequest;
use App\Http\Requests\PuskesmasMasyarakatRequest;
use App\Models\Anak;
use App\Models\Puskesmas;
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
        ]);
        return response()->json([
            'data' => true
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
