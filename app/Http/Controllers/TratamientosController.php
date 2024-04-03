<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TratamientosController extends Controller
{
    //
    public function create(User $usuario)
    {
        // dd(auth()->user());
        $usuario = User::find(auth()->user()->id);
        if(!$usuario){
            return redirect()->route('login');
        }
        $tratamientos = DB::table('tratamientos')
        ->where('user_id', $usuario->id)->latest()->paginate(9);

        // dd($usuario->id);
        return view('tratamientos.create', [
            'usuario' => $usuario,
            'tratamientos' => $tratamientos,
        ]);

    }

    public function store(Request $request)
    {
        if(auth()->user()->id === null){
            return redirect()->route('login');
        }

        $request->validate([

            'hora' => 'required',
            'medicamento' => 'required',
            'cantidad' => 'required',

        ]);

        Tratamiento::create([
                'user_id' => auth()->user()->id,
                'hora' => $request->hora,
                'momento' => $request->momento ?? '',
                'comentario_hora' => $request->comentario_hora ?? ' ',
                'medicamento' => $request->medicamento,
                'gramos' => $request->gramos ?? '',
                'cantidad' => $request->cantidad,
                'enfermedad' => $request->enfermedad ?? '',
                'observaciones' => $request->observaciones ?? '',
              ]);



              return redirect()->route('tratamientos.create', auth()->user()->apellidos);

    }

    public function edit(Tratamiento $tratamiento )
    {

        if(auth()->user()->id === null){
            return redirect()->route('login');
        }


        $usuario = User::find(auth()->user()->id);


         return view('tratamientos.editar', [
            'usuario' => $usuario,
             'tratamiento' => $tratamiento,
         ]);
    }

    public function update(Request $request, Tratamiento $tratamiento)
    {

        if(auth()->user()->id === null){
            return redirect()->route('login');
        }
        // dd($tratamiento);
         $request->validate([
             'hora' => 'required',
             'medicamento' => 'required',
             'cantidad' => 'required',
         ]);

         $tratamiento->hora = $request->hora;
         $tratamiento->momento = $request->momento ?? '';
         $tratamiento->comentario_hora = $request->comentario_hora ?? ' ';
         $tratamiento->medicamento = $request->medicamento;
         $tratamiento->gramos = $request->gramos ?? '';
         $tratamiento->cantidad = $request->cantidad;
         $tratamiento->enfermedad = $request->enfermedad ?? '';
         $tratamiento->observaciones = $request->observaciones ?? '';
         $tratamiento->save();

         return redirect()->route('tratamientos.create', auth()->user()->apellidos);

    }




    public function destroy(Tratamiento $tratamiento, User $usuario)
    {

        if(!$usuario){
            return redirect()->route('login');
        }

        $usuario = User::find(auth()->user()->id);
        // dd($usuario);
        if($tratamiento->user_id === auth()->user()->id){
            $tratamiento->delete();
                 return redirect()->route('tratamientos.create', auth()->user()->apellidos);
        }

    }
}
