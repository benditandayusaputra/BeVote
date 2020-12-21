<div>
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-12 text-right mb-3">
                <button wire:click="$emit('confirmChoice')" class="btn btn-primary bg-app btn-next">
                    Lanjut <i class="fas fa-forward fa-fw"></i>
                </button>
                <input type="hidden" id="candidateId">
            </div>
        <div class="col-12 text-center mb-3">
        <h2>Silakan pilih dengan klik gambar kandidat</h2>
        </div>
            @foreach ($candidates as $candidate)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card shadow-lg">
                        <div class="card-body text-center">
                        <div class="profile-pic" id="candidate{{ $candidate->id }}" wire:click="$emit('userChoice', {{ $candidate->id }})">
                                <img src="{{ asset('src/assets/images/media/paku1.png') }}" alt="Pilih" class="choice d-none" />
                                <img src="{{ Storage::disk('public')->get($candidate->photo) }}" width="100%" alt="Calon" class="photo-candidate" />
                                <h4 class="mt-4 mb-0 text-dark">Kandidat <br> Ketua & Wakil Ketua OSIS <br /> SMK Negeri 1 Bawang <br /> Masa Bakti 2020/2021</h4>
                            </div>
                        </div>
                        <div class="p-2 border-top">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#visionModal{{ $candidate->id }}">
                                        Visi
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#misionModal{{ $candidate->id }}">
                                        Misi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    @foreach ($candidates as $candidate)
        <div id="visionModal{{ $candidate->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Visi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <?= $candidate->vision ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="misionModal{{ $candidate->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Misi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <?= $candidate->mission ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@section('cssLoad')
    <style>
        .profile-pic {
            cursor: pointer;
            position: relative;
        }

        .profile-pic .choice {
            position: absolute;
            top: -12%;
            left: 20%;
            z-index: 99;
        }

        .choice-candidate {
            filter: brightness(.5) !important;
            -ms-filter: brightness(.5) !important;
            -o-filter: brightness(.5) !important;
            -webkit-filter: brightness(.5) !important;
            -moz-filter: brightness(.5) !important;
        }
    </style>
@endsection

@section('jsLoad')
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        // Versi Jquery
        // $('.profile-pic').on('click', function (e) {
        //     let candidateId = $(this).data('id')
        //     window.livewire.emit('getCandidateId', candidateId)

        //     $('.choice').addClass('d-none')
        //     $('.photo-candidate').removeClass('choice-candidate')
        //     $(this).children('.choice').removeClass('d-none')
        //     $(this).children('.photo-candidate').addClass('choice-candidate')

        // })

        //  Versi Vanilla
        window.livewire.on('userChoice', candidateId => {
            let elements = document.getElementsByClassName('choice')
            let elementsImage = document.getElementsByClassName('photo-candidate')
            
            for (let index = 0; index < elements.length; index++) {
                elements[index].className = 'choice d-none'
            }
            
            for (let index = 0; index < elementsImage.length; index++) {
                elementsImage[index].className = 'photo-candidate'
            }
            document.getElementById('candidate' + candidateId).children[0].className = 'choice'
            document.getElementById('candidate' + candidateId).children[1].className = 'photo-candidate choice-candidate'

            document.getElementById('candidateId').value = candidateId
        })

        window.livewire.on('confirmChoice', () => {
            let candidateId = document.getElementById('candidateId').value
            if ( candidateId != '' ) {
                Swal.fire({
                    title: 'Apakah Anda Yakin..??',
                    text: "Dengan Pilihan Anda",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin!'
                }).then((result) => {
                    if (result.value) {
                        window.livewire.emit('choice', candidateId)
                    }
                })
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Anda Belum Memilih!",
                    icon: "error"
                })
            }

        }) 
    </script>
@endsection