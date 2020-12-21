@section('page', 'Calon Ketua & Wakil Ketua OSIS')

@section('btnPlus')
    <div class="col-5 align-self-center">
        <div class="customize-input float-right">
            <a href="{{ route('admin.candidate.create') }}" class="btn btn-primary bg-app btn-rounded">
                <i class="fas fa-plus fa-fw"></i> Tambah Calon
            </a>
        </div>
    </div>
@endsection

<div class="row">
    @if (session()->has('success'))
        <div class="success" data-success="{{ session('success') }}"></div>
        <script>
            Swal.fire({
                title: "Sukses",
                text: $('.success').data('success'),
                icon: "success"
            })
        </script>
    @endif
    @foreach ($candidates as $candidate)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <div class="profile-pic">
                        <img src="{{ Storage::disk('public')->get($candidate->photo) }}" width="100%" alt="Calon" />
                        <h4 class="mt-3 mb-0">{{ $candidate->chairman_name }} & {{ $candidate->vice_chairman_name }}</h4>
                    </div>
                </div>
                <div class="p-3 border-top">
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
                <div class="p-3 border-top">
                    <div class="row text-center">
                        <div class="col-6 border-right">
                            <a href="{{ route('admin.candidate.edit', encrypt($candidate->id)) }}" class="btn btn-success btn-block">
                                <i class="fas fa-edit fa-fw"></i> Edit
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger btn-block" wire:click="$emit('destroyCandidate', {{ $candidate->id }})">
                                <i class="fas fa-trash fa-fw"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
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

@section('jsLoad')
    <script src="{{ asset('src') }}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $('#menu-candidate').addClass('selected')

        window.livewire.on('destroyCandidate', candidateId => {
            Swal.fire({
                title: 'Apakah Anda Yakin..??',
                text: "Data Akan Di Hapus!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.value) {
                    window.livewire.emit('destroy', candidateId)
                }
            })
        }) 
    </script>
@endsection