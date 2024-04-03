@extends('layout.app')

@section('titulo')
    Editar perfil
@endsection

@section('contenido')

<h2 class="text-indigo-500 text-center text-2xl my-16 font-extrabold uppercase">Edita tu perfil</h2>

<section class=" md:w-5/12 border border-gray-200 shadow-xl mx-auto mb-5">
    <form method="POST" action="{{ route('perfil.update', $usuario) }}" novalidate class="p-5 bg-white" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="my-5 flex justify-end">
            <div class="flex gap-3 items-center justify-between">
                <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2 ">


                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>

                    Volver</a>
            </div>
        </div>

        @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
        @endif

        <fieldset class="border border-blue-500 p-3 mb-5 w-full">

            <legend class=" text-blue-500 font-bold uppercase">Información del paciente</legend>


                <div class="my-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre del paciente
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name', $usuario->name) }}"
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="apellidos" class="mb-2 block uppercase text-gray-500 font-bold">
                        Apellidos del paciente
                    </label>
                    <input
                        id="apellidos"
                        name="apellidos"
                        type="text"
                        placeholder="Tus apellidos"
                        class="border p-3 w-full rounded-lg @error('apellidos') border-red-500 @enderror"
                        value="{{ old('apellidos', $usuario->apellidos) }}"
                    />
                    @error('apellidos')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="direccion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Dirección del paciente
                    </label>
                    <input
                        id="direccion"
                        name="direccion"
                        type="text"
                        placeholder="Dirección del domicilio del paciente"
                        class="border p-3 w-full rounded-lg @error('direccion') border-red-500 @enderror"
                        value="{{ old('direccion', $usuario->direccion) }}"
                    />
                    @error('direccion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Foto de perfil
                    </label>
                    <input
                        type="file"
                        class=""
                        id="imagen"
                        name="imagen"
                        accept=".jpg, .jpeg, .png"
                        value="  "

                    >
                     @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

              @if (isset($usuario->imagen_actual))
                <p class="mb-2 block uppercase text-gray-500 font-bold">Imagen Actual</p>
                <div class="max-w-60">
                    <img src="{{ asset('perfiles') . '/' . $usuario->imagen_actual }}" alt="imagen del paciente {{$usuario->apellidos}}" class=" w-full border-8 border-white rounded-lg mb-2 md:mb-0">
                </div>

              @endif




                <div class="mb-5">
                    <label for="fecha" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha de nacimiento
                    </label>
                    <input
                        id="fecha"
                        name="fecha"
                        type="date"
                        class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror"
                        value="{{ old('fecha', $usuario->fecha) }}"
                    />
                    @error('fecha')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="estatura" class="mb-2 block uppercase text-gray-500 font-bold">
                        Estatura
                    </label>
                    <input
                        id="estatura"
                        name="estatura"
                        type="number"
                        placeholder="Estatura en centímetros"
                        class="border p-3 w-full rounded-lg @error('estatura') border-red-500 @enderror"
                        value="{{ old('estatura', $usuario->estatura) }}"
                    />
                    @error('estatura')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="peso" class="mb-2 block uppercase text-gray-500 font-bold">
                        Peso
                    </label>
                    <input
                        id="peso"
                        name="peso"
                        type="number"
                        placeholder="Peso en kilogramos"
                        class="border p-3 w-full rounded-lg @error('peso') border-red-500 @enderror"
                        value="{{ old('peso', $usuario->peso) }}"
                    />
                    @error('peso')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>


        </fieldset>


        <fieldset class="border border-indigo-500 p-3 mb-5 w-full">
            <legend class=" text-indigo-500 font-bold uppercase">Información Médica</legend>

            <div class="my-5">
                <label for="doctor" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre del doctor del paciente
                </label>
                <input
                    id="doctor"
                    name="doctor"
                    type="text"
                    placeholder="Ej. Dr. Sanchez"
                    class="border p-3 w-full rounded-lg @error('doctor') border-red-500 @enderror"
                    value="{{ old('doctor', $usuario->doctor) }}"
                />
                @error('doctor')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="hospital" class="mb-2 block uppercase text-gray-500 font-bold">
                    Centro de salud
                </label>
                <input
                    id="hospital"
                    name="hospital"
                    type="text"
                    placeholder="Ej. Hospital Marcial Fallas"
                    class="border p-3 w-full rounded-lg @error('hospital') border-red-500 @enderror"
                    value="{{ old('hospital', $usuario->hospital) }}"
                />
                @error('hospital')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>


            <div class="mb-5">
                <label for="tipos" class="mb-2 block uppercase text-gray-500 font-bold">
                    Tipo de diabetes
                </label>
                <input
                    id="tipos"
                    name="tipos"
                    type="text"
                    placeholder="Diabetes tipo 1 o Diabetes tipo 2"
                    class="border p-3 w-full rounded-lg @error('tipos') border-red-500 @enderror"
                    value="{{ old('tipos', $usuario->tipos) }}"
                />
                @error('tipos')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
                <label  class="mb-2 block uppercase text-gray-500 font-bold">
                    ¿Se inyecta insulina?
                </label>

                <div class="flex items-center gap-5 mb-5" id="inyecta">
                    <div>
                        <label for="si" class="uppercase text-gray-500 font-bold md:w-3/12">
                            Si
                        </label>
                        <input

                            type="radio"
                            id="si"
                            name="inyecta"

                            value="Si"

                            {{$usuario->inyecta === 'Si' ? 'checked' : ''}}




                        />
                    </div>

                    <div >
                        <label for="no" class="uppercase text-gray-500 font-bold md:w-3/12">
                            No
                        </label>
                        <input

                            type="radio"
                            id="no"
                            name="inyecta"

                            value="No"

                            {{$usuario->inyecta === 'No' ? 'checked' : ''}}



                        />
                    </div>
                </div>

            <div id="insulinoDependiente" class="hidden">
                <div class="mb-5" ">
                    <label for="insulina" class="mb-2 block uppercase text-gray-500 font-bold">
                        Tipos de insulina que se inyecta
                    </label>
                    <div class="md:flex md:items-center gap-5 mb-5" id="tipos">
                        <div>
                            <label for="tipo" class="uppercase text-gray-500 font-bold md:w-3/12">
                                Solo un tipo
                            </label>
                            <input

                                type="radio"
                                id="uno"
                                name="tipo"

                                value="1"

                                {{$usuario->tipo === '1' ? 'checked' : ''}}


                            />
                        </div>

                        <div >
                            <label for="tipo" class="uppercase text-gray-500 font-bold md:w-3/12">
                                Dos tipos diferentes
                            </label>
                            <input

                                type="radio"
                                id="dos"
                                name="tipo"

                                value="2"

                                {{$usuario->tipo === '2' ? 'checked' : ''}}


                            />
                        </div>

                    </div>

                    {{-- @error('insulina')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror --}}
                </div>


                <div id="insulinas" class="border-2 border-blue-500 p-3">
                    <div class="mb-5">
                        <label class="uppercase text-gray-500 font-bold ">
                            Insulina y cantidad a inyectar
                        </label>
                    </div>
                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Acción rápida
                        </label>
                        <input

                            type="radio"
                            id="1"
                            name="insulina"

                            value="Acción rápida"

                            {{$usuario->insulina === 'Acción rápida' ? 'checked' : ''}}


                        />
                        <input
                        id="1"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex  text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Inhalada, acción rápida
                        </label>
                        <input

                            type="radio"
                            id="2"
                            name="insulina"

                            value="Inhalada, acción rápida"

                            {{$usuario->insulina === 'Inhalada, acción rápida' ? 'checked' : ''}}


                        />
                        <input
                        id="2"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md: ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Acción regular o corta
                        </label>
                        <input

                            type="radio"
                            id="3"
                            name="insulina"

                            value="Acción regular o corta"

                            {{$usuario->insulina === 'Acción regular o corta' ? 'checked' : ''}}


                        />
                        <input
                        id="3"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Acción intermedia
                        </label>
                        <input

                            type="radio"
                            id="4"
                            name="insulina"

                            value="Acción intermedia"

                            {{$usuario->insulina === 'Acción intermedia' ? 'checked' : ''}}


                        />
                        <input
                        id="4"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Acción prolongada
                        </label>
                        <input

                            type="radio"
                            id="5"
                            name="insulina"

                            value="Acción prolongada"

                            {{$usuario->insulina === 'Acción prolongada' ? 'checked' : ''}}


                        />
                        <input
                        id="5"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md: ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Acción ultraprolongada
                        </label>
                        <input

                            type="radio"
                            id="6"
                            name="insulina"

                            value="Acción ultraprolongada"

                            {{$usuario->insulina === 'Acción ultraprolongada' ? 'checked' : ''}}


                        />
                        <input
                        id="6"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>

                    <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5">
                        <label for="insulina" class="uppercase text-gray-500 font-bold md:w-4/12">
                            Premezclada
                        </label>
                        <input

                            type="radio"
                            id="7"
                            name="insulina"

                            value="Premezclada"

                            {{$usuario->insulina === 'premezclada' ? 'checked' : ''}}


                        />
                        <input
                        id="7"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $usuario->cantidad ) }}"
                        />



                    </div>
                </div>
            </div>




            <div id="insulinas2" class="border-2 border-green-500 p-3 my-5 hidden">
                <div class="mb-5">
                    <label class="uppercase text-gray-500 font-bold ">
                        Insulina y cantidad a inyectar
                    </label>
                </div>
                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Acción rápida
                    </label>
                    <input

                        type="radio"
                        id="1"
                        name="insulina2"

                        value="Acción rápida"

                        {{$usuario->insulina2 === 'Acción rápida' ? 'checked' : ''}}


                    />
                    <input
                    id="1"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex  text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Inhalada, acción rápida
                    </label>
                    <input

                        type="radio"
                        id="2"
                        name="insulina2"

                        value="Inhalada, acción rápida"

                        {{$usuario->insulina2 === 'Inhalada, acción rápida' ? 'checked' : ''}}


                    />
                    <input
                    id="2"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Acción regular o corta
                    </label>
                    <input

                        type="radio"
                        id="3"
                        name="insulina2"

                        value="Acción regular o corta"

                        {{$usuario->insulina2 === 'Acción regular o corta' ? 'checked' : ''}}


                    />
                    <input
                    id="3"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Acción intermedia
                    </label>
                    <input

                        type="radio"
                        id="4"
                        name="insulina2"

                        value="Acción intermedia"

                        {{$usuario->insulina2 === 'Acción intermedia' ? 'checked' : ''}}


                    />
                    <input
                    id="4"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Acción prolongada
                    </label>
                    <input

                        type="radio"
                        id="5"
                        name="insulina2"

                        value="Acción prolongada"

                        {{$usuario->insulina2 === 'Acción prolongada' ? 'checked' : ''}}


                    />
                    <input
                    id="5"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Acción ultraprolongada
                    </label>
                    <input

                        type="radio"
                        id="6"
                        name="insulina2"

                        value="Acción ultraprolongada"

                        {{$usuario->insulina2 === 'Acción ultraprolongada' ? 'checked' : ''}}


                    />
                    <input
                    id="6"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>

                <div class=" space-y-5 md:space-y-0 md:flex text-sm md:text-base md:items-center mb-5 insulina2">
                    <label for="insulina2" class="uppercase text-gray-500 font-bold md:w-4/12">
                        Premezclada
                    </label>
                    <input

                        type="radio"
                        id="7"
                        name="insulina2"

                        value="Premezclada"

                        {{$usuario->insulina2 === 'premezclada' ? 'checked' : ''}}


                    />
                    <input
                    id="7"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{old('cantidad2', $usuario->cantidad2 )}}"
                    />



                </div>
            </div>

            <div class="my-5">
                <label  class="mb-2 block uppercase text-gray-500 font-bold">
                    Tratamiento con metformina
                </label>

                <div class="flex items-center gap-5 mb-5" id="metformina">
                    <div>
                        <label for="si" class="uppercase text-gray-500 font-bold md:w-3/12">
                            Si
                        </label>
                        <input

                            type="radio"
                            id="si"
                            name="metformina"

                            value="Si"

                            {{$usuario->metformina === 'Si' ? 'checked' : ''}}


                        />
                    </div>

                    <div >
                        <label for="no" class="uppercase text-gray-500 font-bold md:w-3/12">
                            No
                        </label>
                        <input

                            type="radio"
                            id="no"
                            name="metformina"

                            value="No"

                            {{$usuario->metformina === 'No' ? 'checked' : ''}}


                        />
                    </div>

                </div>
                <div id="dosis" class="hidden">
                    <label for="no" class="uppercase text-gray-500 font-bold md:w-3/12">
                        Dosis recetada
                    </label>
                    <input
                        id="dosis"
                        name="dosis"
                        type="text"
                        placeholder="Ej: 20 mg en el desayuno, 1 gr en el almuerzo"

                        class="border p-3 w-full rounded-lg @error('dosis') border-red-500 @enderror"
                        value="{{ old('dosis', $usuario->metformina === 'Si' ? $usuario->dosis : '') }}"
                    />
                </div>


            </div>



        </fieldset>













        <input
            type="submit"
            value="Guardar Cambios"
            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />



    </form>

</section>

@endsection
