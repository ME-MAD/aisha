export function getStudentsTableHtml(students)
{
    let studentsGroupStudentsHtml = '';

    students.forEach(student => {
        studentsGroupStudentsHtml += `
            <tr>
                <td>${student.id}</td>
                <td>
                    <a class='text-primary'
                        href="/admin/student/show/${student.id}"
                        title='Enter Page show Student'>${student.name}
                    </a>
                </td>
                <td>
                    ${student.phone}</td>
                <td class="text-primary showStudentLessonButton" data-student-id="${student.id}">
                    <i class='fa-solid fa-eye' role="button"></i>
                </td>
                <td class="text-success addStudentLessonButton" data-student-id="${student.id}">
                    <i class="fa-solid fa-square-plus" role="button"></i>
                </td>
            </tr>
        `
    });

    

    return studentsGroupStudentsHtml;
}

export function handleStudentLessonModal(groups)
{
    $('.showStudentLessonButton').click(function(){

        let studentId = $(this).data('student-id')

        let student = getStudentFromGroups(groups, studentId);

        $('#studentLessonTableBody').html('')
        student.syllabus.forEach(syllabi => {
            $('#studentLessonTableBody').append(`
                <tr>
                    <td>${syllabi.student_lesson.lesson.title}</td>
                    <td>${syllabi.from_chapter}</td>
                    <td>${syllabi.to_chapter}</td>
                    <td>${syllabi.from_page}</td>
                    <td>${syllabi.to_page}</td>
                    <td style="width:200px">
                        <select class="form-control" name="rate" id="rate">
                            <option value="">اختر التقييم</option>
                        </select>
                    </td>
                    <td>${syllabi.to_page}</td>
                </tr>
            `)
        });

        $('#studentLessonModal').modal('show')

    })
}

// "from_chapter" => "0"
// "to_chapter" => "10"
// "from_page" => "19"
// "to_page" => "20"
// "student_lesson_id" => null
// "student_id" => "21"
// "group_id" => "4"
// "lesson_id" => "206"


export function handleAddStudentLessonModal(groups)
{
    $('.addStudentLessonButton').click(function(){

        let studentId = $(this).data('student-id')
        let group = getStudentGroupFromGroups(groups, studentId);

        emptyNewLessonModal()
        renderSubjectsInSelect(group)
        handleSubjectSelectChange(group)
        handleLessonSelectChange(group)

        $('.subject_create').select2({
            dropdownParent: $('#addStudentLessonModal'),
        });

        $('.lesson_create').select2({
            dropdownParent: $('#addStudentLessonModal'),
        });

        
        addNewLessonHandler(group, studentId)


        $('#addStudentLessonModal').modal('show')

    })
}

function getStudentFromGroups(groups, studentId)
{
    let myStudent = null;
    groups.forEach(group => {
        group.students.forEach(student => {
            if(student.id == studentId)
            {
                myStudent = student;
            }
        });
    });

    return myStudent;
}

function getSubjectFromGroup(group,subject_id)
{
    let mySubject = null;
    group.subjects.forEach(subject => {
        if(subject.id == subject_id)
        {
            mySubject = subject;
        }
    });

    return mySubject;
}


function getLessonFromSubject(subject,lesson_id)
{
    let myLesson = null;
    subject.lessons.forEach(lesson => {
        if(lesson.id == lesson_id)
        {
            myLesson = lesson;
        }
    });

    return myLesson;
}


function getStudentGroupFromGroups(groups, studentId)
{
    let myGroup = null;
    groups.forEach(group => {
        group.students.forEach(student => {
            if(student.id == studentId)
            {
                myGroup = group;
            }
        });
    });

    return myGroup;
}

function renderSubjectsInSelect(group) 
{
    group.subjects.forEach(subject => {
        $('#addStudentLessonModal #subject_id').append(`
            <option value="${subject.id}">${subject.name}</option>
        `)
    });
}

function handleSubjectSelectChange(group)
{
    $('#addStudentLessonModal #lesson_id').change(function(){
        let subject  = getSubjectFromGroup(group, $('#addStudentLessonModal #subject_id').val() )
        let lesson  = getLessonFromSubject(subject, $(this).val() )

        if(lesson)
        {
            $('#addStudentLessonModal #lesson_from_page').html(lesson.from_page)
            $('#addStudentLessonModal #lesson_to_page').html(lesson.to_page)
            $('#addStudentLessonModal #lesson_chapters_count').html(lesson.chapters_count)
        }
        else
        {
            $('#addStudentLessonModal #lesson_id').html(
                `<option val=''>اختر الدرس</option>`
            )
            $('#addStudentLessonModal #lesson_from_page').html(0)
            $('#addStudentLessonModal #lesson_to_page').html(0)
            $('#addStudentLessonModal #lesson_chapters_count').html(0)
        }
       
    })
}


function handleLessonSelectChange(group)
{
    $('#addStudentLessonModal #subject_id').change(function(){
        let subject  = getSubjectFromGroup(group, $(this).val() )

        if(subject)
        {
            subject.lessons.forEach(lesson => {
                $('#addStudentLessonModal #lesson_id').append(`
                    <option value="${lesson.id}">${lesson.title}</option>
                `)
            });
        }
        else
        {
            $('#addStudentLessonModal #lesson_id').html(
                `<option val=''>اختر الدرس</option>`
            )
        }
       
    })
}

function addNewLessonHandler(group, studentId)
{
    $('#addStudentLessonModalForm').submit(function(e){
        e.preventDefault();
        let from_chapter = $('#addStudentLessonModalForm #from_chapter').val()
        let to_chapter = $('#addStudentLessonModalForm #to_chapter').val()
        let from_page = $('#addStudentLessonModalForm #from_page').val()
        let to_page = $('#addStudentLessonModalForm #to_page').val()
        let lesson_id = $('#addStudentLessonModalForm #lesson_id').val()

        $.ajax({
            url: $(this).data('href'),
            type: "POST",
            data: {
               from_chapter,
               to_chapter,
               from_page,
               to_page,
               student_id: studentId,
               group_id: group.id,
               lesson_id
            },
            success: function(response) {
                $('#addStudentLessonModal').modal('hide')
                if(response.status == 200)
                {
                    Swal.fire(
                        'Success!7',
                        `Finished Successfully !`,
                        'success',
                    )

                    emptyNewLessonModal()
                }
                else if(response.status == 400)
                {
                    Swal.fire(
                        'Warning!',
                        `Student Didn't Finish The Last Lesson!`,
                        'warning',
                    )

                    emptyNewLessonModal()
                }
            },
            error: function(res) {
                let errors = '';

                res.responseJSON.errors.forEach(errorArray => {
                    errors += `
                        <p class="text-danger py-1"> ${errorArray[0]} </p>
                        <hr>
                    `
                });
                Swal.fire(
                    'Error!',
                    `${errors}`,
                    'error',
                )
            }
        })
    })
}

function emptyNewLessonModal()
{
    $('#addStudentLessonModal #from_chapter').val('')
    $('#addStudentLessonModal #to_chapter').val('')
    $('#addStudentLessonModal #from_page').val('')
    $('#addStudentLessonModal #to_page').val('')
    $('#addStudentLessonModal #lesson_id').html(
        `<option val=''>اختر الدرس</option>`
    )
    $('#addStudentLessonModal #subject_id').html(
        `<option val=''>اختر المادة</option>`
    )
}