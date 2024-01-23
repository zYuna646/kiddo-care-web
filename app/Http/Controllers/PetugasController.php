<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasMasyarakatRequest;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetugasController extends Controller
{

    public function masyarakat(PetugasMasyarakatRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = Masyarakat::where('puskesmas_id', $data['puskesmas_id']);
        return response()->json([
            'masyarakat' => $user
        ], 200);
    }
}
