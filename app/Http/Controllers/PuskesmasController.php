<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuskesmasAllRequest;
use App\Http\Requests\PuskesmasMasyarakatRequest;
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
}
