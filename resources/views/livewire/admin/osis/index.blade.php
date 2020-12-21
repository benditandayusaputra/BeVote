@section('page', 'OSIS')

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
        @if (session()->has('success'))
            <div class="success" data-success="{{ session('success') }}"></div>
        @endif
        <div class="card shadow-lg">
            <div class="card-body text-center">
                <div class="profile-pic">
                    @if ( $osis->photo == 'default.png' )
                        <img src="{{ asset('src/assets/images/media/default.png') }}" width="100%" alt="Calon" />
                    @else 
                        <img src="{{ Storage::disk('public')->get($osis->photo) }}" width="100%" alt="Calon" />
                    @endif
                    <h4 class="mt-3 mb-0">{{ $osis->chairman_name }} & {{ $osis->vice_chairman_name }}</h4>
                </div>
            </div>
            <div class="p-3 border-top">
                <div class="row text-center">
                    <div class="col-6 border-right">
                        <button type="button" class="btn btn-primary btn-block bg-app" data-toggle="modal" data-target="#visionModal">
                            Visi
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-block bg-app" data-toggle="modal" data-target="#misionModal">
                            Misi
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-3 border-top">
                <div class="row text-center">
                    <div class="col-12 border-right">
                        <a href="{{ route('admin.osis.edit') }}" class="btn btn-success btn-block">
                            <i class="fas fa-edit fa-fw"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="visionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Misi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <?= $osis->vision ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="misionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Misi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <?= $osis->vision ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-osis').addClass('selected')

        const success = $('.success').data('success')

        if ( success ) {
            Swal.fire({
                title: "Sukses",
                text: success,
                icon: "success"
            })
        }
    </script>
@endsection