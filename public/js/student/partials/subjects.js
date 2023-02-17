import {renderGroupDays} from "./groups.js"
import {handleShowingOfTheBook, handleOpenPageClick} from "./book.js"
import {renderLessonsHtml} from "./lesson.js"

// let groupStudentsContainer = $('#groupStudentsContainer')
// let studentId = $('#studentProfileContainer').data('student-id')
// let groupStudents = null
// let subjects = null


export function mainStudentShowRun(){
    
    let groupStudentsContainer = $('#groupStudentsContainer')
    $.ajax({
        url: groupStudentsContainer.data('href'),
        success: function (response) {

            let groupStudents = response.groupStudents
            let subjects = response.subjects

            groupStudents.forEach(groupStudent => {
                groupStudentsContainer.append(`
                    <div id="groupStudentContainer${groupStudent.id}"></div>
                `)
                renderSubjectsForEachGroup(groupStudent, subjects)

            });
        },
        error: function () { }
    })
}


function renderSubjectsForEachGroup(groupStudent, subjects)
{
    $(`#groupStudentContainer${groupStudent.id}`).html('')
    
    renderGroupDays(groupStudent)

    renderSubjects(groupStudent,subjects)

    handleOnClickSubject(groupStudent, subjects)
}


function handleOnClickSubject(groupStudent, subjects)
{

    let studentId = $('#studentProfileContainer').data('student-id')
    $(`.subjectContainer${groupStudent.id}`).on('click',function(){


        let subject = getSubjectById(subjects ,$(this).data('subject-id'))
        let groupId = groupStudent.group_id


        renderLessonsHtml(subject, groupId, studentId, groupStudent)


        handleShowingOfTheBook(1 , subject)


        handleOpenPageClick(subject)


        $(`#backToSubjects${groupStudent.id}`).on('click',function(){

            mainStudentShowRun()

        })
    })
}



function renderSubjects(groupStudent,subjects)
{
    let subjectsElements = ''

    subjects.forEach(subject => {
        subjectsElements += `
            <div class="col-4 mb-4 subjectContainer${groupStudent.id}" data-subject-id="${subject.id}">
                <div class="card component-card_1" style="height:280px">
                    <div class="d-flex flex-column card-body justify-content-between">
                        <h5 class="card-title text-center">
                                ${subject.name}
                        </h5>
                        <img src="${subject.avatar}" alt=""
                            class="avatar-image rounded mx-auto d-block">
                        <div class="btn btn-primary rounded mx-auto d-block mt-2">
                            Lessson Count <span
                                class="badge badge-light">${subject.lessons.length}</span>
                        </div>
                    </div>
                </div>
            </div>
        `
    });

    $(`#groupStudentContainer${groupStudent.id}`).append(`
        <div class="row" id="subjectsContainer${groupStudent.id}">
            ${subjectsElements}
        </div>
    `)
}


function getSubjectById(subjects, subject_id)
{
    return subjects.filter( subject => subject.id == subject_id)[0]
}