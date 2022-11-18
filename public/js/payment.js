
let createcheckbox = document.getElementsByClassName('paid_finished_checkbox');

for (let element of createcheckbox) {
    element.addEventListener('change', function (event) {
        let href = $(this).data('href');
        let student = $(this).data('student');
        let group = $(this).data('group');
        let amount = $(this).data('amount');

        let month = $(element).parent()
            .parent().parent()
            .parent().parent()
            .parent().parent()
            .find(".month")
            .val()


        if (element.checked == true) {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: month,
                    paid: true
                },
                success: function (response) {

                },
                error: function () { }
            })
        } else {
            $.ajax({
                url: href,
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: month,
                    paid: false
                },
                success: function (response) {

                },
                error: function () { }

            })
        }
    })
}




$(".month").change(function () {
    $(`.paid_finished_checkbox`).attr('checked', false);
    let month = $(this).val();
    let group = $(this).data('group');
    let href = $(this).data('href');
    $.ajax({
        url: href,
        data: {
            month: month,
            group_id: group,
        },
        success: function (response) {
            console.log(response.payment);
            response.payment.forEach(element => {
                if (element.paid == 1) {
                    student_id = $(`#paid_finished_checkbox_${element.student_id}_${element.group_id}`).data('student');
                    if (student_id == element.student_id) {
                        $(`#paid_finished_checkbox_${element.student_id}_${element.group_id}`).attr('checked', true);
                    }
                }
            });
            // $(`.paid_finished_checkbox`).attr('checked', false);
        },
        error: function () { }
    })
});

