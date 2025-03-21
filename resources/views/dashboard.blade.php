@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalUsers }}</h3>
                            <p>Total Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalSimpanan }}</h3>
                            <p>Total Simpanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalJenisSimpanan }}</h3>
                            <p>Total Jenis Simpanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalNominalSimpanan }}</h3>
                            <p>Total Nominal Simpanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Jumlah Pinjaman per Bulan (2025)</h2>
                    <div id="pinjaman-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('pinjaman-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Pinjaman per Bulan (2025)'
            },
            xAxis: {
                categories: [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pinjaman'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pinjaman',
                data: [
                    {{ $jumlahPinjamanPerBulan[1] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[2] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[3] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[4] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[5] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[6] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[7] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[8] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[9] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[10] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[11] ?? 0 }},
                    {{ $jumlahPinjamanPerBulan[12] ?? 0 }}
                ]
            }]
        });
    });
</script>
@endsection
