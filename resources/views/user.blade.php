@extends('layouts.main')

@section('title')
User Statistics
@endsection

@section('prestyles')

@endsection

@section('styles')

@endsection


@section('contents')
<div class="container">
    <div class="card" style="margin: 24px;">
        <div class="card-body">
            <h5 class="card-title">Statistik Pengeluaran</h5>
            <canvas id="myChart" width="360" height="360"></canvas>
        </div>

    </div>
</div>
@endsection


@section('prescript')
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni"]
    var data = [200000, 400000, 50000, 0, 0, 0];
    var barChartData = {
        labels: label,
        datasets: [{
            label: 'Pengeluaran/bulan',
            backgroundColor: "red",
            data: data,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            title: {
                display: true,
                text: 'Yearly User Joined'
            },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection