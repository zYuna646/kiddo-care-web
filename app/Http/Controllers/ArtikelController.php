<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriArtikelRequest;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function KategoriArtikel(): JsonResponse
    {
        $kategori = KategoriArtikel::all();
        return response()->json([
            'kategori' => $kategori
        ], 200);
    }

    public function KategoriById(KategoriArtikelRequest $request): JsonResponse
    {
        $data = $request->validated();
        $kategori = KategoriArtikel::find( $data['kategori_id']);
        return response()->json([
            'kategori' => $kategori
        ], 200);
    }

    public function artikel(): JsonResponse
    {
        $artikel = Artikel::all();
        return response()->json([
            'artikel' => $artikel
        ], 200);
    }
}
