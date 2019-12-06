
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Going Cash</h3>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <canvas id="last12MonthChart" height="320"></canvas>
        <script>
        var MoneyFormatter = function(number){
            return new Intl.NumberFormat('vi-VN', {
                maximumSignificantDigits: Math.max(1, (+number).toString().length-2),
                style: 'currency',
                currency: 'VND',
                // currencyDisplay: '$',
            }).format(+number);
        }
        $(function () {
            var data = {!!json_encode($data)!!}
            
            var unit = 1;
            var chartData = data.map(function(d){
                if(+d.total>1000 && unit<1000){
                    unit = 1000
                }
                if(+d.total>1000000 && unit<1000000){
                    unit = 1000000
                }
                return +d.total;
            })

            var lineData = {
                    labels: data.map(function(d){
                        return d.label;
                    }),
                    datasets: [
                        {
                            label: "Cash",
                            borderColor: '#2196F3',
                            pointBackgroundColor: "#2196F3",
                            pointBorderColor: "#2196F3",
                            data: chartData,
                            borderWidth: 2,
                            pointBorderWidth: 1,
                            fill: false,
                            //lineTension: .1
                        }
                    ]
                };
                var lineOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
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
                              ticks: {
                                  fontColor: '#111',
                                  
                              }
                          }],
                          yAxes: [{
                              ticks: {
                                  fontColor: '#111',
                                  callback: function(label, index, labels) {
                                      return MoneyFormatter(label);
                                  }
                              }
                          }]
                    },
                };
                var ctx = document.getElementById("last12MonthChart").getContext('2d');
                new Chart(ctx, {type: 'line', data: lineData, options: lineOptions}); 
        });

        </script>
    </div>
    <!-- /.box-body -->
</div>