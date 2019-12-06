
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Orders Last 7 Days</h3>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <canvas id="last7dayChart" height="320"></canvas>
        <script>
        var MoneyFormatter = function(number){
            return new Intl.NumberFormat('vi-VN', {
                maximumSignificantDigits: Math.max(1, (+number).toString().length-2),
                style: 'currency',
                currency: 'VND',
                // currencyDisplay: '$',
            }).format(+number);
        }
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
        $(function () {
            var data = {!!json_encode(\App\Services\Analytics::last7day())!!}
            
            var unit = 1;
            var datasets = {}
            console.log(data)

            var chartData = {
                    labels: data
                        .filter((d)=>d.stat == 'Requested')
                        .map(function(d){
                            return d.label;
                        }),
                    datasets: [
                        {
                            // type: 'bar',
                            label: "Requested",
                            borderColor: window.chartColors.green,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.green,
                            data: data
                                .filter((d)=>d.stat == 'Requested')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        },{
                            // type: 'bar',
                            label: "Approved",
                            borderColor: window.chartColors.red,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.red,
                            data: data
                                .filter((d)=>d.stat == 'Approved')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        },{
                            // type: 'bar',
                            label: "Unpaid",
                            borderColor: window.chartColors.orange,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.orange,
                            data: data
                                .filter((d)=>d.stat == 'Unpaid')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        },{
                            // type: 'bar',
                            label: "Paid",
                            borderColor: window.chartColors.blue,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.blue,
                            data: data
                                .filter((d)=>d.stat == 'Paid')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        }, {
                            // type: 'bar',
                            label: "Done",
                            borderColor: window.chartColors.yellow,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.yellow,
                            data: data
                                .filter((d)=>d.stat == 'Done')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        },{
                            // type: 'bar',
                            label: "Canceled",
                            borderColor: window.chartColors.grey,
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.grey,
                            data: data
                                .filter((d)=>d.stat == 'Canceled')
                                .map(function(d){
                                    return +d.num;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        },
                    ]
                };
                var chartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        mode: 'label',
                        label: 'mylabel',
                    },
                    scales: {
                          xAxes: [{
                              ticks: {
                                  fontColor: '#111',
                                  
                              }
                          }],
                          yAxes: [{
                              ticks: {
                                  fontColor: '#111',
                              }
                          }]
                    },
                };
                var ctx = document.getElementById("last7dayChart").getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: chartData,
                    options: chartOptions
                });
        });

        </script>
    </div>
    <!-- /.box-body -->
</div>