@extends('layout.app')

@section('titulo')
    Registrate
@endsection

@section('contenido')
<h2 class="text-indigo-500 text-center text-2xl my-16 font-extrabold uppercase">Crea tu propia cuenta</h2>

<section class=" md:w-5/12 border border-gray-200 shadow-xl mx-auto">
    <form method="POST" action="{{ route('register') }}" novalidate class="p-5 bg-white" enctype="multipart/form-data">
        @csrf

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
                        value="{{ old('name') }}"
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
                        value="{{ old('apellidos') }}"
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
                        value="{{ old('direccion') }}"
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
                    >
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fecha" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha de nacimiento
                    </label>
                    <input
                        id="fecha"
                        name="fecha"
                        type="date"
                        class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror"
                        value="{{ old('fecha') }}"
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
                        value="{{ old('estatura') }}"
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
                        value="{{ old('peso') }}"
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
                    value="{{ old('doctor') }}"
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
                    value="{{ old('hospital') }}"
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
                    value="{{ old('tipos') }}"
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


                        />
                        <input
                        id="1"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="2"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md: ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="3"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="4"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="5"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md: ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="6"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                        />
                        <input
                        id="7"
                        name="cantidad"
                        type="text"

                        placeholder="20 en la mañana y 20 en la noche"

                        class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 hidden @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad') }}"
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


                    />
                    <input
                    id="1"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="2"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="3"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="4"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="5"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="6"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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


                    />
                    <input
                    id="7"
                    name="cantidad2"
                    type="text"

                    placeholder="20 en la mañana y 20 en la noche"
                    id="insulina2"
                    class="md:ms-5 border p-3 w-full rounded-lg md:w-6/12 insulina2 hidden @error('cantidad2') border-red-500 @enderror"
                    value="{{ old('cantidad2') }}"
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
                        value="{{ old('dosis') }}"
                    />
                </div>


            </div>



        </fieldset>





        <fieldset class="border border-sky-500 p-3 mb-5 w-full">
            <legend class=" text-sky-500 font-bold uppercase">Información para iniciar sesión</legend>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu Email de Registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password de Registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir password
                </label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirma tu password"
                    class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                />
                @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

        </fieldset>







        <input
            type="submit"
            value="Crear cuenta"
            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />

        <div class="mt-5 flex justify-evenly items-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Inicia Sesión</a>
            <a href="{{ route('password') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Cambiar password</a>
        </div>

    </form>

</section>
@endsection
