<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_successful_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/iniciarsesion', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    public function test_failed_login_with_incorrect_email()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => '20200767@uthh.edu.mx',
            'password' => '12345678',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_failed_login_with_incorrect_password()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'invalid_password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
