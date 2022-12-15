$.get('/api/chart/payments', function (data) {

    const month = data.paymentsChart;

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    month['January'],
                    month['February'],
                    month['March'],
                    month['April'],
                    month['May'],
                    month['June'],
                    month['July'],
                    month['August'],
                    month['September'],
                    month['October'],
                    month['November'],
                    month['December']
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });



});
