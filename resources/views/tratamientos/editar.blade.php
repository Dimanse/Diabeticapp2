@extends('layout.app')

@section('titulo')
    Editar tratamiento
@endsection

@section('contenido')
<div class=" print:hidden">
    <h2 class="text-indigo-500 text-center md:text-lg mt-8 mb-8 font-extrabold uppercase"> Actualiza tus tratamientos</h2>

    <section class="md:w-5/12 border border-gray-200 shadow-xl mx-auto mb-8">
        <form method="POST" action="{{ route('tratamientos.update', $tratamiento) }}" novalidate class="p-5 bg-white text-sm">
            @method('PUT')
            @csrf

            @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
            @endif

            <div class="my-5 flex justify-end">
                <div class="flex gap-3 items-center justify-between">
                    <a href="{{ route('tratamientos.create', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                        Volver</a>
                </div>
            </div>
            <div class="">
                <div class="mb-5">
                    <label for="hora" class="mb-2 block uppercase text-gray-500 font-bold">
                        Hora
                    </label>
                    <input
                        id="hora"
                        name="hora"
                        type="time"
                        class="border p-3 w-full rounded-lg @error('hora') border-red-500 @enderror"
                        value="{{ old('hora', $tratamiento->hora) }}"
                    />
                    @error('hora')
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
                            placeholder="Ej.: media hora antes del desayuno"
                            class="border p-3 w-full rounded-lg @error('comentario_hora') border-red-500 @enderror"
                            value="{{ old('comentario_hora', $tratamiento->comentario_hora)}}"
                        />
                        @error('comentario_hora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                    <label for="medicamento" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre del tratamiento:
                    </label>
                    <input
                        id="medicamento"
                        name="medicamento"
                        type="text"
                        placeholder="Escribe el nombre del medicamento"
                        class="border p-3 w-full rounded-lg @error('medicamento') border-red-500 @enderror"
                        value="{{ old('medicamento', $tratamiento->medicamento)}}"
                    />
                    @error('medicamento')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="gramos" class="mb-2 block uppercase text-gray-500 font-bold">
                        Gramos del medicamento:
                    </label>
                    <input
                        id="gramos"
                        name="gramos"
                        type="text"
                        placeholder="Ej.: 500 mg, 1 gr"
                        class="border p-3 w-full rounded-lg @error('gramos') border-red-500 @enderror"
                        value="{{ old('gramos', $tratamiento->gramos)}}"
                    />
                    @error('gramos')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="cantidad" class="mb-2 block uppercase text-gray-500 font-bold">
                        Cantidad recetada:
                    </label>
                    <input
                        id="cantidad"
                        name="cantidad"
                        type="text"
                        placeholder="Ej.: 2 cápsulas, 3 gotas..."
                        class="border p-3 w-full rounded-lg @error('cantidad') border-red-500 @enderror"
                        value="{{ old('cantidad', $tratamiento->cantidad)}}"
                    />
                    @error('cantidad')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="enfermedad" class="mb-2 block uppercase text-gray-500 font-bold">
                        Para que es recetado:
                    </label>
                    <input
                        id="enfermedad"
                        name="enfermedad"
                        type="text"
                        placeholder="Ej.: para la presión, para la diabetes..."
                        class="border p-3 w-full rounded-lg @error('enfermedad') border-red-500 @enderror"
                        value="{{ old('enfermedad', $tratamiento->enfermedad)}}"
                    />
                    @error('enfermedad')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
                {{-- <div class="mb-5">
                    <label for="observaciones" class="mb-2 block uppercase text-gray-500 font-bold">
                        Observaciones
                    </label>
                    <input
                        id="observaciones"
                        name="observaciones"
                        type="text"
                        placeholder="Ej.: tratamiento para 15 días"
                        class="border p-3 w-full rounded-lg @error('observaciones') border-red-500 @enderror"
                        value="{{ old('observaciones')}}"
                    />
                    @error('observaciones')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
            </div> --}}



                <input
                        type="submit"
                        value="Guardar Cambios"
                        class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    />

        </form>

    </section>
</div>
@endsection
