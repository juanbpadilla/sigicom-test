<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos',
        'telefono',
        'email',
        'estado',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRoles(array $roles)
    {
        foreach ($roles as $role)
        {
            foreach ($this->roles as $userRole)
            {
                if ($userRole->nombre === $role)
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }
    public function isClient()
    {
        return $this->hasRoles(['user']);
    }

    // funcion que devuelve el rol mas alto de un usuario
    public function verRol()
    {
        $roles_ = Role::get();
        $aux = count($roles_) + 1;
        
        foreach ($this->roles as $userRole)
        {
            if ($userRole->id <= $aux)
            {
                $aux = $userRole->id;
                $nombre_rol = $userRole->display_name;
            }
            
        }
        return $nombre_rol;
    }

    public function check($id)
    {
        return $this->roles->pluck('id')->contains($id) ? 'checked' : '';
    }

    public function checkStateMode($id)
    {
        // dd($id);
        if($id)
        {
            return 'checked';
        }
        return '';
    }
}
