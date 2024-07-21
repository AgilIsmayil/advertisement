@extends('dashboard.core.layout')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">Monthly Registered users</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myLineChart"></canvas>
                </div>
            </div>
        </div>

    </div>


    <script>
        // Inside the <script> tag in your HTML file
        document.addEventListener('DOMContentLoaded', function () {
            // Data for the line chart
            var data = {
                labels: <?= json_encode($month) ?>,
                datasets: [{
                    label: 'Aylıq məxaric',
                    borderColor: 'red',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    data: [56,78,980],
                    fill: true,
                }],
            };

            // Configuration options for the chart
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Get the canvas element
            var ctx = document.getElementById('myLineChart').getContext('2d');

            // Create the line chart
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        });
        console.log('Salamm')
    </script>

 @endsection