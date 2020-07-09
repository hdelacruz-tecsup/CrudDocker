<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
    public function index()
        {
                $contactos=Contacto::all();
                return view('Contacto.index' , compact('contactos'));

        }

    public function create()
    {
        return view('Contacto.create' );
    }

    public function store(Request $request)
    {

        if($request->hasFile('imgperfil')){
            $file = $request->file('imgperfil');
            //$name = time().$file->getClientOriginalName();
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        $contacto = new Contacto();
        $contacto->nombres = $request->input('nombres');
        $contacto->apellidos = $request->input('apellidos');
        $contacto->email = $request->input('email');
        $contacto->nfecha = $request->input('nfecha');
        $contacto->imgperfil = $name;

        $this->validate($request,[ 'nombres' =>'required' ,
        'apellidos' =>'required' , 'email' =>'required', 'nfecha' =>'required' ]);
        $contacto->save();
        //Contacto::create($request->all());
        //Contacto::create(array_merge($request->all()));
        return redirect()->route('contacto.index')->with('success','creado satisfactoriamente');


    }

    public function show($id)
    {
        $contactos=Contacto::find($id);
        return  view('Contacto.show',compact('contactos'));
    }

    public function edit($id)
    {
        $contacto=Contacto::find($id);
        return view('Contacto.edit',compact('contacto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombres'=>'required', 'apellidos'=>'required', 'email'=>'required', 'nfecha' =>'required']);

        Contacto::find($id)->update($request->all());
        return redirect()->route('contacto.index')->with('success','Registro actualizado satisfactoriamente');

    }

    public function destroy($id)
    {
        Contacto::find($id)->delete();
        return redirect()->route('contacto.index')->with('success','Registro eliminado satisfactoriamente');
    }
}