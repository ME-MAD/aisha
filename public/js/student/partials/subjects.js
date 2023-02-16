import {renderGroupDays} from "./groups.js"
import {handleShowingOfTheBook} from "./book.js"
import {StudentLesson} from "./StudentLesson.js"

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
    let studentId = $('#studentProfileContainer').data('student-id')

    $(`#groupStudentContainer${groupStudent.id}`).html('')
    
    renderGroupDays(groupStudent)

    renderSubjects(groupStudent,subjects)

    let subjectsContainer = $(`#subjectsContainer${groupStudent.id}`)

    $(`.subjectContainer${groupStudent.id}`).on('click',function(){


        let subject = getSubjectById(subjects ,$(this).data('subject-id'))
        let groupId = groupStudent.group_id
        let lessonsElements = ''


        handleShowingOfTheBook(1 , subject)


        subject.lessons.forEach(lesson => {
           
            let studentLesson = new StudentLesson(lesson, groupId, studentId)

            console.log(studentLesson.getNextLesson());


            let studentFinishedChaptersCount = studentLesson ? studentLesson.last_chapter_finished : 0
            let studentFinishedChaptersPercentage = studentLesson ? studentLesson.percentage : 0
            let studentLessonIsFinished = studentLesson ? studentLesson.finished : false
            let studentLessonLastPageFinished = studentLesson ? studentLesson.last_page_finished : 0


            let studentLessonReview = studentLesson?.student_lesson_review

            let nextLessonReview = studentLessonReview?.syllabus_reviews.filter(syllabusReview => syllabusReview.finished == 0)[0]

            let studentFinishedChaptersCountReview = studentLessonReview ? studentLessonReview.last_chapter_finished : 0
            let studentFinishedChaptersPercentageReview = studentLessonReview ? studentLessonReview.percentage : 0
            let studentLessonIsFinishedReview = studentLessonReview ? studentLessonReview.finished : false
            let studentLessonLastPageFinishedReview = studentLessonReview ? studentLessonReview.last_page_finished : 0

            lessonsElements += `
                <div class="studentLessonMainContainer borderPrimary">
                    <div class="rotate-inner">


                        <div class="studentLessonContainer">
                            <button class="btn btn-success goToReviewButton">
                                Go To Review
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            </button>

                            <h2 class="text-center text-primary my-5">${lesson.title}</h2>

                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <span>
                                    Lesson Is From Page : <span class="badge bg-primary">${lesson.from_page}</span>
                                    To Page : <span class="badge bg-primary">${lesson.to_page}</span>
                                </span>
                                <span>
                                    <a href="${studentLesson.getStudentLessonShowUrl()}" class="btn btn-outline-warning text-dark ${studentLesson.getStudentLessonShowUrl() == "#" ? 'd-none' : ''}" target="_blank">
                                        Show Progress
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3 align-items-center">
                                <span class="badge badge-success studentFinishedChaptersCountElement">
                                    ${studentFinishedChaptersCount}
                                </span>

                                <label class="switch s-icons s-outline  s-outline-success">
                                    <input
                                        type="checkbox"
                                        class="lesson_finished_checkbox"
                                        data-group-id="${groupId}"
                                        data-lesson-id="${lesson.id}"
                                        data-student-id="${studentId}"
                                        data-chapters-count="${lesson.chapters_count}"
                                        data-last-page-finished="${lesson.to_page}"
                                        ${studentLessonIsFinished ? 'checked' : ''}
                                    >
                                    <span class="slider"></span>
                                </label>

                                <span class="badge badge-secondary">
                                    ${lesson.chapters_count}
                                </span>
                            </div>

                            <a class="progressOfSubjectLink subject" data-toggle="modal" data-target="#createSubjectModal"
                                data-chapterscount="${lesson.chapters_count}"
                                data-finishedchapterscount="${studentFinishedChaptersCount}"
                                data-groupid="${groupId}" data-lessonid="${lesson.id}"
                                data-studentid="${studentId}">
                                <div class="progress br-30">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        aria-valuenow="${studentFinishedChaptersPercentage}"
                                        style="width:${studentFinishedChaptersPercentage}%"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-title">
                                            <span class="progress-bar-percentage">
                                                ${studentFinishedChaptersPercentage}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <div class="row">
                                <div class="p-3 text-center col" style="font-size:1.5rem;">
                                    <div class="mb-4">
                                        Last Page Finished : <span class="badge bg-success studentLessonLastPageFinishedElement">${studentLessonLastPageFinished}</span>
                                        <span class="btn btn-outline-info openStudentLastPageFinishedElement" data-last-page-finished="${studentLessonLastPageFinished}">
                                            <i class="fa-solid fa-book-open"></i>
                                        </span>
                                    </div>

                                    <div class="${studentLesson.getNextLesson() ? '' : 'd-none'} newLessonContainerElement">
                                        <div class="mb-3">
                                            <span>
                                                <span>Next Lesson Is From Chapter</span>
                                                <span class="badge bg-info nextLessonFromChapter">
                                                    ${studentLesson.getNextLessonFromChapter()}
                                                </span>
                                                <span>To Chapter</span>
                                                <span class="badge bg-info nextLessonToChapter">${studentLesson.getNextLessonToChapter()}</span>
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <span>
                                                <span>Next Lesson Is From Page</span>
                                                <span class="badge bg-info nextLessonFromPage" data-last-page-finished="${studentLesson.getNextLesson()?.from_page || null}">
                                                    <span>${studentLesson.getNextLesson()?.from_page || 0}</span>
                                                    <i class="fa-solid fa-book-open"></i>
                                                </span>
                                                <span>To Page</span>
                                                <span class="badge bg-info nextLessonToPage" data-last-page-finished="${studentLesson.getNextLesson()?.to_page || null}">
                                                    <span>${studentLesson.getNextLesson()?.to_page || 0}</span>
                                                    <i class="fa-solid fa-book-open"></i>
                                                </span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control newLessonRate ${studentLesson.getNextLesson() ? '' : 'd-none'}">
                                            <option value="excellent"> excellent </option>
                                            <option value="very good"> very good </option>
                                            <option value="good"> good </option>
                                            <option value="fail"> fail </option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary newLessonButton ${studentLesson.getNextLesson() ? 'd-none' : ''}" data-student-lesson-id="${studentLesson ? studentLesson.id : null}" data-group-id="${groupId}" data-lesson-id="${lesson.id}" data-last-page-finished="${studentLesson?.last_page_finished}" data-last-chapter-finished="${studentLesson?.last_chapter_finished}">New Lesson</button>

                                        <button class="btn btn-info finishNewLessonButton ${studentLesson.getNextLesson() ? '' : 'd-none'}" data-syllabi-id=${studentLesson.getNextLesson()?.id || null}>
                                            Finish New Lesson
                                            <i class="fa-solid fa-square-check"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>












                        <div class="studentLessonContainerReview">

                            <button class="btn btn-dark goToLessonButton">
                                Go To Lesson
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            </button>

                            <h2 class="text-center text-success my-5">${lesson.title}</h2>

                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <span>
                                    Lesson Is From Page : <span class="badge bg-primary">${lesson.from_page}</span>
                                    To Page : <span class="badge bg-primary">${lesson.to_page}</span>
                                </span>
                                <span>
                                    <a href="${studentLesson.getStudentLessonShowUrl()}" class="btn btn-outline-warning text-dark ${studentLesson.getStudentLessonShowUrl() == "#" ? 'd-none' : ''}" target="_blank">
                                        Show Progress
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3 align-items-center">
                                <span class="badge badge-success StudentFinishedChaptersCountElementReview">
                                    ${studentFinishedChaptersCountReview}
                                </span>

                                <label class="switch s-icons s-outline  s-outline-success">
                                    <input
                                        type="checkbox"
                                        class="lesson_finished_checkbox_review"
                                        data-group-id="${groupId}"
                                        data-lesson-id="${lesson.id}"
                                        data-student-id="${studentId}"
                                        data-chapters-count="${lesson.chapters_count}"
                                        data-last-page-finished="${lesson.to_page}"
                                        ${studentLessonIsFinishedReview ? 'checked' : ''}
                                    >
                                    <span class="slider"></span>
                                </label>

                                <span class="badge badge-secondary">
                                    ${lesson.chapters_count}
                                </span>
                            </div>

                            <a class="progressOfSubjectLink subject" data-toggle="modal" data-target="#createSubjectModal"
                                data-chapterscount="${lesson.chapters_count}"
                                data-finishedchapterscount="${studentFinishedChaptersCountReview}"
                                data-groupid="${groupId}" data-lessonid="${lesson.id}"
                                data-studentid="${studentId}">
                                <div class="progress br-30">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        aria-valuenow="${studentFinishedChaptersPercentageReview}"
                                        style="width:${studentFinishedChaptersPercentageReview}%"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-title">
                                            <span class="progress-bar-percentage">
                                                ${studentFinishedChaptersPercentageReview}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <div class="row">
                                <div class="p-3 text-center col" style="font-size:1.5rem;">
                                    <div class="mb-4">
                                        Last Page Finished : <span class="badge bg-success studentLessonLastPageFinishedElementReview">${studentLessonLastPageFinishedReview}</span>
                                        <span class="btn btn-outline-info openStudentLastPageFinishedElementReview" data-last-page-finished="${studentLessonLastPageFinishedReview}">
                                            <i class="fa-solid fa-book-open"></i>
                                        </span>
                                    </div>

                                    <div class="${nextLessonReview ? '' : 'd-none'} newLessonContainerElementReview">
                                        <div class="mb-3">
                                            <span>
                                                <span>Next Lesson Is From Chapter</span>
                                                <span class="badge bg-info nextLessonFromChapterReview">
                                                    ${nextLessonReview?.from_chapter || 0}
                                                </span>
                                                <span>To Chapter</span>
                                                <span class="badge bg-info nextLessonToChapterReview">${nextLessonReview?.to_chapter || 0}</span>
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <span>
                                                <span>Next Lesson Is From Page</span>
                                                <span class="badge bg-info nextLessonFromPageReview" data-last-page-finished="${nextLessonReview?.from_page || null}">
                                                    <span>${nextLessonReview?.from_page || 0}</span>
                                                    <i class="fa-solid fa-book-open"></i>
                                                </span>
                                                <span>To Page</span>
                                                <span class="badge bg-info nextLessonToPageReview" data-last-page-finished="${nextLessonReview?.to_page || null}">
                                                    <span>${nextLessonReview?.to_page || 0}</span>
                                                    <i class="fa-solid fa-book-open"></i>
                                                </span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control newLessonRateReview ${nextLessonReview ? '' : 'd-none'}">
                                            <option value="excellent"> excellent </option>
                                            <option value="very good"> very good </option>
                                            <option value="good"> good </option>
                                            <option value="fail"> fail </option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary newLessonButtonReview ${nextLessonReview ? 'd-none' : ''}" data-student-lesson-review-id="${studentLessonReview ? studentLessonReview.id : null}" data-group-id="${groupId}" data-lesson-id="${lesson.id}" data-last-page-finished-review="${studentLessonReview?.last_page_finished}" data-last-chapter-finished-review="${studentLessonReview?.last_chapter_finished}">New Lesson</button>

                                        <button class="btn btn-info finishNewLessonButtonReview ${nextLessonReview ? '' : 'd-none'}" data-syllabi-review-id=${nextLessonReview?.id || null}>
                                            Finish New Lesson
                                            <i class="fa-solid fa-square-check"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>






                </div>

            `


        });

        subjectsContainer.html('')

        subjectsContainer.html(`

            <div class="col-12">
                <button class="btn btn-info mb-4" id="backToSubjects${groupStudent.id}">
                    <i class="fa-solid fa-backward"></i>
                </button>
                ${lessonsElements}
            </div>
        `)

        $('.openStudentLastPageFinishedElement').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        $('.openStudentLastPageFinishedElementReview').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        $('.nextLessonFromPage').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        $('.nextLessonFromPageReview').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        $('.nextLessonToPage').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        $('.nextLessonToPageReview').on('click',function(){
            openPageFromTheBook(this, subject)
        })

        // $('.nextReviewLessonFromPage').on('click',function(){
        //     openPageFromTheBook(this, subject)
        // })

        // $('.nextReviewLessonToPage').on('click',function(){
        //     openPageFromTheBook(this, subject)
        // })



        $('.goToReviewButton').on('click',function(){
            $(this).parent().parent().addClass('rotate-inner-active')
            $(this).parent().parent().parent().addClass('borderSuccess')
            $(this).parent().parent().parent().removeClass('borderPrimary')
        })

        $('.goToLessonButton').on('click',function(){
            $(this).parent().parent().removeClass('rotate-inner-active')
            $(this).parent().parent().parent().addClass('borderPrimary')
            $(this).parent().parent().parent().removeClass('borderSuccess')
        })

        studentLessonFinishedAjax()


        $(`#backToSubjects${groupStudent.id}`).on('click',function(){

            renderSubjectsInStudentsShow()

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