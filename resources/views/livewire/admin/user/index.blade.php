@section('page', 'User')

@section('btnPlus')
    <div class="col-5 align-self-center">
        <div class="customize-input float-right">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary bg-app btn-rounded">
                <i class="fas fa-plus fa-fw"></i> Tambah User
            </a>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-12">
        @if (session()->has('success'))
            <div class="success" data-success="{{ session('success') }}"></div>
            <script>showAlert()</script>
        @endif
        
        @if (session()->has('error'))
            <div class="error" data-error="{{ session('error') }}"></div>
            <script>showAlertError()</script>
        @endif
        <div class="card shadow-lg">
            <div class="card-body" wire:ignore>
                <button type="button" data-toggle="modal" data-target="#modalFormFile" class="btn btn-primary bg-app mb-4">
                    <i class="fas fa-file-excel fa-fw"></i> Import Data
                </button>
                <button type="button" wire:click="downloadFile" class="btn btn-success mb-4">
                    <i class="fas fa-file-excel fa-fw"></i> Download Example
                </button>
                <div class="table-responsive">
                    <table id="userTable" class="table table-hover table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>NIS</th>
                                <th>Token</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tipe</th>
                                <th>Status Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nis }}</td>
                                    <td>{{ $user->token }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->class }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>
                                        @if ( $user->status_choice == 1 )
                                            {{ 'Sudah Memilih' }}
                                        @else 
                                            {{ 'Belum Memilih' }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="modal fade" id="modalFormFile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ url('importUsers') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                            <label for="fileExcel">File</label>
                            <input type="file" class="form-control-file" name="fileExcel" id="fileExcel" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">Masukan File Excel Dengan Format .csv</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-users').addClass('selected')
        $('#userTable').DataTable()

        window.livewire.on('startDownload', path => {
            window.open('download/' + path, '_blank')
        })

        function showAlert() {
            Swal.fire({
                title: "Sukses",
                text: $('.success').data('success'),
                icon: "success"
            })
        }
        
        function showAlertError() {
            Swal.fire({
                title: "Error",
                text: $('.error').data('error'),
                icon: "error"
            })
        }
    </script>
@endsection