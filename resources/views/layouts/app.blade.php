<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi E-Voting">
    <meta name="author" content="Bendi Tandayu Saputra">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/bendVote.png') }}">
    <title>{{ config('app.name') }}</title>
    @yield('cssLoad')
    <link href="{{ asset('src') }}/dist/css/style.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset("src/assets/images/auth/bg-1.jpg") }}') !important;
            background-size: cover !important;
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
        }
        
        .bg-app {
            background: linear-gradient(to right,#00A2E9,#008CFF,#2A9EFC) !important;
        }
    </style>
    <livewire:styles>
    <livewire:scripts>
    <script src="{{ mix('js/app.js') }}"></script>
<!--     <script src="{{ asset('src') }}/assets/libs/jquery/dist/jquery.min.js"></script> -->
<!--     <script src="{{ asset('src') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    
    @yield('content')

    @yield('jsLoad')
</body>
</html>