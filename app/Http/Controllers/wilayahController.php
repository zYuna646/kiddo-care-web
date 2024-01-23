<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    private static $baseUrl = "http://api.binderbyte.com/wilayah";
    private static $apiKey = "93ed7ed0d33583305428bf71e8bd62e4c73b5ccc7ba1a426063b27f67a84f123";

    public function fetchProvinsi()
    {
        $response = Http::get(self::$baseUrl . "/provinsi", ['api_key' => self::$apiKey]);
        return $response->json();
    }

    public function fetchKabupaten($idProvinsi)
    {
        $response = Http::get(self::$baseUrl . "/kabupaten", ['api_key' => self::$apiKey, 'id_provinsi' => $idProvinsi]);
        return $response->json();
    }

    public function fetchKecamatan($idKabupaten)
    {
        $response = Http::get(self::$baseUrl . "/kecamatan", ['api_key' => self::$apiKey, 'id_kabupaten' => $idKabupaten]);
        return $response->json();
    }

    public function getProvinsi()
    {
        $provinsi = $this->fetchProvinsi();
        return response()->json($provinsi);
    }

    public function getKabupaten($idProvinsi)
    {
        $kabupaten = $this->fetchKabupaten($idProvinsi);
        return response()->json($kabupaten);
    }

    public function getKecamatan($idKabupaten)
    {
        $kecamatan = $this->fetchKecamatan($idKabupaten);
        return response()->json($kecamatan);
    }
}
