import * as echarts from 'echarts';

export function groupPaymentChartRun()
{
    $.get($('#paymentsThisMonthContainerGroup').data('href'), function (response) {

        const months = response.months;
        const values = response.values;
    
        var chartDom = document.getElementById('paymentsThisMonthChartOnGroupShow');
            var myChart = echarts.init(chartDom);
            var option;
    
            option = {
                title: {
                    // text: 'Total Count ' + response.totalPayments,
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
    
    });
}

groupPaymentChartRun()





