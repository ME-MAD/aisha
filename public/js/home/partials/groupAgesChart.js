
export function groupAgesChartRun()
{
    $.get($('#groupAgesChart').data('href'), function (response) {

        const kid = response.groupKidsCount;
        const adult = response.groupAdultCount;
    
        const ctx = document.getElementById('groupAgesChartCanva');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    response.words.group_kids_count,
                    response.words.group_adult_count,
                ],
                datasets: [{
                    label: 'Count is ',
                    data: [kid, adult],
                    backgroundColor: [
                        '#e07be0',
                        '#420039'
                    ]
                }]
            },
            options: {}
        });
    
    });
}