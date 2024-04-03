<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //

    public function show()
    {
        // $usuario = User::find(auth()->user()->id);
        // dd($usuario->count());

        $usuario = User::find(auth()->user()->id);
        $usuario->apellidos = str_replace("-"," ",$usuario->apellidos);
        if(auth()->user()->id === null){
            return redirect()->route('auth.register');
        }

        // dd($usuario);

        $registros = DB::table('registros')
        ->where('user_id', $usuario->id)
        ->latest('fecha')->latest('hora')->paginate(6);

        // foreach($registros as $registro){
        //     $date = $registro->created_at;
        //     $date = Carbon::parse($date); // now date is a carbon instance
        //     $elapsed = $date->diffForHumans();
        // }
        // dd($registros);


        return view('perfil.show', [
            'usuario' => $usuario,
            'registros' => $registros,
        ]);
    }

    public function edit(User $usuario)
    {
        // dd($usuario->imagen);
        $usuario = User::find(auth()->user()->id);
        $usuario->imagen_actual = $usuario->imagen;

        $usuario->apellidos = str_replace("-"," ",$usuario->apellidos);

        return view('perfil.editar', [
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, User $usuario)
    {

        $request->validate([
            'name' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'fecha' => 'required',
            'estatura' => 'required',
            'peso' => 'required',
            'tipos' => 'required',
            'inyecta' => 'required',
            'metformina' => 'required',
        ]);

        if(empty($request->imagen)){
            $request->imagen = $usuario->imagen;
        }else{
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            // dd($nombreImagen);

            $imagenServidor = Image::make($imagen)
            ->orientate();

             $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
             $imagenServidor->save($imagenPath);
             $request->imagen = $nombreImagen;
        }




            $usuario->name = $request->name;
            $usuario->apellidos = $request->apellidos;
            $usuario->direccion = $request->direccion;
            $usuario->doctor = $request->doctor;
            $usuario->hospital = $request->hospital;
            $usuario->imagen = $request->imagen ?? auth()->user()->imagen;
            $usuario->fecha = $request->fecha;
            $usuario->estatura = $request->estatura;
            $usuario->peso = $request->peso;
            $usuario->tipos = $request->tipos;
            $usuario->inyecta = $request->inyecta;
            $usuario->tipo = $request->tipo;
            $usuario->insulina = $request->insulina;
            $usuario->cantidad = $request->cantidad;
            $usuario->insulina2 = $request->insulina2;
            $usuario->cantidad2 = $request->cantidad2;
            $usuario->metformina = $request->metformina;
            $usuario->dosis = $request->dosis;
            $usuario->save();
            return redirect()->route('perfil.show', auth()->user()->apellidos);

    }
}
