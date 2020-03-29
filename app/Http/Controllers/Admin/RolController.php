<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* 
        Va obtener todos los roles de la tabla
        rol en el modelo Rol y los va a ordenar 
        por su id.
        */
        $datas = Rol::orderBy('id')->get();

        /* 
        Luego va a retornar una vista, compact es 
        un helper que convierte esos datos de forma 
        apropiada para la vista, pasandole un string 
        con el nombre de la variable y luego esta se
        encarga en convertirla en un array.
        */
        return view('admin.rol.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
        return view('admin.rol.crear');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionRol $request)
    {
        /* 
        Esta es la forma de como Eloquent guarda
        los datos que nos lleguen de la vista en
        la tabla rol.
        Eloquent solo guarda lo que aparece especificado
        en el modelo Rol segun la variable fillable.
        */
        Rol::create($request->all());

        return redirect('admin/rol')->with('mensaje', 'Rol creado con exito');

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
        $data = Rol::findOrFail($id);
        return view('admin.rol.editar', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionRol $request, $id)
    {
        //
        Rol::findOrFail($id)->update($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            if (Rol::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

    }
}
