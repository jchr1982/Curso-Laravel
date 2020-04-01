<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function index() 
    {
        return view('seguridad.index');
    
    }

    /*
    Esta es otro metodo que es llamado por laravel despues
    de que un usuario se ha autenticado.
    En este caso se sobreescribe para que revise los roles 
    que tiene asignados y cuales de ellos estan activos 
    verificando su estado.
    Si el rol esta activo se establece una sesion, si no
    se hace logout y se invalida la sesion.
    */
    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('estado', 1)->get();
        if ($roles->isNotEmpty()) {
            $user->setSession($roles->toArray());
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
        }
    }


    /*
    Este metodo ya existe en trait AuthenticatesUsers
    y se esta sobreescribiendo para indicarle a laravel
    que no es un email sino que el nombre del usuario
    es el que se va a utilizar para autenticarse.
    */
    public function username()
    {
        return 'usuario';
    }
   
}
