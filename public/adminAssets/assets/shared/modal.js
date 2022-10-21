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


//----------------------------Modal Lesson-----------------------------------//

//Edite Modal Lesson
function initEditeLessonModal() {
    $('.editLessonButton').on('click', function () {
        let lesson = $(this).data('lesson')
        console.log(lesson);
        let href = $(this).data('href')

        $('#editLessonForm #subject_id').val(lesson.subject_id)
        $('#editLessonForm #title').val(lesson.title)
        $('#editLessonForm #chapters_count').val(lesson.chapters_count)
        $('#editLessonForm #from_page').val(lesson.from_page)
        $('#editLessonForm #to_page').val(lesson.to_page)

        $('#editExperienceForm').attr('action', href)
    })
}


//----------------------------Modal Student-----------------------------------//

//Edite Modal Student
function initEditeStudentModal() {
    $('.editStudentButton').on('click', function () {
        let student = $(this).data('student')
        console.log(student);
        let href = $(this).data('href')

        $('#editStudentForm #name').val(student.name)
        $('#editStudentForm #birthday').val(student.birthday)
        $('#editStudentForm #phone').val(student.phone)
        $('#editStudentForm #qualification').val(student.qualification)

        $('#editStudentForm').attr('action', href)
    })
}


//----------------------------Modal Group Type-----------------------------------//

//Edite Modal Group Type
function initEditeGroupTypeModal() {
    $('.editGroupTypeButton').on('click', function () {
        let GroupType = $(this).data('grouptype')

        let href = $(this).data('href')

        $('#editGroupTypeForm #name').val(GroupType.name)
        $('#editGroupTypeForm #price').val(GroupType.price)
        $('#editGroupTypeForm #days_num').val(GroupType.days_num)


        $('#editGroupTypeForm').attr('action', href)
    })
}



//----------------------------Modal Group Days-----------------------------------//

//Edite Modal Group Days
function initEditeGroupDayModal() {
    $('.editGroupDayButton').on('click', function () {
        let GroupDay = $(this).data('groupday')
        console.log(GroupDay);
        let href = $(this).data('href')

        $('#editGroupDayForm #groupform').val(GroupDay.group.from)
        $('#editGroupDayForm #groupto').val(GroupDay.group.to)

        $('#editGroupDayForm #day').val(GroupDay.day)


        $('#editGroupDayForm').attr('action', href)


//----------------------------Modal Group -----------------------------------//

//Edite Modal Group 
function initEditeGroupModal() {
    $('.editGroupButton').on('click', function () {
        let Group = $(this).data('group')
        let href = $(this).data('href')

        $('#editGroupForm #from').val(Group.from)
        $('#editGroupForm #to').val(Group.to)
        $('#editGroupForm #teacherId').val(Group.teacher_id)
        $('#editGroupForm #groupTypeId').val(Group.group_type_id)
        $('#editGroupForm #ageType').val(Group.age_type)
        console.log(Group.age_type);


        $('#editGroupForm').attr('action', href)

    })
}