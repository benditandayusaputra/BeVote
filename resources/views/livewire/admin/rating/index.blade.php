@section('page', 'Penilaian')

<div class="row">
    <div class="col-12">
        <div class="card shadow-lg">
            <div class="card-body">
                <table id="tableRating" class="table table-hover table-bordered table-striped no-wrap">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $rating)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @for ($i = 0; $i < $rating->rating; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                    @endfor
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-rating').addClass('selected')
        $('#tableRating').DataTable()
    </script>
@endsection