<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuskesmasAllRequest;
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
        $puskesmas = Puskesmas::find( $request->id );

        return response()->json([
            'puskesmas' => $puskesmas
        ], 201);
    }
}
