<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    // el modelo esta asociado con la tabla usuario
    protected $table = 'usuario';
    // campos que pertenecen a la tabla usuario
    protected $fillable = ['usuario', 'nombre', 'password'];
    protected $guarded = ['id'];


    /* 
    Devuelve los roles que tiene el usuario mediante
    la tabla puente usuario_rol
    */
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    /* 
    Establece la sesion, colocando dentro
    de la variable de sesion: 
    rol_id, rol_nombre, usuario, usuario_id y
    nombre_usuario.
    */
    public function setSession($roles)
    {
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                    'usuario' => $this->usuario,
                    'usuario_id' => $this->id,
                    'nombre_usuario' => $this->nombre
                ]
            );
        }
    }
}
