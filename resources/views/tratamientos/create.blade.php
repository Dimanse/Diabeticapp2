@extends('layout.app')
@section('titulo')
    Tratamiento
@endsection

@section('contenido')
    <section class="hidden md:block">
        <main class=" print:w-full ">
            <section class=" bg-white " >

                <div class=" p-5 flex justify-end print:hidden">
                    <div class="flex gap-3 items-center justify-between">
                        <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                            Volver</a>
                    </div>
                </div>

                <h2 class="text-indigo-500 text-center text-base md:text-2xl  font-extrabold uppercase pt-5 mb-5 md:mb-0"> {{$usuario->name . ' ' . $usuario->apellidos}}</h2>

                <h2 class="text-indigo-500 text-center text-sm md:text-lg  font-extrabold uppercase  mb-5 md:mb-0">
                    Tratamientos
                </h2>

                @if ($tratamientos->count())
                    <div class="">

                        <div class="table w-full mx-auto print:text-xs text-sm p-2 bg-white">
                            <div class="table-header-group">
                                <div class="table-row bg-indigo-500">
                                    <div class="table-cell text-white text-center font-semibold ">Hora</div>
                                    <div class="table-cell text-white text-center font-semibold ">Cuando se toma</div>
                                    <div class="table-cell text-white text-center font-semibold">Nombre</div>
                                    <div class="table-cell text-white text-center font-semibold">Gramos</div>
                                    <div class="table-cell text-white text-center font-semibold">Cantidad</div>
                                    <div class="table-cell text-white text-center font-semibold">Recetado para</div>
                                    <div class="table-cell"></div>
                                </div>
                            </div>

                            @foreach ($tratamientos as $tratamiento)
                                <div class="table-row-group odd:bg-gray-50">
                                    <div class="table-row  ">
                                        <div class="table-cell text-center p-2 font-semibold text-xs">{{$tratamiento->hora}}</div>
                                        <div class="table-cell text-center p-2 font-semibold text-xs  ">@if (!$tratamiento->momento)
                                            {{$tratamiento->comentario_hora}}
                                        @else
                                            {{$tratamiento->momento}}
                                        @endif</div>
                                        <div class="table-cell text-center p-2 font-semibold text-xs">{{$tratamiento->medicamento}}</div>
                                        <div class="table-cell text-center p-2 font-semibold text-xs">{{$tratamiento->gramos}}</div>
                                        <div class="table-cell text-center p-2 font-semibold text-xs">{{$tratamiento->cantidad}}</div>
                                        <div class="table-cell text-center p-2 font-semibold text-xs">{{$tratamiento->enfermedad}}</div>

                                        <div class="table-cell p-2">
                                            <div class="flex gap-2 items-center print:hidden justify-center">
                                                <a href="{{ route('tratamientos.editar', $tratamiento->id ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white text-xs md:px-5 py-1 rounded font-semibold cursor-pointer">

                                                    Editar</a>

                                                <form method="POST" action="{{ route('tratamientos.destroy', $tratamiento->id) }} " class="print:hidden">
                                                    @method('DELETE')   {{-- Se le conoce como method spoofing  el navegador solo reconoce get y post el método spoofing te permite agregar delete, put, putch... --}}
                                                    @csrf

                                                        <button
                                                            type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white text-xs md:px-5 py-1 rounded font-semibold cursor-pointer">

                                                            Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-10 mb-5 w-11/12 mx-auto print:hidden">
                            {{$tratamientos->links()}}
                        </div>
                    </div>
                @else
                    <section class="w-11/12   border border-gray-200 shadow-xl mx-auto mt-10 p-3">

                        <h2 class="text-red-500 text-center text-base mt-5 mb-8 font-extrabold uppercase"> Aún no has registrado tus tratamientos</h2>

                    </section>
                @endif



            </section>
        </main>
        <div class=" print:hidden">
            <h2 class="text-indigo-500 text-center md:text-lg mt-8 mb-8 font-extrabold uppercase"> Registra tus tratamientos</h2>

            <section class=" border border-gray-200 shadow-xl mx-auto mb-8">
                <form method="POST" action="{{ route('tratamientos.store', $usuario) }}" novalidate class="p-5 bg-white text-xs">
                    @csrf

                    @if(session('mensaje'))
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
                    @endif

                    {{-- <div class="my-5 flex justify-end">
                        <div class="flex gap-3 items-center justify-between">
                            <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                                Volver</a>
                        </div>
                    </div> --}}
                    <div class="md:flex md:justify-between md:items-center">
                        <div class="mb-5 md:mb-0">
                            <label for="hora" class="mb-2 block uppercase text-gray-500 font-bold">
                                Hora
                            </label>
                            <input
                                id="hora"
                                name="hora"
                                type="time"
                                class="border p-3 w-full rounded-lg @error('hora') border-red-500 @enderror"
                                value="{{ old('hora') }}"
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
                                    value="{{ old('comentario_hora')}}"
                                />
                                @error('comentario_hora')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-5 md:mb-0">
                            <label for="medicamento" class="mb-2 block uppercase text-gray-500 font-bold">
                                Nombre del tratamiento:
                            </label>
                            <input
                                id="medicamento"
                                name="medicamento"
                                type="text"
                                placeholder="Escribe el nombre del medicamento"
                                class="border p-3 w-full rounded-lg @error('medicamento') border-red-500 @enderror"
                                value="{{ old('medicamento')}}"
                            />
                            @error('medicamento')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-5 md:mb-0">
                            <label for="gramos" class="mb-2 block uppercase text-gray-500 font-bold">
                                Gramos del medicamento:
                            </label>
                            <input
                                id="gramos"
                                name="gramos"
                                type="text"
                                placeholder="Ej.: 500 mg, 1 gr"
                                class="border p-3 w-full rounded-lg @error('gramos') border-red-500 @enderror"
                                value="{{ old('gramos')}}"
                            />
                            @error('gramos')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-5 md:mb-0">
                            <label for="cantidad" class="mb-2 block uppercase text-gray-500 font-bold">
                                Cantidad recetada:
                            </label>
                            <input
                                id="cantidad"
                                name="cantidad"
                                type="text"
                                placeholder="Ej.: 2 cápsulas, 3 gotas..."
                                class="border p-3 w-full rounded-lg @error('cantidad') border-red-500 @enderror"
                                value="{{ old('cantidad')}}"
                            />
                            @error('cantidad')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-5 md:mb-0">
                            <label for="enfermedad" class="mb-2 block uppercase text-gray-500 font-bold">
                                Para que es recetado:
                            </label>
                            <input
                                id="enfermedad"
                                name="enfermedad"
                                type="text"
                                placeholder="Ej.: para la presión, para la diabetes..."
                                class="border p-3 w-full rounded-lg @error('enfermedad') border-red-500 @enderror"
                                value="{{ old('enfermedad')}}"
                            />
                            @error('enfermedad')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>
                        {{-- <div class="mb-5 md:mb-0">
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
                        </div> --}}

                        <input
                                type="submit"
                                value="Registrar"
                                class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold  p-3 text-white rounded-lg"
                            />
                    </div>


                    {{-- <div class="md:w-3/12">
                        <input
                                type="submit"
                                value="Registrar Tratamiento"
                                class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                            />
                    </div> --}}
                </form>

            </section>
        </div>
    </section>
    <section class="md:hidden bg-white">
        <div class=" p-5 flex justify-end print:hidden">
            <div class="flex gap-3 items-center justify-between">
                <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                    </a>
            </div>
        </div>
        <h2 class="text-indigo-500 text-center text-base md:text-2xl  font-extrabold uppercase pt-5 mb-5 md:mb-0"> {{$usuario->name . ' ' . $usuario->apellidos}}</h2>

                <h2 class="text-indigo-500 text-center text-sm md:text-lg  font-extrabold uppercase  mb-5 md:mb-0">
                    Tratamientos
                </h2>
        <div class="mt-5">
            @if ($tratamientos->count())
                <section class=" grid lg:grid-cols-2  gap-4  mx-auto mt-10 p-3">

                    @foreach ($tratamientos as $tratamiento)
                    <div class=" mb-5 md:mb-0 border border-gray-300 p-3">


                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Hora: </p><span class="font-bold text-sm md:text-base" >{{$tratamiento->hora}}</span>

                        </div>

                        <div class="flex justify-between  items-start">
                            <p class="text-gray-700 text-sm md:text-lg">Momento: </p>

                            <div class="w-2/4">

                                <span class="font-bold text-xs md:text-sm" >@if (!$tratamiento->momento)
                                    {{$tratamiento->comentario_hora}}
                                @else
                                    {{$tratamiento->momento}}
                                @endif</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Gramos: </p> <span class="font-bold text-sm md:text-base" >{{ $tratamiento->gramos }}</span>

                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Medicamento: </p> <span class="font-bold text-sm md:text-base" >{{ $tratamiento->medicamento }}</span>

                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Cantidad: </p> <span class="font-bold text-sm md:text-base" >{{ $tratamiento->cantidad }}</span>

                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Para que fue recetado: </p> <span class="font-bold text-sm md:text-base" >{{ $tratamiento->enfermedad }}</span>

                        </div>

                        {{-- <div class="flex justify-between items-center">
                            <p class="text-gray-700 text-sm md:text-lg">Observaciones: </p><span class="font-bold text-sm md:text-base" >{{ $tratamiento->observaciones }}</span>
                        </div> --}}



                            <div class="mt-5 flex justify-between items-center gap-2 print:hidden">
                                <a href="{{ route('tratamientos.editar', $tratamiento->id ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-1 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                    Editar</a>

                                <form method="POST" action="{{ route('tratamientos.destroy', $tratamiento->id) }} " class="print:hidden">
                                    @method('DELETE')   {{-- Se le conoce como method spoofing  el navegador solo reconoce get y post el método spoofing te permite agregar delete, put, putch... --}}
                                    @csrf

                                        <button
                                            type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex juistify-between items-center gap-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfc" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>

                                            Eliminar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </section>
                <div class="mt-10 mb-5 w-11/12 mx-auto print:hidden md:hidden">
                    {{$tratamientos->links()}}
                </div>
            @else
                <section class="w-11/12   border border-gray-200 shadow-xl mx-auto mt-10 p-3">

                    <h2 class="text-red-500 text-center text-sm mt-5 mb-8 font-extrabold uppercase"> Aún no has registrado tus tratamientos</h2>

                </section>
            @endif
        </div>



        <section class="md:hidden border border-gray-200 shadow-xl mx-auto mb-8 bg-white">
            <h2 class="text-indigo-500 text-center md:text-lg mt-8 mb-8 font-extrabold uppercase"> Registra tus tratamientos</h2>
            <form method="POST" action="{{ route('tratamientos.store', $usuario) }}" novalidate class="p-5 bg-white text-xs">
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
                @endif

                {{-- <div class="my-5 flex justify-end">
                    <div class="flex gap-3 items-center justify-between">
                        <a href="{{ route('perfil.show', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex items-center justify-between gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfd" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z"/></svg>
                            Volver</a>
                    </div>
                </div> --}}
                <div class="md:flex md:justify-between md:items-center">
                    <div class="mb-5 md:mb-0">
                        <label for="hora" class="mb-2 block uppercase text-gray-500 font-bold">
                            Hora
                        </label>
                        <input
                            id="hora"
                            name="hora"
                            type="time"
                            class="border p-3 w-full rounded-lg @error('hora') border-red-500 @enderror"
                            value="{{ old('hora') }}"
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
                                value="{{ old('comentario_hora')}}"
                            />
                            @error('comentario_hora')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-5 md:mb-0">
                        <label for="medicamento" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nombre del tratamiento:
                        </label>
                        <input
                            id="medicamento"
                            name="medicamento"
                            type="text"
                            placeholder="Escribe el nombre del medicamento"
                            class="border p-3 w-full rounded-lg @error('medicamento') border-red-500 @enderror"
                            value="{{ old('medicamento')}}"
                        />
                        @error('medicamento')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="mb-5 md:mb-0">
                        <label for="gramos" class="mb-2 block uppercase text-gray-500 font-bold">
                            Gramos del medicamento:
                        </label>
                        <input
                            id="gramos"
                            name="gramos"
                            type="text"
                            placeholder="Ej.: 500 mg, 1 gr"
                            class="border p-3 w-full rounded-lg @error('gramos') border-red-500 @enderror"
                            value="{{ old('gramos')}}"
                        />
                        @error('gramos')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="mb-5 md:mb-0">
                        <label for="cantidad" class="mb-2 block uppercase text-gray-500 font-bold">
                            Cantidad recetada:
                        </label>
                        <input
                            id="cantidad"
                            name="cantidad"
                            type="text"
                            placeholder="Ej.: 2 cápsulas, 3 gotas..."
                            class="border p-3 w-full rounded-lg @error('cantidad') border-red-500 @enderror"
                            value="{{ old('cantidad')}}"
                        />
                        @error('cantidad')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="mb-5 md:mb-0">
                        <label for="enfermedad" class="mb-2 block uppercase text-gray-500 font-bold">
                            Para que es recetado:
                        </label>
                        <input
                            id="enfermedad"
                            name="enfermedad"
                            type="text"
                            placeholder="Ej.: para la presión, para la diabetes..."
                            class="border p-3 w-full rounded-lg @error('enfermedad') border-red-500 @enderror"
                            value="{{ old('enfermedad')}}"
                        />
                        @error('enfermedad')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                        @enderror
                    </div>
                    {{-- <div class="mb-5 md:mb-0">
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
                    </div> --}}
                </div>


                <div class="md:w-3/12">
                    <input
                            type="submit"
                            value="Registrar Tratamiento"
                            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                        />
                </div>
            </form>

        </section>

    </section>
@endsection
