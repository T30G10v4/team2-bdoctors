@extends('layouts.doc_admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <div class="chart-container">
        @if (isset($dataMessage))
            <div class="bar-chart-container mb-5">
                <canvas id="bar-chart"></canvas>
            </div>
        @else
            <h1>nothing message to show 😢 u are lonely</h1>
        @endif

        @if (isset($dataReview))
            <div class="line-chart-container">
                <canvas id="line-chart"></canvas>
            </div>
        @else
            <h1>nothing to show 😢 nobody reviews you</h1>
        @endif


    </div>

    <!-- javascript we needed -->

    <script>
        $(function() {
            //get the bar chart canvas
            var cData = JSON.parse(`<?php echo $chart_dataMessage; ?>`);
            var ctx = $("#bar-chart");

            //bar chart data
            var data = {
                labels: cData.labelMessage,
                datasets: [{
                    label: "Messages Count",
                    data: cData.dataMessage,
                    backgroundColor: [
                        //add color at sentiment 🐤
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Last Week Messages",
                    fontSize: 38,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#fff",
                        fontSize: 26
                    }
                }
            };

            //create bar Chart class object Sassone 🗿
            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });

        });

        //reviews

        $(function() {
            //get the line chart canvas
            var cData = JSON.parse(`<?php echo $chart_dataReview; ?>`);
            var ctx = $("#line-chart");

            //line chart data
            var data = {
                labels: cData.labelReview,

                datasets: [{
                    label: 'My Reviews',
                    data: cData.dataReview,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Last Week Review",
                    fontSize: 38,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#fff",
                        fontSize: 26
                    }
                }
            };

            //create line Chart class object Sassone 🗿
            var chart2 = new Chart(ctx, {
                type: "line",
                data: data,
                options: options
            });
        });
    </script>
@endsection
