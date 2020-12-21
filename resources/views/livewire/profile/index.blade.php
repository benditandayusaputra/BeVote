<div class="container-fluid py-5">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 col-md-12 col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            @if ( session('gender') == "Laki-Laki" )
                                <img src="{{ asset('src/assets/images/media/icon-user-man.png') }}" alt="User" width="150px">
                            @else 
                                <img src="{{ asset('src/assets/images/media/icon-user-woman.png') }}" alt="User" width="150px">
                            @endif
                        </div>
                        <div class="col-12 border-top border-bottom p-3 mt-5">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-4">
                                    <h5 class="text-dark">NIS</h5>
                                </div>
                                <div class="col-lg-4 col-md-4 col-8">
                                    <h5>: {{ session('nis') }}</h5>
                                </div>
                                <div class="col-lg-2 col-md-2 col-4">
                                    <h5 class="text-dark">Nama</h5>
                                </div>
                                <div class="col-lg-4 col-md-4 col-8">
                                    <h5>: {{ session('name') }}</h5>
                                </div>
                                @if( session('user_type') == 'SISWA' )
                                <div class="col-lg-2 col-md-2 col-4">
                                    <h5 class="text-dark">Kelas</h5>
                                </div>
                                <div class="col-lg-4 col-md-4 col-8">
                                    <h5>: {{ session('class') }}</h5>
                                </div>
                                @endif
                                <div class="col-lg-2 col-md-2 col-4">
                                    <h5 class="text-dark">Jabatan</h5>
                                </div>
                                <div class="col-lg-4 col-md-4 col-8">
                                    <h5>: {{ session('user_type') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" wire:click="back()" class="btn btn-danger btn-block">
                                        <i class="fas fa-backward fa-fw"></i> Kembali
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" wire:click="next()" class="btn btn-success btn-block">
                                        Lanjut <i class="fas fa-forward fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>