<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        Role::truncate();
        DB::table('role_user')->truncate();
        
        $user = User::create([
            'name'    =>  'Juan',
            'apellidos' =>  'Padila',
            'telefono'  =>  77897089,
            'email'     =>  'juan@email.com',
            'estado'    =>  true,
            'password'  =>  bcrypt('juan123456')
        ]);

        $role = Role::create([
            'nombre' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);

        $role = Role::create([
            'nombre' => 'caja',
            'display_name' => 'Cajero',
            'description' => 'Cajero del sitio'
        ]);

        $role = Role::create([
            'nombre' => 'user',
            'display_name' => 'Usuario',
            'description' => 'Usuario'
        ]);

        for($i = 1; $i <= 10; $i++)
        {
            $user = User::create([
                'name'    =>  'Usuario_'.$i,
                'apellidos' =>  'apellido_'.$i,
                'telefono'  =>  777770 + $i,
                'email'     =>  'user'.$i.'@email.com',
                'estado'    =>  true,
                'password'  =>  bcrypt(123456)
            ]);

            $user->roles()->save($role);
        }

        $role = Role::create([
            'nombre' => 'venta',
            'display_name' => 'Vendedor',
            'description' => 'Vendedor'
        ]);

    }
}
