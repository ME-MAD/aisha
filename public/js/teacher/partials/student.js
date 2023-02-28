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
                    <td>${syllabi.student_lesson.lesson.name}</td>
                    <td>${syllabi.from_chapter}</td>
                    <td>${syllabi.to_chapter}</td>
                    <td>${syllabi.from_page}</td>
                    <td>${syllabi.to_page}</td>
                    <td>${syllabi.to_page}</td>
                </tr>
            `)
        });

        $('#studentLessonModal').modal('show')

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