@extends('layouts.app')

@push('js_head')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
@endpush

@section('content')
<div>
    <div class="pb-32 bg-gray-800">
        <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-20">
                <div class="border-b border-gray-700">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-16 h-16" src="{{ asset('img/edic_icon.png') }}" />
                            </div>
                            <div class="hidden md:block">
                                <div class="flex items-baseline ml-10">
                                    <a href="#"
                                        class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">Laman
                                        Utama</a>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto ">
                            <div class="items-baseline">
                                <a href="#"
                                    class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
                                    {{ substr(auth()->user()->ic_no,0,6) }}-{{ substr(auth()->user()->ic_no,6,2) }}-{{ substr(auth()->user()->ic_no,8,4) }}
                                </a>
                            </div>
                        </div>
                        <div class="block ml-2">
                            <span class="inline-flex rounded-md shadow-sm">
                                <a href="{{ route('logout') }}" type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                            clip-rule="evenodd">
                                    </svg>
                                    Log Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header class="py-10">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-20">
                <h1 class="text-3xl font-bold leading-9 text-white">
                    ENTREPRENEURSHIP DIGITALIZATION INITIATIVE CLUB (EDIC)
                </h1>
            </div>

            @if (Session::has('success'))
            <div
                class="fixed inset-0 flex items-end justify-center px-4 py-6 opacity-0 pointer-events-none sm:p-20 sm:items-start sm:justify-end notification">
                <div class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto">
                    <div class="overflow-hidden rounded-lg shadow-xs">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium leading-5 text-gray-900">
                                        Berjaya!
                                    </p>
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        Permohonan anda telah berjaya dihantar.
                                    </p>
                                </div>
                                <div class="flex flex-shrink-0 ml-4">
                                    <button
                                        class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (Session::has('error'))
            <div
                class="fixed inset-0 flex items-end justify-center px-4 py-6 opacity-0 pointer-events-none sm:p-20 sm:items-start sm:justify-end notification">
                <div class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto">
                    <div class="overflow-hidden rounded-lg shadow-xs">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium leading-5 text-gray-900">
                                        Ralat!
                                    </p>
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        {{ Session::get('error') }}
                                    </p>
                                </div>
                                <div class="flex flex-shrink-0 ml-4">
                                    <button
                                        class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </header>
    </div>

    <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-20">
            <!-- Replace with your content -->
            <div class="px-5 py-6 bg-gray-100 rounded-lg shadow sm:px-6">
                <div>
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Status Permohonan
                            </h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <!-- Content goes here -->
                            <div class="">
                                <p class="text-lg font-medium leading-6 text-center text-gray-900">Permohonan TBRS bagi
                                </p>

                                <p class="text-lg font-medium leading-6 text-center text-gray-900">
                                    {{ strtoupper(auth()->user()->name) }}</p>
                                <p class="text-lg font-medium leading-6 text-center text-gray-900">No. K/P:
                                    {{ substr(auth()->user()->ic_no,0,6) }}-{{ substr(auth()->user()->ic_no,6,2) }}-{{ substr(auth()->user()->ic_no,8,4) }}
                                </p>
                                <p class="text-lg font-medium leading-6 text-center text-gray-900">Alamat Emel:
                                    {{ auth()->user()->email }}</p>
                                <p class="text-lg font-medium leading-6 text-center text-gray-900">No. HP:
                                    {{ auth()->user()->peribadi->phone_hp }}</p>
                                <p class="mt-4 text-3xl font-medium leading-8 text-center text-gray-900">
                                    @if (auth()->user()->status == 1 || auth()->user()->status == 2 || auth()->user()->status == 3 || auth()->user()->status == 4 || auth()->user()->status == 5 || auth()->user()->status == 6)
										Berjaya dihantar & sedang diproses.
                                    @elseif(auth()->user()->status == 10 )
										Permohonan Lulus
                                    @elseif(auth()->user()->status == 20)
										Permohonan Gagal
                                    @elseif(auth()->user()->status == 7)
										Permohonan KIV
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>
@endsection

@push('js')
@if (Session::has('success') || Session::has('error'))
<script>
    $(document).ready(function(){
            setTimeout(function(){
                $(".notification").animate({opacity: "1"});
            }, 1000);

            setTimeout(function(){
                $(".notification").animate({opacity: "0"});
            }, 10000);
        });
</script>
@endif
@endpush