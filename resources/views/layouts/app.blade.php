<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('img/edic_icon.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDIC</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @stack('js_head')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="h-screen antialiased leading-none
    @if (\Request::is('register') || \Request::is('password/reset'))
        bg-white
    @else
        bg-gray-300
    @endif
">
    <div id="app">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    @stack('js')
</body>

@if($errors->any())
<script type="text/javascript">
    searchCawangan('tekun_branch');

    function searchCawangan() {
        var selected = '{{ old('tekun_state') }}';
        $.ajax({
            url: "{{ route('mobile.getCawangan') }}?negeri=" + selected,
            method: 'GET',
            success: function (data) {
                $('#tekun_branch').html(data.html);
            }
        });
    }

	$(document).ready(function () {
        var old = '{{ old('tekun_branch')}}';
        var new_old = old + '      ';
        $("#tekun_branch option[value='"+new_old+"']").attr("selected","selected");
    });
</script>
@endif

</html>