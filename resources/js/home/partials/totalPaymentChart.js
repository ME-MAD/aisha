import {init} from 'echarts';

export function totalPaymentsChartRun()
{

    let url = $('#totalPaymentsChart').data('href');

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const months = response.months;
            const values = response.values;
            const totalPayments = response.totalPayments;

            var chartDom = document.getElementById('totalPaymentsChartCanvaParent');
            var myChart = init(chartDom);
            var option;
        
            option = {
                title: {
                    text: 'Total Count ' + response.totalPayments,
                    // subtext: 'Fake Data',
                    left: 'left'
                },
                legend: {
                    left: "right",
                    orient: 'vertical',
                },
                xAxis: {
                    type: 'category',
                    data: months,
                    axisLabel: {
                        rotate: 45
                    },
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                    name: "payments",
                    data: values,
                    type: 'bar',
                    showBackground: true,
                    backgroundStyle: {
                        color: 'rgba(180, 180, 180, 0.2)'
                    }
                    }
                ]
            };
        
            option && myChart.setOption(option);
        },
        error: function () {
            
        }
    })

   
}


