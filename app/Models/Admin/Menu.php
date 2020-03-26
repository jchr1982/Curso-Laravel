<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Tabla a la que va hacer alucion el modelo 'Menu'
    protected $table = "menu";

    // atributos a tener en cuenta al trabajar con eloquent:

    // fillable = identifica los campos que de manera masiva
    // laravel va permitir introducir desde una vista
    protected $fillable = ['nombre', 'url', 'icono'];

    // guarded = cuales son los campos que laravel no va
    // a permitir modificarlos
    protected $guarded = ['id'];

}
