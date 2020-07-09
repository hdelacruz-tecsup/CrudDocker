@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Nombre:</p>
                            <p><strong>{{ Auth::user()->name }}</strong></p>
                            <hr>
                            <p>Correo Electrónico:</p>
                            <p><strong>{{ Auth::user()->email }}</strong></p>
                        </div>
                        <div class="col-md-5" style="text-align: center;">
                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-responsive img-thumbnail"><br>
                            <a href="./contacto" type="button">Ver contactos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Estado</div>
 
                <div class="panel-body">
                    Tú estas logeadoaaaaaa asas asasas asasasa asasasa asasasa a s asa asa sasas!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection