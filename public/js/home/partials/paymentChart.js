export function totalPaymentsChartRun()
{
    let url = $('#totalPaymentsChart').data('href');

    console.log(url);
    let aspectRatio = 5;

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

            const ctx = document.getElementById('totalPaymentsChartCanva');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: '# of Votes',
                        data: values,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                }
            });

            if(window.innerWidth <= 970)
            {
                $('#totalPaymentsChartCanvaParent').height('450px')
                myChart._aspectRatio = 1 / 1
            }
        },
        error: function () {
            
        }
    })
}