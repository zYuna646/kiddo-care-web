<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCheck;
use App\Http\Requests\UserDetail;
use App\Http\Requests\UserIdRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\MasyarakatResource;
use App\Http\Resources\UserResource;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\User;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->count() == 1 || User::where('phone', $data['phone'])->count() == 1) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => "Email Atau Nomor Telepon Sudah Digunakan"
                ]
            ], 400));
        }

        $user = User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        $user->save();

        if ($data['role'] == 'masyarakat') {
            $masyarakat = Masyarakat::create([
                'jenis_kelamin' => $data['jk'],
                'nik' => $data['ktp'],
                'nkk' => $data['kk'],
                'puskesmas_id' => $data['puskesmas_id'],
                'user_id' => $user->id,
            ]);

            $masyarakat->save();
        } else {
            $petugas = Petugas::create([
                'puskesmas_id' => $data['puskesmas_id'],
                'user_id' => $user->id,
                'jenis_kelamin' => $data['jk'],
                'nik' => $data['ktp'],
                'nkk' => $data['kk'],
            ]);
        }

        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function check(UserCheck $request): JsonResponse
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->count() == 1 || user::where('phone', $data['phone'])->count() == 1) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => "Email Atau Nomor Telepon Sudah Digunakan"
                ]
            ], 400));
        } else {
            throw new HttpResponseException(response([
                "data" => true
            ], 201));
        }
    }

    public function id(UserIdRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::find($data['user_id']);
        return response()->json([
            'user' => $user
        ], 201);
    }

    public function all(): JsonResponse
    {
        $user = User::all();
        return response()->json([
            'user' => $user
        ], 201);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::where('email', $data['username'])
            ->orWhere('phone', $data['username'])
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => "Email or phone number or password is incorrect"
                ]
            ], 400));
        }

        $user->token = Str::uuid()->toString();
        $user->save();

        if ($user->role == "masyarakat") {
            $masyarakat = $user->masyarakat;
            return response()->json([
                'data' => [
                    'user' => $user,
                    'masyarakat' => $masyarakat
                ]

            ], 200);

        } else {
            $petugas = $user->petugas;
            return response()->json([
                'data' => [
                    'user' => $user,
                    'petugas' => $petugas
                ]

            ], 200);
        }




    }

    public function get(Request $request): UserResource
    {
        $user = Auth::user();
        return new UserResource($user);
    }


    public function detailUser(UserDetail $request): JsonResponse
    {
        $data = $request->validated();
        $user = Auth::user();
        return response()->json(['detail' => $user], 200);

    }

    public function update(UserUpdateRequest $request): UserResource
    {
        $data = $request->validated();
        $user = Auth::user();

        if (isset($data['username'])) {
            $user->name = $data['username'];
        }


        if (isset($data['email'])) {
            $user->name = $data['email'];
        }


        if (isset($data['phone'])) {
            $user->name = $data['phone'];
        }


        if (isset($data['password'])) {
            $user->name = $data['password'];
        }

        $user->save();

        return new UserResource($user);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = Auth::user();
        $user->token = null;
        $user->save();

        return response()->json([
            'data' => true
        ])->setStatusCode(200);
    }
}
