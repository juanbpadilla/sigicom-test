<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Proveedor::truncate();
        // Producto::truncate();

        for($i = 1; $i <= 10; $i++)
        {
            $user = Proveedor::create([
                'nombre_proveedor'    =>  'Proveedor'.$i,
                'apellido_preveedor'  =>  'apellido_proveedor'.$i,
                'direccion_proveedor' =>  'Do mollit cupidatat eiusmod aliqua deserunt amet.',
                'telefono'  =>  778870 + $i,
                'correo'     =>  'proveedor'.$i.'@email.com',
                'password'  =>  bcrypt(123456)
            ]);
    
            Producto::create([
                'nombre_producto' => 'Producto'.$i,
                'precio_compra'   => rand(100,1000) / 3,
                'marca'           => 'Marca'.$i,
                'proveedor_id'    => $user->id,                
            ]);
        }
    }
}
