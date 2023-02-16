import * as echarts from 'echarts';

export function groupAgesChartRun()
{

    $.get($('#experiences_chart').data('href'), function (response) {

        const data = response.data;
        
        var chartDom = document.getElementById('experiencesChartCanva');
        var myChart = echarts.init(chartDom);
        var option;
        console.log(data);
        
        option = {
            title: {
                // text: 'Total Count ',
                // subtext: 'Fake Data',
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [
                {
                name: 'Access From',
                type: 'pie',
                radius: '50%',
                data: data,
                emphasis: {
                    itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
                }
            ]
        };
        
        option && myChart.setOption(option);
    
    });
}

groupAgesChartRun()