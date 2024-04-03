@extends('layout.app')

@section('titulo')
    Perfil
@endsection

@section('contenido')
<section class="flex ">
    <aside class="bg-indigo-100 md:w-2/12 print:h-screen">
        <div class=" flex flex-col gap-1  p-1">
            <div class=" md:flex justify-around items-center mt-5 ">
                <div class="md:w-32">
                    <img src="{{$usuario->imagen ? asset('perfiles') . '/' . $usuario->imagen : asset('img/usuario.svg')}}" alt="imagen del paciente {{$usuario->apellidos}}" class=" w-full border-8 border-white rounded-lg mb-2 md:mb-0">
                </div>
                <div>
                    <a href="{{route('perfil.editar', $usuario)}}" class="print:hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></a>
                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->name}}</p>
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->apellidos}}</p>
                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{ Carbon\Carbon::parse($usuario->fecha)->format('d / m / Y') }} </p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M128 176a128 128 0 1 1 256 0 128 128 0 1 1 -256 0zM391.8 64C359.5 24.9 310.7 0 256 0S152.5 24.9 120.2 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H391.8zM296 224c0-10.6-4.1-20.2-10.9-27.4l33.6-78.3c3.5-8.1-.3-17.5-8.4-21s-17.5 .3-21 8.4L255.7 184c-22 .1-39.7 18-39.7 40c0 22.1 17.9 40 40 40s40-17.9 40-40z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->peso}} kg.</p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="w-6 h-7 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M145.6 7.7C141 2.8 134.7 0 128 0s-13 2.8-17.6 7.7l-104 112c-6.5 7-8.2 17.2-4.4 25.9S14.5 160 24 160H80V352H24c-9.5 0-18.2 5.7-22 14.4s-2.1 18.9 4.4 25.9l104 112c4.5 4.9 10.9 7.7 17.6 7.7s13-2.8 17.6-7.7l104-112c6.5-7 8.2-17.2 4.4-25.9s-12.5-14.4-22-14.4H176V160h56c9.5 0 18.2-5.7 22-14.4s2.1-18.9-4.4-25.9l-104-112z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->estatura}} cm.</p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M192 64v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H224c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H288zm64 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H352zM160 384v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H32z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->tipos}} </p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
                </div>
                <div class="md:w-2/3">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->inyecta === 'Si' ? 'Insulina' : 'No insulina'}} </p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:block md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M64 144c0-26.5 21.5-48 48-48s48 21.5 48 48V256H64V144zM0 144V368c0 61.9 50.1 112 112 112s112-50.1 112-112V189.6c1.8 19.1 8.2 38 19.8 54.8L372.3 431.7c35.5 51.7 105.3 64.3 156 28.1s63-107.5 27.5-159.2L427.3 113.3C391.8 61.5 321.9 49 271.3 85.2c-28 20-44.3 50.8-47.3 83V144c0-61.9-50.1-112-112-112S0 82.1 0 144zm296.6 64.2c-16-23.3-10-55.3 11.9-71c21.2-15.1 50.5-10.3 66 12.2l67 97.6L361.6 303l-65-94.8zM491 407.7c-.8 .6-1.6 1.1-2.4 1.6l4-2.8c-.5 .4-1 .8-1.6 1.2z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->metformina === 'Si' ? 'Metformina' : 'No Metformina'}} </p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:flex md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->direccion}}</p>

                </div>
            </div>
            <div class="mt-4 md:flex md:items-center">
                <div class="hidden md:flex md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->doctor}}</p>

                </div>
            </div>
            <div class="my-4 md:flex md:items-center">
                <div class="hidden md:flex md:w-1/3 print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 mx-auto"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(99 102 241)" d="M192 48c0-26.5 21.5-48 48-48H400c26.5 0 48 21.5 48 48V512H368V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H192V48zM48 96H160V512H48c-26.5 0-48-21.5-48-48V320H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V224H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V144c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v48H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v64H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80V464c0 26.5-21.5 48-48 48H480V96H592zM312 64c-8.8 0-16 7.2-16 16v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V152h24c8.8 0 16-7.2 16-16V120c0-8.8-7.2-16-16-16H344V80c0-8.8-7.2-16-16-16H312z"/></svg>
                </div>
                <div class="md:w-2/3 print:w-full">
                    <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">{{$usuario->hospital}}</p>

                </div>
            </div>
        </div>
    </aside>
    <section class="w-10/12 bg-white ">


        <div class="md:flex md:justify-around md:items-center mt-8">
            <h2 class="text-indigo-500 text-center text-base md:text-2xl  font-extrabold uppercase mb-5 md:mb-0"> {{$usuario->name . ' ' . $usuario->apellidos}}</h2>

            <div class="flex justify-center items-center print:hidden">
                <a href="{{ route('registros.create', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase text-sm md:text-base font-semibold ">Registra tu glucemia</a>

            </div>
            <div class="mt-5 md:mt-0 flex justify-center items-center print:hidden">
                <a href="{{ route('tratamientos.create', $usuario) }}" class="bg-sky-500 hover:bg-sky-700 text-white px-5 py-1 rounded uppercase text-sm md:text-base font-semibold ">Tratamiento médico</a>
            </div>
        </div>

        <div class="md:grid md:grid-cols-3 gap-4  mx-auto mt-5">
            <div class="mb-3 md:mb-0">
                <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">Insulina: {{$usuario->insulina}}</p>
                <p class="text-center text-xs md:text-sm  font-semibold text-gray-500">Dosis: {{$usuario->cantidad}}</p>
            </div>
            <div class="mb-3 md:mb-0">
                <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">Insulina:{{$usuario->insulina2}}</p>
                <p class="text-center text-xs md:text-sm  font-semibold text-gray-500">Dosis: {{$usuario->cantidad2}}</p>
            </div>
            <div class="mb-3 md:mb-0">
                <p class="text-center text-xs md:text-sm  font-semibold text-indigo-500">Metformina: {{$usuario->metformina}}</p>
                <p class="text-center text-xs md:text-sm  font-semibold text-gray-500">{{$usuario->metformina === 'Si' ? 'Dosis: ' . $usuario->dosis : ''}}</p>
            </div>

        </div>

        @if ($registros->count())
            <section class=" grid md:grid-cols-2 lg:grid-cols-3 gap-4  mx-auto mt-10 p-3">

            @foreach ($registros as $registro)
            <div class=" mb-5 md:mb-0 border border-gray-300 p-3">
                <div class="flex justify-between items-center">
                    <p class="text-gray-700 text-sm md:text-lg">Fecha: </p><span class="font-bold text-sm md:text-base" >{{ Carbon\Carbon::parse($registro->fecha)->format('d / m / Y') }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <p class="text-gray-700 text-sm md:text-lg">Hora: </p><span class="font-bold text-sm md:text-base" >{{$registro->hora}}</span>

                </div>

                <div class="flex justify-between  items-start">
                    <p class="text-gray-700 text-sm md:text-lg">Momento: </p>

                    <div class="w-2/4">

                        <span class="font-bold text-xs md:text-sm" >@if (!$registro->momento)
                            {{$registro->comentario_hora}}
                        @else
                            {{$registro->momento}}
                        @endif</span>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <p class="text-gray-700 text-sm md:text-lg">Glucemia: </p> <span class="font-bold text-sm md:text-base @if ($registro->glucemia > 140 || $registro->glucemia < 90)
                        text-red-600
                    @else
                        text-green-600
                    @endif" >{{ $registro->glucemia }} mg/dl</span>

                </div>

                <div class="flex justify-between items-center">
                    <p class="text-gray-700 text-sm md:text-lg">Observaciones: </p><span class="font-bold text-sm md:text-base" >{{ $registro->observaciones }}</span>
                </div>



                    <div class="mt-5 flex justify-between items-center gap-2 print:hidden">
                        <a href="{{ route('registros.editar', $registro->id ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-1 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                            Editar</a>

                        <form method="POST" action="{{ route('registros.destroy', $registro->id) }} " class="print:hidden">
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
        <div class="mt-10 mb-5 w-11/12 mx-auto print:hidden">
            {{$registros->links()}}
        </div>
        @else
            <section class="w-11/12   border border-gray-200 shadow-xl mx-auto mt-10 p-3">

                    <h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-5 mb-8 font-extrabold uppercase"> Aún no tienes registros</h2>

            </section>
        @endif




@endsection
