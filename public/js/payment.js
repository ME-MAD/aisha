
let createcheckbox = document.getElementsByClassName('paid_finished_checkbox');

for (let element of createcheckbox) {
    element.addEventListener('change', function (event) {
        let href = $(this).data('href');
        let student = $(this).data('student');
        let group = $(this).data('group');
        let amount = $(this).data('amount');

        let monthCreatePayment = $(element).parent()
            .parent().parent()
            .parent().parent()
            .parent().parent()
            .find("#month")
            .val()

        let monthShowGroup = $(element).parent()
            .parent().parent()
            .parent().parent()
            .parent().parent()
            .parent()
            .find("#month")
            .val()


        // Create Payment
        if (element.checked == true) {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthCreatePayment,
                    paid: true
                },
                success: function (response) {
                    Swal.fire(
                        'Success!',
                        `The month has been paid successfully !`,
                        'success'
                    )
                },
                error: function (response) {
                    month == null ? $(`.paid_finished_checkbox`).prop('checked', false) : '';
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}mohamed sharaf`,
                        'error'
                    )
                }
            })
        } else {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthCreatePayment,
                    paid: false
                },
                success: function (response) {
                    Swal.fire(
                        'Success!',
                        `The month's payment has been cancelled !`,
                        'success'
                    )
                },
                error: function (response) {
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}`,
                        'error'
                    )
                }
            })
        }




        // Show Group Paymetn
        if (element.checked == true) {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthShowGroup,
                    paid: true
                },
                success: function (response) {
                    Swal.fire(
                        'Success!',
                        `The month has been paid successfully !`,
                        'success'
                    )
                },
                error: function (response) {
                    month == null ? $(`.paid_finished_checkbox`).prop('checked', false) : '';
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}mohamed sharaf`,
                        'error'
                    )
                }
            })
        } else {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthShowGroup,
                    paid: false
                },
                success: function (response) {
                    Swal.fire(
                        'Success!',
                        `The month's payment has been cancelled !`,
                        'success'
                    )
                },
                error: function (response) {
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}`,
                        'error'
                    )
                }
            })
        }
    })
}




$(".month").change(function () {
    $(`.paid_finished_checkbox`).prop('checked', false);

    let monthCreatePayment = $(this).val();
    let group = $(this).data('group');
    let href = $(this).data('href');
    $.ajax({
        url: href,
        data: {
            month: monthCreatePayment,
            group_id: group,
        },
        success: function (response) {
            response.payments.forEach(payment => {
                if (payment.paid == 1) {
                    student_id = $(`#paid_finished_checkbox_${payment.student_id}_${payment.group_id}`).data('student');
                    if (student_id == payment.student_id) {
                        console.log(student_id);
                        $(`#paid_finished_checkbox_${payment.student_id}_${payment.group_id}`).prop('checked', true);
                    }
                }
            });
        },
        error: function () { }
    })
});

