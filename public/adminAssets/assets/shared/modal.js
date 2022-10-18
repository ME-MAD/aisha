// Edit Experince
$('.editExperienceButton').on('click', function () {
    let title = $(this).data('title')
    let date = $(this).data('date')
    let href = $(this).data('href')

    $('#editExperienceForm #title').val(title)
    $('#editExperienceForm #editDateExperience').val(date)

    $('#editExperienceForm').attr('action', href)
})





// Edit Syllabus
$('.editSyllabusButton').on('click', function () {
    let syllabus_id = $(this).data('syllabusid')
    let lesson_new = $(this).data('lessonnew')
    let lesson_old = $(this).data('lessonold')
    let is_reverse = $(this).data('isreverse')
    let href = $(this).data('href')


    $('#editSyllabusForm #syllabus_id').val(syllabus_id)
    $('#editSyllabusForm #new_lesson').val(lesson_new)
    $('#editSyllabusForm #old_lesson').val(lesson_old)
    $('#editSyllabusForm #is_reverse').val(is_reverse)

    $('#editSyllabusForm').attr('action', href)

})




// Edit Lessons
$('.progressOfSubjectLink').on('click', function () {
    let chapters_count = $(this).data('chapterscount')
    let group_id = $(this).data('groupid')
    let lesson_id = $(this).data('lessonid')
    let finishedChaptersCount = $(this).data('finishedchapterscount')



    $('#showSubjectForm #max_chapters').val(chapters_count)
    $("#showSubjectForm #chapters_count").attr({
        "max": chapters_count,
        "min": 0,
        "value": finishedChaptersCount
    })
    $('#showSubjectForm #group_id').val(group_id)
    $('#showSubjectForm #lesson_id').val(lesson_id)



})


//----------------------------Modal Teacher-----------------------------------//

//Edite Modal Teacher
function initEditeTeacherModal() {
    $('.editTeacherButton').on('click', function () {
        let teacher = $(this).data('teacher')
        let href = $(this).data('href')


        $('#editTeacherForm #name').val(teacher.name)
        $('#editTeacherForm #birthday').val(teacher.birthday)
        $('#editTeacherForm #phone').val(teacher.phone)
        $('#editTeacherForm #qualification').val(teacher.qualification)

        $('#editTeacherForm').attr('action', href)

    })
}




//----------------------------Modal Experience-----------------------------------//

//Edite Modal Experience
function initEditeExperienceModal() {
    $('.editExperienceButton').on('click', function () {
        let experience = $(this).data('experience')
        let date = $(this).data('date')
        let href = $(this).data('href')

        $('#editExperienceForm #title').val(experience.title)
        $('#editExperienceForm #date').val(date)
        $('#editExperienceForm #teacherId').val(experience.teacher_id)

        $('#editExperienceForm').attr('action', href)
    })
}