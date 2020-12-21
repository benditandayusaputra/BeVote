<div class="container-fluid p-3">
    <div class="row">
        <div class="col-12 text-right mb-3">
            <button wire:click="$emit('saveRating')" class="btn btn-primary bg-app btn-next">
                Lanjut <i class="fas fa-forward fa-fw"></i>
            </button>
            <input type="hidden" id="rating">
        </div>
    <div class="col-12 text-center mb-3">
    <h2>Silakan Berikan Penilaian</h2>
    </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <div class="profile-pic">
                        <img src="{{ asset('src/assets/images/media/paku1.png') }}" alt="Pilih" class="choice d-none" />
                        @if ( $osis->photo == 'default.png' )
                            <img src="{{ asset('src/assets/images/media/'.$osis->photo) }}" width="100%" alt="Calon" class="photo-candidate" />
                        @else
                            <img src="{{ Storage::disk('public')->get($osis->photo) }}" width="100%" alt="Calon" class="photo-candidate" />
                        @endif
                        <h3 class="mt-2 mb-0 text-dark">Ketua & Wakil Ketua OSIS <br /> SMK N 1 Bawang Masa Bakti 2019/2020</h3>
                    </div>
                    <div class="border-top">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <i class="fas fa-star fa-2x fa-fw m-1" id="rating-1"></i>
                                <i class="fas fa-star fa-2x fa-fw m-1" id="rating-2"></i>
                                <i class="fas fa-star fa-2x fa-fw m-1" id="rating-3"></i>
                                <i class="fas fa-star fa-2x fa-fw m-1" id="rating-4"></i>
                                <i class="fas fa-star fa-2x fa-fw m-1" id="rating-5"></i>
                            </div>
                            <div class="col-12 mt-3">
                                <h4 class="text-dark" id="message"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('cssLoad')
    <style>
        .fa-star {
            cursor: pointer;
        }

        h4 {
            font-weight: bold !important;
        }
    </style>
@endsection

@section('jsLoad')
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('rating-1').addEventListener('click', function () {
            document.querySelector('#rating').value = 1

            for (let index = 0; index < document.getElementsByClassName('fa-star').length; index++) {
                document.getElementsByClassName('fa-star')[index].className = 'fas fa-star fa-2x fa-fw m-1'
            }

            this.className = 'fas fa-star fa-2x fa-fw m-1 text-warning'
            document.getElementById('message').innerHTML = 'Hmm...'
        })

        document.getElementById('rating-2').addEventListener('click', function () { 
            document.querySelector('#rating').value = 2

            for (let index = 0; index < document.getElementsByClassName('fa-star').length; index++) {
                document.getElementsByClassName('fa-star')[index].className = 'fas fa-star fa-2x fa-fw m-1'
            }

            for (let i = 1; i <= 2; i++) {
                document.getElementById('rating-' + i).className = 'fas fa-star fa-2x fa-fw m-1 text-warning'
            } 
            document.getElementById('message').innerHTML = 'Boleh Lah...'
        })
        
        document.getElementById('rating-3').addEventListener('click', function () { 
            document.querySelector('#rating').value = 3

            for (let index = 0; index < document.getElementsByClassName('fa-star').length; index++) {
                document.getElementsByClassName('fa-star')[index].className = 'fas fa-star fa-2x fa-fw m-1'
            }

            for (let i = 1; i <= 3; i++) {
                document.getElementById('rating-' + i).className = 'fas fa-star fa-2x fa-fw m-1 text-warning'
            } 
            document.getElementById('message').innerHTML = 'Okay...'
        })
        
        document.getElementById('rating-4').addEventListener('click', function () {
            document.querySelector('#rating').value = 4

            for (let index = 0; index < document.getElementsByClassName('fa-star').length; index++) {
                document.getElementsByClassName('fa-star')[index].className = 'fas fa-star fa-2x fa-fw m-1'
            }

            for (let i = 1; i <= 4; i++) {
                document.getElementById('rating-' + i).className = 'fas fa-star fa-2x fa-fw m-1 text-warning'
            } 
            document.getElementById('message').innerHTML = 'Mantap...'
        })
        
        document.getElementById('rating-5').addEventListener('click', function () {
            document.querySelector('#rating').value = 5

            for (let index = 0; index < document.getElementsByClassName('fa-star').length; index++) {
                document.getElementsByClassName('fa-star')[index].className = 'fas fa-star fa-2x fa-fw m-1'
            }

            for (let i = 1; i <= 5; i++) {
                document.getElementById('rating-' + i).className = 'fas fa-star fa-2x fa-fw m-1 text-warning'
            } 
            document.getElementById('message').innerHTML = 'Luar Biasa...'
        })

        window.livewire.on('saveRating', () => {
            if ( document.querySelector('#rating').value == '' ) {
                Swal.fire({
                    title: "Peringatan",
                    text: "Anda Belum Memberikan Penilaian!",
                    icon: "warning"
                })
            } else {
                window.livewire.emit('save', document.querySelector('#rating').value)
            }
        })
    </script>
@endsection