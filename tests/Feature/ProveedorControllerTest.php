<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProveedorControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_usuario_puede_registrar_proveedor()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $role = Role::create([
            'nombre' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);


        $user->roles()->save($role);

        $this->actingAs($user);

        $this->post(route('proveedores.store'), [
            'nombre' => 'Juan',
            'apellido' => fake()->lastName(),
            'direccion' => fake()->paragraph(),
            'tekefono' => fake()->phoneNumber(),
            'correo' => fake()->unique()->safeEmail(),
            'password' => 123456
        ]);



        $this->assertDatabaseHas('proveedors', [
            'nombre_proveedor' => 'Juan'
        ]);
    }
}
