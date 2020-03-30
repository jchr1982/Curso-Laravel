<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Rol;

class MenuRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        // dd($rols);

        //
        $menus = Menu::getMenu();
        
        /* 
        Traer los menus con sus respectivos roles, en caso de
        tener roles. pluck lo que indica que le pase tambien
        los roles con el id del menu.
        */
        $menusRols = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        
        /* 
        y pasamos esos datos a la vista con los siguiente datos:
        roles, menus y menusroles para que sean tratados
        por la vista.
        */
        return view('admin.menu-rol.index', compact('rols', 'menus', 'menusRols'));

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }

    }
    
}
