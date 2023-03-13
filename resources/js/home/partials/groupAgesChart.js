import {init} from 'echarts';

export function groupAgesChartRun()
{

    $.get($('#groupAgesChart').data('href'), function (response) { // admin.group.groupAgesChartData

        const data = response.data;
        
        var chartDom = document.getElementById('groupAgesChartCanvaParent');
        var myChart = init(chartDom);
        var option;
        
        option = {
            title: {
                text:response.allGroupsCount,
                // subtext: 'Fake Data',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
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

