$(document).ready(function () {
    let href, group_id, groupDays, days, option;

    $('#group_id').select2({
        theme: "basic",
        dropdownParent: $('#creatGroupDayModal'),

    });


    const selectDays = $('#day').select2({

        tags: true,
        multiple: true,
        closeOnSelect: false,
        dropdownParent: $('#creatGroupDayModal'),
        allowClear: true,
    });


    $('#group_id').on('change', function () {

        href = $(this).data('href');
        group_id = $(this).val();

        $.ajax({
            url: href,
            data: {group_id},

            success: function (response) {
                groupDays = response.groupDays;

                for (let i = 0; i < groupDays.length; i++) {
                    days = groupDays[i].day;
                }

                for (let i = 0; i < days.length; i++) {
                    option = new Option(days[i], response.id, false, true);
                    selectDays.append(option).trigger('change');
                }
            },
            error: function () {
            }
        });
        selectDays.val(option).trigger('change');

    });


})
