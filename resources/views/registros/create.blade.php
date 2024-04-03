@extends('layout.app')

@section('titulo')
    Registra tu glucemia
@endsection

@section('contenido')
<h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-8 mb-16 font-extrabold uppercase"> Registra tus gluicemias</h2>

<section class="w-10/12 md:w-5/12 border border-gray-200 shadow-xl mx-auto mb-8">
    <form method="POST" action="{{ route('registros.store', $usuario) }}" novalidate class="p-5 bg-white">
        @csrf

        @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
        @endif

        <div class="my-5 flex justify-end">
            <div class="flex gap-3 items-center justify-between">
                <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                    Volver</a>
            </div>
        </div>


        <div class="mb-5">
            <label for="fecha" class="mb-2 block uppercase text-gray-500 font-bold">
                Fecha:
            </label>
            <input
                id="fecha"
                name="fecha"
                type="date"
                placeholder="Fecha de la medición"
                class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror"
                value="{{ old('fecha') }}"
            />
            @error('fecha')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="Hora" class="mb-2 block uppercase text-gray-500 font-bold">
                Hora
            </label>
            <input
                id="hora"
                name="hora"
                type="time"
                placeholder="Hora de la medición"
                class="border p-3 w-full rounded-lg @error('hora') border-red-500 @enderror"
                value="{{ old('hora') }}"
            />
            @error('hora')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>


            <div>
                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="levantarse" class="uppercase text-gray-500 font-bold ">
                        Al levantarse
                    </label>
                    <input
                        type="radio"
                        id="levantarse"
                        name="momento"

                        value="Al levantarse"

                    />


                </div>
                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes desayuno" class="uppercase text-gray-500 font-bold ">
                        Antes de desayunar
                    </label>
                    <input
                        type="radio"
                        id="antes desayuno"
                        name="momento"

                        value="Antes de desayunar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues desayuno" class="uppercase text-gray-500 font-bold ">
                        2 horas después de desayunar
                    </label>
                    <input
                        type="radio"
                        id="despues desayuno"
                        name="momento"

                        value="2 horas después de desayunar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes almuerzo" class="uppercase text-gray-500 font-bold ">
                        Antes de almorzar
                    </label>
                    <input
                        type="radio"
                        id="antes almuerzo"
                        name="momento"

                        value="Antes de almorzar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues almuerzo" class="uppercase text-gray-500 font-bold ">
                        2 horas después de almorzar
                    </label>
                    <input
                        type="radio"
                        id="despues almuerzo"
                        name="momento"

                        value="2 horas después de almorzar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes cenar" class="uppercase text-gray-500 font-bold ">
                        Antes de cenar
                    </label>
                    <input
                        type="radio"
                        id="antes cenar"
                        name="momento"

                        value="Antes de cenar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues cenar" class="uppercase text-gray-500 font-bold ">
                        2 horas después de cenar
                    </label>
                    <input
                        type="radio"
                        id="despues cenar"
                        name="momento"

                        value="2 horas después de cenar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="acostarse" class="uppercase text-gray-500 font-bold ">
                        Al acostarse
                    </label>
                    <input
                        type="radio"
                        id="acostarse"
                        name="momento"

                        value="Al acostarse"

                    />

                </div>
                @error('momento')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="my-5">
                <label for="comentario_hora" class="mb-2 block uppercase text-gray-500 font-bold">
                    Especificación de la hora
                </label>
                <input
                    id="comentario_hora"
                    name="comentario_hora"
                    type="text"
                    placeholder="Ej.: 2,5 horas después de desayunar"
                    class="border p-3 w-full rounded-lg @error('comentario_hora') border-red-500 @enderror"
                    value="{{ old('comentario_hora')}}"
                />
                @error('comentario_hora')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
            <label for="glucemia" class="mb-2 block uppercase text-gray-500 font-bold">
                Glucemía
            </label>
            <input
                id="glucemia"
                name="glucemia"
                type="number"
                placeholder="Escribe el resultado de tu glucemia"
                class="border p-3 w-full rounded-lg @error('glucemia') border-red-500 @enderror"
                value="{{ old('glucemia')}}"
            />
            @error('glucemia')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="observaciones" class="mb-2 block uppercase text-gray-500 font-bold">
                Observaciones
            </label>
            <input
                id="observaciones"
                name="observaciones"
                type="text"
                placeholder="Ej.: tubo un disgusto, ceno pizza, almorzo más cantidad"
                class="border p-3 w-full rounded-lg @error('observaciones') border-red-500 @enderror"
                value="{{ old('observaciones')}}"
            />
            @error('observaciones')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>





        <input
            type="submit"
            value="Registrar Glucemia"
            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />



    </form>

</section>
@endsection
