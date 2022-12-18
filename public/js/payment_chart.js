const csrfToken = $('meta[name="csrf-token"]').attr('content')

function GetMonthlyPaymentsThisYear(year = null) {

    url = $('#paymentsThisMonthContainer').data('href');
    //Start ajax
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: csrfToken,
            year: year,
        },
        success: function (response) {
            //Start function success
            //----------------------------------------------------------

            const months = response.months;
            const values = response.values;
            const years = response.years;
            const thisYear = response.thisYear;


            //---------------------------------
            //Start append buttons content
            let allBtnYears = ``;
            years.forEach((item) => {
                allBtnYears += `<button type="button" class="btn ${(item.year == thisYear) ? 'btn-primary' : 'btn-outline-primary'} buttonPaymentsThisYearsChart" data-year="${item.year}">
                                ${item.year}
                            </button>`

            });


            $('#btns-years-container').html(`<div>
                                                ${allBtnYears}
                                            </div>`);
            //End append buttons content
            //---------------------------------


            //---------------------------------
            //Start append payments Chart
            const ctx = document.getElementById('paymentsThisMonthChart');


            var myChart = new Chart(ctx, {
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

            //End append payments Chart
            //---------------------------------


            //---------------------------------
            //Start Get Payments This Years
            $('.buttonPaymentsThisYearsChart').on('click', function () {
                myChart.destroy()
                GetMonthlyPaymentsThisYear($(this).data('year'))
            })
            //End Get Payments This Years
            //---------------------------------


            //----------------------------------------------------------
            //End function success
        },
        error: function () {

        }
    })
    //End ajax
}

GetMonthlyPaymentsThisYear()


