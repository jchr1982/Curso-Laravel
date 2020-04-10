<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    // Tabla a la que va hacer alucion 'permiso'
    protected $table = "permiso";
    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];
    
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_rol', 'permiso_id', 'rol_id');
    }

}
