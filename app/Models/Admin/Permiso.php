<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    // Tabla a la que va hacer alucion 'permiso'
    protected $table = "permiso";
    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];

}
