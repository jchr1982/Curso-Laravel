<!--    Aqui utilizo las directivas de BLADE if - endif
        que luego se convertiran en codigo php.

        Estas directivas permiten escribir un codigo
        mas limpio, dado que no es necesario
        colocar las etiquetas <?php  ?> para indicar
        que es codigo ejecutable php.

        $errors es una variable de laravel que se compila
        con la vista cada vez que hay un error.
-->

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>El formulario contiene errores</h4>
    
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
