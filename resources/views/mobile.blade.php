@extends('layouts.app')

@push('js_head')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
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
                                        class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
                                        Laman Utama
                                    </a>
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
                                    onclick="event.preventDefault();getElementById('logout-form').submit();">
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
                <div class="flex">
                    <h1 class="text-3xl font-bold leading-9 text-white">
                        ENTREPRENEURSHIP DIGITALIZATION INITIATIVE CLUB (EDIC)
                    </h1>

                    {{-- @if(is_null(auth()->user()->scheme_code))
                    <div class="hidden ml-auto sm:block">
                        <a href="{{ route('home') }}" type="button"
                            class="inline-flex items-center px-2 py-2 text-xs font-medium leading-4 text-white transition duration-150 ease-in-out bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow active:bg-yellow-700 sm:text-base">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                    @endif --}}
                </div>

                {{-- @if(is_null(auth()->user()->scheme_code))
                <div class="flex justify-center block sm:hidden">
                    <a href="{{ route('home') }}" type="button"
                        class="inline-flex items-center px-2 py-2 mt-4 text-xs font-medium leading-6 text-white transition duration-150 ease-in-out bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow active:bg-yellow-700 sm:text-base">
                        <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                @endif --}}
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
                                        {{ Session::get('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (count($errors) > 0 )
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
                                    @foreach ($errors->all() as $error)
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        {{ $error }}
                                    </p>
                                    @endforeach
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
                <div @if ($errors->any())
                    @if (
                    $errors->has('business_status') ||
                    $errors->has('business_type') ||
                    $errors->has('bank1') ||
                    $errors->has('bank1_acct') ||
                    $errors->has('gambar') ||
                    $errors->has('name') ||
                    $errors->has('ic_no') ||
                    $errors->has('gender') ||
                    $errors->has('religion') ||
                    $errors->has('birthdate') ||
                    $errors->has('race') ||
                    $errors->has('age') ||
                    $errors->has('marital') ||
                    $errors->has('dependent') ||
                    $errors->has('oku') ||
                    $errors->has('address1') ||
                    $errors->has('postcode') ||
                    $errors->has('city') ||
                    $errors->has('state') ||
                    $errors->has('phone_hp') ||
                    $errors->has('email') ||
                    $errors->has('profession') ||
                    $errors->has('income') ||
                    $errors->has('employer_name') ||
                    $errors->has('spouse_type') ||
                    $errors->has('spouse_name') ||
                    $errors->has('nationality') ||
                    $errors->has('passport_no') ||
                    $errors->has('spouse_ic_no') ||
                    $errors->has('spouse_phone') ||
                    $errors->has('spouse_profession') ||
                    $errors->has('education')
                    )
                    x-data="{ tab: 'tab1' }"
                    @elseif(
                    $errors->has('business_name') ||
                    $errors->has('business_sector') ||
                    $errors->has('business_activity') ||
                    $errors->has('business_address1') ||
                    $errors->has('business_postcode') ||
                    $errors->has('business_city') ||
                    $errors->has('business_state') ||
                    $errors->has('business_phone_hp') ||
                    $errors->has('business_premise') ||
                    $errors->has('business_ownership') ||
                    $errors->has('business_modal') ||
                    $errors->has('business_open') ||
                    $errors->has('business_closed') ||
                    $errors->has('business_ehailing') ||
                    $errors->has('business_income') ||
                    $errors->has('partner_name') ||
                    $errors->has('partner_ic') ||
                    $errors->has('partner_address1') ||
                    $errors->has('partner_postcode') ||
                    $errors->has('partner_city') ||
                    $errors->has('partner_state') ||
                    $errors->has('partner_doc')
                    )
                    x-data="{ tab: 'tab2' }"
                    @elseif(
                        $errors->has('purchase_price') ||
                        $errors->has('duration') ||
                        $errors->has('reference_name') ||
                        $errors->has('reference_address1') ||
                        $errors->has('reference_postcode') ||
                        $errors->has('reference_city') ||
                        $errors->has('reference_state') ||
                        $errors->has('reference_relation') ||
                        $errors->has('reference_phone') ||
                        $errors->has('doc_ic_no1') ||
                        $errors->has('doc_ic_no2') ||
                        $errors->has('doc_icP_no1') ||
                        $errors->has('doc_icP_no2') ||
                        $errors->has('doc_bank') ||
                        $errors->has('doc_bil') ||
                        $errors->has('doc_ssm')
                    )
                    x-data="{ tab: 'tab3' }"
                    @endif
                    @else
                    @if (Session::has('nextTab'))
                    @if (Session::get("nextTab") === 'tab2' )
                    x-data="{ tab: 'tab2' }"
                    @elseif(Session::get("nextTab") === 'tab3')
                    x-data="{ tab: 'tab3' }"
                    @endif
                    @else
                    @if (Session::has('Tab'))
                    @if (Session::get("Tab") === 'tab1' )
                    x-data="{ tab: 'tab1' }"
					@elseif(Session::get("Tab") === 'tab2')
                    x-data="{ tab: 'tab2' }"
                    @elseif(Session::get("Tab") === 'tab3')
                    x-data="{ tab: 'tab3' }"
                    @endif
                    @else
                    x-data="{ tab: 'tab1' }"
                    @endif
                    @endif
                    @endif


                    @if ($errors->any())
                        @if ($errors->has('tekun_state') || $errors->has('tekun_branch'))
                            tab1
                        @elseif($errors->has('business_ownership') || $errors->has('business_open') || $errors->has('business_closed'))
                            tab2
                        @endif
                    @endif
                    >
                    <div class="flex justify-between mb-4 sm:hidden">
                        <span class="inline-flex rounded-md shadow-sm" x-data="{ open: false }">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150
                                    @if(auth()->user()->completed === '1')
                                    @else
                                        hidden
                                    @endif
                                    " @click.prevent="open = true">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M2 10a4 4 0 004 4h3v3a1 1 0 102 0v-3h3a4 4 0 000-8 4 4 0 00-8 0 4 4 0 00-4 4zm9 4H9V9.414l-1.293 1.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 9.414V14z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Hantar Permohonan
                            </button>

                            {{-- modal penzahiran mobile--}}
                            <div class="fixed inset-x-0 bottom-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center"
                                x-show="open" x-cloak>
                                <div class="fixed inset-0 transition-opacity" x-show="open" x-cloak
                                    x-transition:enter="ease-out duration-300" x-transition:enter-start=" opacity-0"
                                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <div class="px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:max-w-xl sm:w-full sm:p-6"
                                    x-show="open" x-cloak x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start=" opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                    <div>
                                        <div class="text-center">
                                            <h3 class="text-xl font-medium leading-6 text-gray-900">
                                                Akuan Pemohon
                                            </h3>
                                            <div class="h-64 mt-2 overflow-auto">
                                                <p class="mb-2 text-base leading-5 text-gray-700">
                                                    Adalah dengan ini saya mengaku bahawa:
                                                </p>
                                                <table width="100%" class="text-justify table-auto">
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">1.</td>
                                                        <td class="px-2 py-1">Segala maklumat dan keterangan
                                                            yang diberikan adalah benar.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">2.</td>
                                                        <td class="px-2 py-1">Pihak TEKUN berhak menolak
                                                            permohonan ini jika didapati butir yang diberikan tidak
                                                            benar.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">3.</td>
                                                        <td class="px-2 py-1">Saya berikrar untuk membayar
                                                            jumlah terhutang sepertimana yang dijanjikan.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">4.</td>
                                                        <td class="px-2 py-1">Saya memperakukan bahawa
                                                            kemudahan pembiayaan ini tidak akan disalahgunakan.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">5.</td>
                                                        <td class="px-2 py-1">Saya bukan seorang yang bankrap.
                                                        </td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">6.</td>
                                                        <td class="px-2 py-1">Saya dengan ini membenarkan
                                                            pihak TEKUN Nasional memproses data-data peribadi bagi
                                                            tujuan permohonan pembiayaan.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">7.</td>
                                                        <td class="px-2 py-1"><strong>Saya mengakui tidak
                                                                pernah melantik / menggunakan khidmat ejen ( orang
                                                                tengah ) bagi memproses permohonan ini.Borang dan proses
                                                                permohonan ini juga tidak dikenakan sebarang bayaran
                                                                oleh mana-mana pihak.</strong></td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">8.</td>
                                                        <td class="px-2 py-1">Pemohon dengan ini membenarkan
                                                            <b>TEKUN Nasional</b> / atau pegawainya untuk menggunakan,
                                                            mendedahkan, memberitahu apa-apa maklumat berhubung dengan
                                                            akaun pembiayaan TEKUN / untuk tujuan atau berhubung dengan
                                                            apa-apa tindakan atau prosiding diambil bagi tujuan
                                                            penilaian kredit atau bayaran balik di bawah Terma dan
                                                            Syarat ini.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">9.</td>
                                                        <td class="px-2 py-1">Pemohon dengan ini membenarkan
                                                            <b>TEKUN Nasional</b> / atau pegawainya untuk penzahiran
                                                            apa-apa maklumat kredit individu yang berkaitan dengan
                                                            kedudukan kredit, kemudahan atau butiran akaun pemohon
                                                            kepada Experian Information Services (Malaysia) Sdn Bhd
                                                            (dahulu dikenali sebagai RAMCI) ("Experian") dan / atau
                                                            Credit Tip Off Service Sdn Bhd ("CTOS") serta pelanggan
                                                            Experian / CTOS termasuk Bank, Institusi kewangan atau
                                                            mana-mana agensi pelaporan kredit yang berkuat kuasa di
                                                            Malaysia.</td>
                                                    </tr>
                                                    <tr class="text-sm text-gray-600">
                                                        <td class="px-2 py-1 align-top">10.</td>
                                                        <td class="px-2 py-1">Pemohon dengan ini memberi
                                                            kebenaran kepada Experian dan / atau CTOS bagi pendedahan
                                                            maklumat kredit, termasuk maklumat kredit perbankan kepada
                                                            <b>TEKUN Nasional</b> / atau pegawainya bagi maksud yang
                                                            berikut seperti yang dinyatakan di bawah seksyen 24, menurut
                                                            Akta Pelaporan Kredit 2010. Persetujuan hendaklah kekal
                                                            terpakai selagi pemohon mengekalkan akaun / pembiayaan /
                                                            kredit / apa-apa transaksi dengan organisasi.</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                        <span class="flex w-full rounded-md shadow-sm sm:col-start-2">
                                            <a href="{{ route('mobile.status') }}" type="button"
                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo sm:text-sm sm:leading-5">
                                                Setuju & Hantar
                                            </a>
                                        </span>
                                        <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:col-start-1">
                                            <button type="button"
                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline sm:text-sm sm:leading-5"
                                                @click.prevent="open = false">
                                                Kembali ke Borang Permohonan
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal penzahiran --}}
                        </span>
                    </div>

                    <div class="sm:hidden">
                        <select class="block w-full form-select" @change="tab = $event.target.value">
                            <option value="opt_maklumatPeribadi" x-bind:value="'tab1'"
                                @if(is_null(auth()->user()->peribadi))
                                    selected
                                @endif
                                >
                                Maklumat Peribadi
                            </option>
                            <option value="opt_maklumatPerniagaan"
                                @if(is_null(auth()->user()->peribadi))
                                    disabled
                                @else
                                    x-bind:value="'tab2'"
                                @endif
                                >
                                Maklumat Perniagaan
                            </option>
                            <option value="opt_maklumatPinjaman"
                                @if(is_null(auth()->user()->peribadi) || is_null(auth()->user()->perniagaan))
                                    disabled
                                @else
                                    x-bind:value="'tab3'"
                                @endif
                                >
                                Dokumen Sokongan
                            </option>
                        </select>
                    </div>

                    <div class="hidden sm:block">
                        <nav class="flex">
                            <button
                                class="px-3 py-2 text-sm font-medium leading-5 text-gray-500 rounded-md hover:text-gray-700 focus:outline-none focus:text-indigo-600 focus:bg-indigo-50"
                                :class="{ 'text-indigo-700 bg-indigo-100 focus:outline-none focus:text-indigo-800 focus:bg-indigo-200' : tab === 'tab1' }"
                                @click="tab='tab1'">
                                Maklumat Peribadi
                            </button>
                            <button
                                class="px-3 py-2 ml-4 text-sm font-medium leading-5 text-gray-500 rounded-md hover:text-gray-700 focus:outline-none focus:text-indigo-600 focus:bg-indigo-50"
                                :class="{ 'text-indigo-700 bg-indigo-100 focus:outline-none focus:text-indigo-800 focus:bg-indigo-200' : tab === 'tab2' }"
                                @if(is_null(auth()->user()->peribadi))
                                @else
                                    @click="tab='tab2'"
                                @endif
                                >
                                Maklumat Perniagaan
                            </button>
                            <button
                                class="px-3 py-2 ml-4 text-sm font-medium leading-5 text-gray-500 rounded-md hover:text-gray-700 focus:outline-none focus:text-indigo-600 focus:bg-indigo-50"
                                :class="{ 'text-indigo-700 bg-indigo-100 focus:outline-none focus:text-indigo-800 focus:bg-indigo-200' : tab === 'tab3' }"
                                @if(is_null(auth()->user()->perniagaan))
                                @else
                                    @click="tab='tab3'"
                                @endif
                                >
                                Dokumen Sokongan
                            </button>

                            <div class="ml-auto">
                                <span class="inline-flex rounded-md shadow-sm" x-data="{ open: false }">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150
                                            @if(auth()->user()->completed === '1')
                                            @else
                                                hidden
                                            @endif
                                            " @click.prevent="open = true">
                                        <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M2 10a4 4 0 004 4h3v3a1 1 0 102 0v-3h3a4 4 0 000-8 4 4 0 00-8 0 4 4 0 00-4 4zm9 4H9V9.414l-1.293 1.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 9.414V14z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Hantar Permohonan
                                    </button>

                                    {{-- modal penzahiran desktop--}}
                                    <div class="fixed inset-x-0 bottom-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center"
                                        x-show="open" x-cloak>
                                        <div class="fixed inset-0 transition-opacity" x-show="open" x-cloak
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start=" opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <div class="px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:max-w-xl sm:w-full sm:p-6"
                                            x-show="open" x-cloak x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start=" opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                            <div>
                                                <div class="text-center">
                                                    <h3 class="text-xl font-medium leading-6 text-gray-900">
                                                        Bayaran Yuran
                                                    </h3>
                                                    <table width="100%" class="mt-2 text-justify bg-gray-300 rounded-md table-auto">
                                                        <tr class="text-sm text-black">
                                                            <td class="px-2 py-2">
                                                                Harga Ahli
                                                            </td>
                                                            <td class="px-2 py-2 text-right">
                                                                RM 100.00
                                                            </td>
                                                        </tr>
                                                        <tr class="text-sm text-black border-b-2 border-gray-500">
                                                            <td class="px-2 py-2">
                                                                GST
                                                            </td>
                                                            <td class="px-2 py-2 text-right">
                                                                RM 0.00
                                                            </td>
                                                        </tr>
                                                        <tr class="text-sm text-black">
                                                            <td class="px-2 py-2">
                                                                Jumlah Keseluruhan
                                                            </td>
                                                            <td class="px-2 py-2 text-right">
                                                                RM 100.00
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <p class="mt-2 text-xs italic text-red-600">* Yuran akan dipulangkan sekiranya permohonan menjadi ahli ditolak.</p>

                                                    <h3 class="mt-5 text-xl font-medium leading-6 text-gray-900">
                                                        Buat Bayaran (Internet Banking FPX)
                                                    </h3>
                                                    <div class="mt-4 bg-gray-300 rounded-md">
                                                        <div class="grid grid-cols-4 gap-3 p-3">
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/affin.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/alliance.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/ambank.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/bank_islam.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/bank_rakyat.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/bank_muamalat.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/bsn.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/cimb.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/hong_leong.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/hsbc.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/maybank.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/ocbc.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/public_bank.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/rhb.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/standard_chartered.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                            <div class="flex items-center justify-center h-20 bg-white rounded-lg cursor-pointer">
                                                                <img src="{{ asset('img/banks/uob.png') }}" alt="" class="w-24 ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="h-64 mt-2 overflow-auto">
                                                        <p class="mb-2 text-base leading-5 text-gray-700">
                                                            Adalah dengan ini saya mengaku bahawa:
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div
                                                class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                                <span class="flex w-full rounded-md shadow-sm sm:col-start-2">
                                                    <a href="{{ route('mobile.status') }}" type="button"
                                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo sm:text-sm sm:leading-5">
                                                        Bayar & Hantar Permohonan
                                                    </a>
                                                </span>
                                                <span
                                                    class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:col-start-1">
                                                    <button type="button"
                                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline sm:text-sm sm:leading-5"
                                                        @click.prevent="open = false">
                                                        Kembali ke Borang Permohonan
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal penzahiran --}}
                                </span>
                            </div>
                        </nav>
                    </div>

                    <div @if(isset(auth()->user()->peribadi->tekun_state)) x-data="{ open: false }" @else x-data="{ open: true }" @endif>
                        @include('mobile_negeri')
                    </div>

                    {{-- card content --}}
                    @include('mobile_maklumatPeribadi')
                    @include('mobile_maklumatPerniagaan')
                    @include('mobile_maklumatPinjaman')
                    {{-- end content --}}

                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>
@endsection

@push('js')
@if (Session::has('success') || count($errors) > 0 )
<script>
    $(document).ready(function () {

        setTimeout(function () {
            $(".notification").animate({
                opacity: "1"
            });
        }, 500);

        setTimeout(function () {
            $('.notification').fadeOut('fast');
        }, 7000);

    });

</script>
@endif
@endpush