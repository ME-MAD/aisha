$('.editExperienceButton').on('click', function () {
    let title = $(this).data('title')
    let date = $(this).data('date')
    let href = $(this).data('href')

    $('#editExperienceForm #title').val(title)
    $('#editExperienceForm #editDateExperience').val(date)

    $('#editExperienceForm').attr('action', href)
})
