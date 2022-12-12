<?php

namespace Tests\Feature;

use App\Models\Proveedor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use DatabaseMigrations;
use Tests\TestCase;

class ProductoControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_usuario_puede_registrar_productos()
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


        $proveedor = Proveedor::factory()->create();

        $this->post(route('productos.store'), [
            'nombre_producto' => 'producto1',
            'precio'   => 7.00,
            'marca'           => 'marca 1',
            'stock'           => 0,
            'proveedor_id'    => $proveedor->id
        ]);



        $this->assertDatabaseHas('productos', [
            'nombre_producto' => 'producto1'
        ]);
    }
}
