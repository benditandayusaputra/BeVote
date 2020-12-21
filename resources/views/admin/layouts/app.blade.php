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
        .bg-app {
            background: linear-gradient(to right,#00A2E9,#008CFF,#2A9EFC) !important;
        }
    </style>
    @livewireStyles
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
<!--     <script src="{{ asset('src') }}/assets/libs/jquery/dist/jquery.min.js"></script> -->
<!--     <script src="{{ asset('src') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{ asset('src') }}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('admin.layouts.partials.header')
        @include('admin.layouts.partials.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome {{ session('name') }}</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascipt::void(0)">@yield('page')</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    @yield('btnPlus')
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>

            @include('admin.layouts.partials.footer')
        </div>
    </div>

    <script src="{{ asset('src') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('src') }}/dist/js/feather.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('src') }}/dist/js/custom.min.js"></script>
    <script src="{{ asset('src/assets/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('src/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('src') }}/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/chart.js/dist/Chart.min.js"></script>
    @yield('jsLoad')
</body>
</html>