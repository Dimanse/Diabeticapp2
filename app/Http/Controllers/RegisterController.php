<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request->get('username'));
        // Modificar el Request
        // $request->request->add(['paciente' => Str::slug($request->paciente)]);

        // Validacion
        $request->validate([
            'name' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'imagen' => 'required',
            'fecha' => 'required',
            'estatura' => 'required',
            'peso' => 'required',
            'tipos' => 'required',
            'inyecta' => 'required',
            'metformina' => 'required',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
            // dd('Guardando usuario');

            if($request->imagen){

                $imagen = $request->file('imagen');

                $nombreImagen = Str::uuid() . "." . $imagen->extension();
                // dd($nombreImagen);

                $imagenServidor = Image::make($imagen)
                ->orientate();

                 $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
                 $imagenServidor->save($imagenPath);
                 $request->imagen = $nombreImagen;
            }

            User::create([
                'name' => $request->name,
                'apellidos' => $request->apellidos,
                'direccion' => $request->direccion,
                'doctor' => $request->doctor,
                'hospital' => $request->hospital,
                'imagen' => $request->imagen,
                'fecha' => $request->fecha,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'tipos' => $request->tipos,
                'inyecta' => $request->inyecta,
                'tipo' => $request->tipo,
                'insulina' => $request->insulina,
                'cantidad' => $request->cantidad,
                'insulina2' => $request->insulina2,
                'cantidad2' => $request->cantidad2,
                'metformina' => $request->metformina,
                'dosis' => $request->dosis,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);



            // dd($request);
            //Autenticar usuario
            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            //Redireccionar
            return redirect()->route('perfil.show', auth()->user()->apellidos);
    }


}
