<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetail;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\MasyarakatResource;
use App\Http\Resources\UserResource;
use App\Models\Masyarakat;
use App\Models\User;
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

        if (User::where('email', $data['email'])->count() == 1 || user::where('phone', $data['phone'])->count() == 1) {
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
            'password' => $data['password'],
        ]);
        $user->password = Hash::make($data['password']);
        $user->assignRole('masyarakat');
        $user->save();

        if ($data['role'] == 'masyarakat') {

            $masyarakat = Masyarakat::create([
                'jenis_kelamin' => $data['jenis_kelamin'],
                'nik' => $data['nik'],
                'nkk' => $data['nkk'],
                'user_id' => $user->id,
            ]);

            $masyarakat->save();

        }else
        {
            
        }



        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function check(UserRegisterRequest $request): JsonResponse
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

    public function login(UserLoginRequest $request): UserResource
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

        return new UserResource($user);
    }

    public function get(Request $request): UserResource
    {
        $user = Auth::user();
        return new UserResource($user);
    }

    public function detail(UserDetail $request): MasyarakatResource
    {
        $data = $request->validated();
        if ($data['role'] == 'masyarakat') {
            $masyarakat = Masyarakat::where($data['id']);
            return new MasyarakatResource($masyarakat);
        } else {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => "Email or phone number or password is incorrect"
                ]
            ], 400));
        }

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
