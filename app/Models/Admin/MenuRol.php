<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    // Tabla a la que va hacer alucion el modelo 'MenuRol'
    protected $table = "menu_rol";

    // si el modelo no usa la fecha de creacion y modificacion
    // como campos en la tabla, le coloco false, es decir
    // esta tabla no posee campos timestands
    public $timestands = false;

}
