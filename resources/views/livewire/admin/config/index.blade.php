@section('page', 'Konfigurasi Aplikasi')

<div class="row">
    @if ( session()->has('success') )
        <div class="success" data-success="{{ session('success') }}"></div>
        <script>showAlertSuccess()</script>
    @endif
    <div class="col-12">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="form-group">
                    <label for="logo">Logo Sekolah</label>
                    <input type="file" class="form-control-file" wire:change="$emit('logoChoosen')" name="logo" id="logo" placeholder="Logo Sekolah">
                </div>
                @if ( $config )
                    @if ( $logo )
                        <img src="{{ $logo }}" alt="Logo" width="150px" class="mt-2 mb-3">
                    @else 
                        <img src="{{ Storage::disk('public')->get($oldLogo) }}" alt="Logo" width="150px" class="mt-2 mb-3">
                    @endif
                @else 
                    @if ( $logo )
                        <img src="{{ $logo }}" alt="Logo" width="150px" class="mt-2 mb-3">
                    @endif
                @endif
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="school_name">Nama Sekolah</label>
                        <input type="text" class="form-control" wire:model="school_name" name="school_name" id="school_name" placeholder="Masukan Nama Sekolah">
                    </div>
                    <div class="form-group">
                        <label for="school_slogan">Slogan Sekolah</label>
                        <input type="text" class="form-control" wire:model="school_slogan" name="school_slogan" id="school_slogan" placeholder="Masukan Slogan Sekolah">
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="open">Waktu Buka Pemilihan</label>
                        <input type="text" class="form-control" name="open" id="open" placeholder="Masukan Waktu Di Mulai Pemilihan" @if ($open) value="{{ $open }}" @endif>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="close">Waktu Tutup Pemilihan</label>
                        <input type="text" class="form-control" name="close" id="close" placeholder="Masukan Waktu Di Tutup Pemilihan" @if ($close) value="{{ $close }}" @endif>
                    </div>
                    <button class="btn btn-primary bg-app">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('cssLoad')
    <link rel="stylesheet" href="{{ asset('src/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <style>
        .dtp div.dtp-date,
        .dtp div.dtp-time {
            background: #007d72; }

        .dtp > .dtp-content > .dtp-date-view > header.dtp-header {
            background: #009688; }

        .dtp .dtp-buttons .dtp-btn-ok {
            margin-left: 10px; }

        .dtp .dtp-buttons .dtp-btn-clear {
            margin-right: 10px !important; }

        .dtp .p10 > a {
            color: #fff; }

        .dtp div.dtp-actual-year {
            font-size: 1.5em;
            color: #ffffff; }

        .dtp table.dtp-picker-days tr td a.selected {
            background: #007d72;
            color: #fff; }

        .datepicker.datepicker-dropdown.dropdown-menu {
            margin-top: 0 !important; }

        .datepicker table tr td.active {
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#009688), to(#009688));
            background-image: -webkit-linear-gradient(to bottom, #009688, #009688);
            background-image: -o-linear-gradient(to bottom, #009688, #009688);
            background-image: linear-gradient(to bottom, #009688, #009688);
            border: none; }
        .datepicker table tr td.active:hover.active {
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#009688), to(#009688));
            background-image: -webkit-linear-gradient(to bottom, #009688, #009688);
            background-image: -o-linear-gradient(to bottom, #009688, #009688);
            background-image: linear-gradient(to bottom, #009688, #009688);
            border: none; }

        .datepicker table tr td.selected {
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#009688), to(#009688));
            background-image: -webkit-linear-gradient(to bottom, #009688, #009688);
            background-image: -o-linear-gradient(to bottom, #009688, #009688);
            background-image: linear-gradient(to bottom, #009688, #009688);
            border: none; }

        .datepicker table tr td span.active {
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#009688), to(#009688));
            background-image: -webkit-linear-gradient(to bottom, #009688, #009688);
            background-image: -o-linear-gradient(to bottom, #009688, #009688);
            background-image: linear-gradient(to bottom, #009688, #009688);
            border: none; }
        .datepicker table tr td span.active:hover.active {
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#009688), to(#009688));
            background-image: -webkit-linear-gradient(to bottom, #009688, #009688);
            background-image: -o-linear-gradient(to bottom, #009688, #009688);
            background-image: linear-gradient(to bottom, #009688, #009688);
            border: none; }

        .datepicker table.table-condensed > tbody > tr > td {
            padding: 6px 9px; }

        .input-daterange .form-control {
            text-align: left; }

        .input-daterange .input-group-addon {
            padding-right: 10px !important; }
    </style>
@endsection

@section('jsLoad')
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $('#menu-config').addClass('selected')
        $('#open').bootstrapMaterialDatePicker({
            format: 'dddd, DD-MMMM-YYYY, HH:mm',
            clearButton: true,
            weekStart: 1
        })
        $('#close').bootstrapMaterialDatePicker({
            format: 'dddd, DD-MMMM-YYYY, HH:mm',
            clearButton: true,
            weekStart: 1
        })

        $('#open').on('change', function () {  
            @this.set('open', $(this).val())
        })

        $('#close').on('change', function () {  
            @this.set('close', $(this).val())
        })

        window.livewire.on('logoChoosen', () => {
            let inputLogo = document.getElementById('logo')
            let logo = inputLogo.files[0]
            let reader = new FileReader()

            reader.onloadend = () => {
                window.livewire.emit('logoUpload', reader.result)
                window.livewire.emit('logoName', logo.name)
            }

            reader.readAsDataURL(logo)
        })

        function showAlertSuccess() {
            Swal.fire({
                title: "Sukses",
                text: $('.success').data('success'),
                icon: "success"
            })
        }
    </script>
@endsection