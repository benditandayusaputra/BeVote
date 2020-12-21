@section('page', 'Kritik & Saran')

<div class="row">
    <div class="col-12">
        <div class="card shadow-lg">
            <div class="card-body">
            <a href="{{ route('aspiration.export') }}" target="_blank" class="btn btn-primary bg-app mb-4" id="export-excel">
            	<i class="fas fa-file-excel"></i> Export
            </a>
                <div class="table-responsive" wire:ignore>
                    <table id="tableAspiration" class="table table-hover table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Aspirasi</th>
                            	<th>Kritik & Saran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aspirations as $aspiration)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $aspiration->aspiration }}</td>
                                	<td>{{ $aspiration->critic }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-aspiration').addClass('selected')
        $('#tableAspiration').DataTable()
    </script>
@endsection