<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {

        $response = $this->post('/register', [
            'name' => 'Test User',
            'apellidos' => 'apellido_user',
            'telefono' => 6546216,
            'email' => 'test@example.com',
            'estado' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

    
    }
    public function test_nombre_requerido()
    {

        $response = $this->post('/register', [
            'name' => '',
            'apellidos' => 'apellido_user',
            'telefono' => 6546216,
            'email' => 'test@example.com',
            'estado' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('name');
        $this->assertGuest();
        // $response->assertRedirect(RouteServiceProvider::HOME);

    }
}
