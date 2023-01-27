$(document).ready(function () {
    let href, group_id, groupDays;

    $('#group_id').select2({
        theme: "basic",
        dropdownParent: $('#creatGroupDayModal'),

    });


    $('#group_id').on('change', function () {

        href = $(this).data('href');
        group_id = $(this).val();

        $.ajax({
            url: href,
            data: {group_id},

            success: function (response) {
                groupDays = response.groupDays;
                
                if(groupDays)
                {
                    $('#day').selectpicker('val', groupDays.day);
                }
                else
                {
                    $('#day').selectpicker('val', []);
                }
            },
            error: function () {
            }
        });
    });
})
