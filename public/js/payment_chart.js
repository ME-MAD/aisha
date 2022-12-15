$.get($('#paymentsThisMonthContainer').data('href'), function (response) {

    console.log(response);
    const months = response.months;
    const values = response.values;

    const ctx = document.getElementById('paymentsThisMonthChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: '# of Votes',
                data: values,
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
