<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    //
    public function create()
    {
        $usuario = User::find(auth()->user()->id);


        // dd($usuario);
        return view('registros.create',[
            'usuario' => $usuario,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'glucemia' => 'required',
        ]);

        Registro::create([

                  'fecha' => $request->fecha,
                  'hora' => $request->hora,
                  'momento' => $request->momento ?? '',
                  'comentario_hora' => $request->comentario_hora ?? ' ',
                  'glucemia' => $request->glucemia,
                  'observaciones' => $request->observaciones ?? '',
                  'user_id' => auth()->user()->id,
              ]);



              return redirect()->route('perfil.show', auth()->user()->apellidos);
    }

    public function edit(Registro $registro)
    {
        $usuario = User::find(auth()->user()->id);
        $registro = Registro::find($registro->id);




        return view('registros.editar', [
            'usuario' => $usuario,
            'registro' => $registro,
        ]);
    }


    public function update(Request $request, Registro $registro)
    {

        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'glucemia' => 'required',
        ]);

        $registro->fecha = $request->fecha;
        $registro->hora = $request->hora;
        $registro->momento = $request->momento ?? ' ';
        $registro->comentario_hora = $request->comentario_hora ?? ' ';
        $registro->glucemia = $request->glucemia;
        $registro->observaciones = $request->observaciones ?? ' ';
        $registro->save();

        return redirect()->route('perfil.show', auth()->user()->apellidos);

        // dd($registro);


    }
        public function destroy(Registro $registro)
        {
        //  dd($registro->id);
             if ($registro->user_id === auth()->user()->id){
                 $registro->delete();
                 return redirect()->route('perfil.show', auth()->user()->apellidos);
             }
        }


}
