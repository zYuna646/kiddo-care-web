<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('/api/users', [
            'email' => 'test@email.com',
            'phone' => '085398298129',
            'username' => 'test',
            'password' => '12345'
        ])->assertStatus(201)
            ->assertJson([
                'data' => [
                    'email' => 'test@email.com',
                    'phone' => '085398298129',
                    'username' => 'test',
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post('/api/users', [
            'email' => '',
            'phone' => '',
            'username' => '',
            'password' => ''
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [
                    "email" => [
                        "The email field is required."
                    ],
                    "password" => [
                        "The password field is required."
                    ],
                    "phone" => [
                        "The phone field is required."
                    ],
                    "username" => [
                        "The username field is required."
                    ]
                ]
            ]);

    }

    public function testRegisterAlreadyExist()
    {
        $this->testRegisterSuccess();
        $this->post('/api/users', [
            'email' => 'test@email.com',
            'phone' => '085398298129',
            'username' => 'test',
            'password' => '12345'
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [
                    "message" => "Email Atau Nomor Telepon Sudah Digunakan"
                ]
            ]);

    }

    public function testLoginSuccesssEmail()
    {
        $this->seed([UserSeeder::class]);
        $this->post('/api/users/login', [
            'username' => 'test@email.com',
            'password' => '12345'
        ])->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => 'test@email.com',
                    'phone' => '085398298129',
                    'username' => 'test',
                ]
            ]);
        $user = User::where('email', 'test@email.com')->first();
        self::assertNotNull($user->token);

    }

    public function testLoginSuccesssPhone()
    {
        $this->seed([UserSeeder::class]);
        $this->post('/api/users/login', [
            'username' => '085398298129',
            'password' => '12345'
        ])->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => 'test@email.com',
                    'phone' => '085398298129',
                    'username' => 'test',
                ]
            ]);
        $user = User::where('phone', '085398298129')->first();
        self::assertNotNull($user->token);

    }

    public function testLoginFailed()
    {
        $this->seed([UserSeeder::class]);
        $this->post('/api/users/login', [
            'username' => '085398298129',
            'password' => '1234556'
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "message" => "Email or phone number or password is incorrect"
                ]
            ]);
    }

    public function testGetSuccess()
    {
        $this->seed([UserSeeder::class]);
        $this->get('/api/users/current', [
            'Authorization' => 'token',
        ])->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => 'test@email.com',
                    'phone' => '085398298129',
                    'username' => 'test',
                ]
            ]);

    }

    public function testGetUnauthorized()
    {
        $this->seed([UserSeeder::class]);
        $this->get('/api/users/current')->assertStatus(401)
            ->assertJson([
                "errors" => [
                    "message" => "unauthorized"
                ]
            ]);
    }

    public function testGetInvalidToken()
    {
        $this->seed([UserSeeder::class]);
        $this->get('/api/users/current', [
            'Authorization' => 'salah',
        ])->assertStatus(401)
            ->assertJson([
                "errors" => [
                    "message" => "unauthorized"
                ]
            ]);
    }
}
