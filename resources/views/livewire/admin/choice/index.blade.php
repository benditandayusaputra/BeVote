@section('page', 'Pemilihan')

@section('btnPlus')
    <div class="col-5 align-self-center">
        <div class="customize-input float-right">
            <button type="button" class="btn btn-primary bg-app btn-rounded" id="btnReload">
                <i class="fas fa-reply-all fa-fw"></i> Reload
            </button>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow-lg">
                <div>
                    <canvas id="bar-chart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <canvas id="pie-chart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <canvas id="bar-chart-horizontal" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-choice').addClass('selected')

        loadData()

        document.querySelector('#btnReload').addEventListener('click', function () {  
            loadData()
        })

        function loadData() {
            let value   = [] 
            let label   = []
            let jumlah  = [] 
            
            $.get('{{ $urlGetData }}', '',
                function (data, textStatus, jqXHR) {
                    value.push(data.userAmount)
                    label.push('Belum Memilih')
                    jumlah.push('Jumlah')
                    for (let i in data.data) {
                        value.push(data.data[i].amount)
                        label.push(data.data[i].chairman_name)
                        jumlah.push('jumlah')
                    }

                    console.log(value)
                    new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                        labels: label,
                        datasets: [
                            {
                            label: jumlah,
                            backgroundColor: ["#6174d5", "#5f76e8", "#768bf4", "#7385df", "#b1bdfa"],
                            data: value
                            }
                        ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true, 
                                text: 'Jumlah Pemilihan'
                            }
                        }
                    })
                    new Chart(document.getElementById("pie-chart"), {
                        type: 'pie',
                        data: {
                        labels: label,
                        datasets: [
                            {
                            label: jumlah,
                            backgroundColor: ["#6174d5", "#5f76e8", "#768bf4", "#7385df", "#b1bdfa"],
                            data: value
                            }
                        ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true, 
                                text: 'Jumlah Pemilihan'
                            }
                        }
                    })
                    new Chart(document.getElementById("bar-chart-horizontal"), {
                        type: 'horizontalBar',
                        data: {
                        labels: label,
                        datasets: [
                            {
                            label: jumlah,
                            backgroundColor: ["#6174d5", "#5f76e8", "#768bf4", "#7385df", "#b1bdfa"],
                            data: value
                            }
                        ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true, 
                                text: 'Jumlah Pemilihan'
                            }
                        }
                    })
                },
                "JSON"
            )
            
        }
    </script>
@endsection