@section('page', 'Dashboard')

<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $countUsers }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah User</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted">
                        <i data-feather="users"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $countTeachers }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Guru</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted">
                        <i data-feather="users"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $countStudents }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Siswa</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted">
                        <i data-feather="users"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $countCandidates }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Calon</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted">
                        <i data-feather="users"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
<script>
    $('#menu-dashboard').addClass('selected')
</script>
@endsection