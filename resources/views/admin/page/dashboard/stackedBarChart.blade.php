
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Orders Sumary</h3>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <canvas id="stackedBarChart" height="320"></canvas>
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
            var data = {!!json_encode(\App\Services\Analytics::last12Month2())!!}
            
            var unit = 1;
            var datasets = {}
            console.log(data)

            var chartData = {
                    labels: data
                        .filter((d)=>d.stat == 'Pending')
                        .map(function(d){
                            return d.label;
                        }),
                    datasets: [
                        {
                            // type: 'bar',
                            label: "Done",
                            // borderColor: '#2196F3',
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.green,
                            data: data
                                .filter((d)=>d.stat == 'Done')
                                .map(function(d){
                                    return +d.total;
                                }),
                            borderWidth: 1,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        }, {
                            // type: 'bar',
                            label: "Pending",
                            // borderColor: '#2196F3',
                            // pointBackgroundColor: "#2196F3",
                            // pointBorderColor: "#2196F3",
                            backgroundColor: window.chartColors.yellow,
                            data: data
                                .filter((d)=>d.stat == 'Pending')
                                .map(function(d){
                                    return +d.total;
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
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = (data.datasets[tooltipItem.datasetIndex].label)
                                var value = +(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                                return label + ':' + MoneyFormatter(value);
                            }, 
                        },
                    },
                    scales: {
                          xAxes: [{
                            stacked: true,
                              ticks: {
                                  fontColor: '#111',
                                  
                              }
                          }],
                          yAxes: [{
                            stacked: true,
                              ticks: {
                                  fontColor: '#111',
                                  callback: function(label, index, labels) {
                                      return MoneyFormatter(label);
                                  }
                              }
                          }]
                    },
                };
                var ctx = document.getElementById("stackedBarChart").getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: chartOptions
                });
        });

        </script>
    </div>
    <!-- /.box-body -->
</div>