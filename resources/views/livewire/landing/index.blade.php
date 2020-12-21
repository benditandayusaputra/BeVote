<div class="container-fluid py-5">
    <div class="row">
        <div class="col-lg-10 col-md-12 col-12 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row">
                        @if ( $config )
                            <div class="col-12 text-center">
                                <h3 class="text-dark">Pemilihan Ketua & Wakil Ketua OSIS {{ $config->school_name }}</h3>
                                <img src="{{ Storage::disk('public')->get($config->logo) }}" alt="Logo" width="150px" class="my-3">
                                <h3 class="text-dark mb-3" id="text">Akan Di Laksanakan Pada</h3>
                                <h2 id="countDown" class="text-dark"></h2>
                            </div>
                        @else
                            <div class="col-12 text-center">
                                <h3 class="text-dark">Pemilihan Ketua & Wakil Ketua OSIS Nama Sekolah</h3>
                                <h1>Logo Sekolah</h1>
                                <h3 class="text-dark mb-3" id="text">Akan Di Laksanakan Pada</h3>
                                <h2 id="countDown" class="text-dark"></h2>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        let open = '{{ $start }}'
        let close = '{{ $finish }}'
        let finish = new Date(close).getTime()
        let routeLogin = '{{ $routeLogin }}'
        let now = new Date().getTime()

        if ( open ) {
            if ( now > finish ) {
                document.getElementById('text').innerHTML = ''
                document.getElementById('countDown').innerHTML = `Pemilihan Telah Di Tutup`
            } else {
                setInterval(function () {  
                    let now = new Date().getTime()
                    let countDownDate = new Date(open).getTime()
                    let distance = countDownDate - now
                    let days = Math.floor(distance / (1000 * 60 * 60 * 24))
                    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
                    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
                    let seconds = Math.floor((distance % (1000 * 60)) / 1000)
                    
                    if ( days > 0 ) {
                        document.getElementById('countDown').innerHTML = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`
                    } else if( hours > 0 ) {
                        document.getElementById('countDown').innerHTML = `${hours} Jam ${minutes} Menit ${seconds} Detik`
                    } else if( minutes > 0 ) {
                        document.getElementById('countDown').innerHTML = `${minutes} Menit ${seconds} Detik`
                    } else {
                        document.getElementById('countDown').innerHTML = `${seconds} Detik`
                    }

                    if ( distance < 0 ) {
                        clearInterval()
                        window.location.href = routeLogin
                    }

                }, 1000)
            }
        } else {
            document.getElementById('countDown').innerHTML = `Belum Ada Pemilihan Ketua OSIS`
        }
    </script>
@endsection