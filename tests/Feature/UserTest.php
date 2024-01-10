<?php

namespace Tests\Feature;

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
            'name' => 'test',
            'password' => '12345'
        ])->assertStatus(201)
            ->assertJson([
                'data' => [
                    'email' => 'test@email.com',
                    'phone' => '085398298129',
                    'name' => 'test',
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post('/api/users', [
            'email' => '',
            'phone' => '',
            'name' => '',
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
                    "name" => [
                        "The name field is required."
                    ]
                ]
            ]);

    }

    public function testAlreadyExist()
    {
        $this->testRegisterSuccess();
        $this->post('/api/users', [
            'email' => 'test@email.com',
            'phone' => '085398298129',
            'name' => 'test',
            'password' => '12345'
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [
                    "message" => "Email Atau Nomor Telepon Sudah Digunakan"
                ]
            ]);

    }
}
