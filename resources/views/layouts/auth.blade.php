<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi E-Voting">
    <meta name="author" content="Bendi Tandayu Saputra">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/bendVote.png') }}">
    <title>{{ config('app.name') }}</title>
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

        .img-auth {
            width: 350px;
        }

        @media (max-width: 768px) {
            .img-auth {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .img-auth {
                display: none;
            }
        }
    </style>
    <link href="{{ asset('src') }}/dist/css/style.min.css" rel="stylesheet">
    <livewire:styles>
    <livewire:scripts>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
<!--     <script src="{{ asset('src') }}/assets/libs/jquery/dist/jquery.min.js"></script> -->
<!--     <script src="{{ asset('src') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('src') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('src') }}/dist/js/feather.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('src') }}/dist/js/custom.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    @yield('content')
</body>
</html>