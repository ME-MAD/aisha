import {StudentLesson} from "./StudentLesson.js"
import {handleLessonFinishedCheckbox, addNewLessonHandler, handleFinishNewLesson} from "./studentLessonFunctions.js"
import {handleLessonReviewFinishedCheckbox,addNewLessonReviewHandler,handleFinishNewLessonReview} from "./studentLessonReviewFunctions.js"

export function getStudentLesson(lesson, groupId, studentId) {
    return lesson.student_lessons.filter(studentLesson => {
        return(studentLesson.student_id == studentId &&
            studentLesson.group_id == groupId
        )
    })[0]
}

export function renderLessonsHtml(subject, groupId, studentId, groupStudent)
{
    let subjectsContainer = $(`#subjectsContainer${groupStudent.id}`)
    let lessonsElements = '';


    subject.lessons.forEach(lesson => {
           
        let studentLesson = new StudentLesson(lesson, groupId, studentId)
        let nlData = studentLesson.getNextLessonData()

        
        let studentLessonReview = studentLesson.getStudentLessonReview()
        let nlrData = studentLesson.getNextLessonReviewData()


        let lessonHtml = getLessonHtml(lesson,nlData,groupId,studentId,studentLesson)
        let lessonReviewHtml = getLessonReviewHtml(lesson,nlData,nlrData,groupId,studentId,studentLessonReview)

        lessonsElements += `
            <div class="studentLessonMainContainer borderPrimary">
                <div class="rotate-inner">


                `

                + lessonHtml +

                `




                `

                + lessonReviewHtml +

                `

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


    handleLessonFinishedCheckbox()
    handleLessonReviewFinishedCheckbox()
    
    addNewLessonHandler(studentId, subject)
    addNewLessonReviewHandler(studentId, subject)

    handleFinishNewLesson()
    handleFinishNewLessonReview()
}

function getLessonHtml(lesson , nlData, groupId, studentId, studentLesson)
{
    return `
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
                    <a href="${nlData.showUrl}" class="btn btn-outline-warning text-dark ${nlData.showUrl == "#" ? 'd-none' : ''}" target="_blank">
                        Show Progress
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </span>
            </div>

            <div class="d-flex justify-content-between mb-3 align-items-center">
                <span class="badge badge-success studentFinishedChaptersCountElement">
                    ${nlData.lastChapter}
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
                        ${nlData.finished ? 'checked' : ''}
                    >
                    <span class="slider"></span>
                </label>

                <span class="badge badge-secondary">
                    ${lesson.chapters_count}
                </span>
            </div>

            <a class="progressOfSubjectLink subject" data-toggle="modal" data-target="#createSubjectModal"
                data-chapterscount="${lesson.chapters_count}"
                data-finishedchapterscount="${nlData.lastChapter}"
                data-groupid="${groupId}" data-lessonid="${lesson.id}"
                data-studentid="${studentId}">
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar"
                        aria-valuenow="${nlData.finishPercentage}"
                        style="width:${nlData.finishPercentage}%"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title">
                            <span class="progress-bar-percentage">
                                ${nlData.finishPercentage}%
                            </span>
                        </div>
                    </div>
                </div>
            </a>



            <div class="row">
                <div class="p-3 text-center col" style="font-size:1.5rem;">
                    <div class="mb-4">
                        Last Page Finished : <span class="badge bg-success studentLessonLastPageFinishedElement">${nlData.lastPage}</span>
                        <span class="btn btn-outline-info openStudentLastPageFinishedElement" data-last-page-finished="${nlData.lastPage}">
                            <i class="fa-solid fa-book-open"></i>
                        </span>
                    </div>

                    <div class="${nlData.nextLesson ? '' : 'd-none'} newLessonContainerElement">
                        <div class="mb-3">
                            <span>
                                <span>Next Lesson Is From Chapter</span>
                                <span class="badge bg-info nextLessonFromChapter">
                                    ${nlData.fromChapter}
                                </span>
                                <span>To Chapter</span>
                                <span class="badge bg-info nextLessonToChapter">${nlData.toChapter}</span>
                            </span>
                        </div>
                        <div class="mb-3">
                            <span>
                                <span>Next Lesson Is From Page</span>
                                <span class="badge bg-info nextLessonFromPage" data-last-page-finished="${nlData.fromPage}">
                                    <span>${nlData.fromPage || 0}</span>
                                    <i class="fa-solid fa-book-open"></i>
                                </span>
                                <span>To Page</span>
                                <span class="badge bg-info nextLessonToPage" data-last-page-finished="${nlData.toPage}">
                                    <span>${nlData.toPage || 0}</span>
                                    <i class="fa-solid fa-book-open"></i>
                                </span>
                            </span>
                        </div>

                    </div>
                    <div class="mb-3">
                        <select class="form-control newLessonRate ${nlData.nextLesson ? '' : 'd-none'}">
                            <option value="excellent"> excellent </option>
                            <option value="very good"> very good </option>
                            <option value="good"> good </option>
                            <option value="fail"> fail </option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary newLessonButton ${nlData.nextLesson ? 'd-none' : ''}" data-student-lesson-id="${studentLesson.getStudentLessonId()}" data-group-id="${groupId}" data-lesson-id="${lesson.id}" data-last-page-finished="${nlData.lastPage}" data-last-chapter-finished="${nlData.lastChapter}">New Lesson</button>

                        <button class="btn btn-info finishNewLessonButton ${nlData.nextLesson ? '' : 'd-none'}" data-syllabi-id=${nlData.id}>
                            Finish New Lesson
                            <i class="fa-solid fa-square-check"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    `
}




function getLessonReviewHtml(lesson, nlData, nlrData,groupId, studentId, studentLessonReview)
{

    console.log(nlrData);
    return `
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
                    <a href="${nlData.showUrl}" class="btn btn-outline-warning text-dark ${nlData.showUrl == "#" ? 'd-none' : ''}" target="_blank">
                        Show Progress
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </span>
            </div>

            <div class="d-flex justify-content-between mb-3 align-items-center">
                <span class="badge badge-success StudentFinishedChaptersCountElementReview">
                    ${nlrData.lastChapter}
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
                        ${nlrData.finished ? 'checked' : ''}
                    >
                    <span class="slider"></span>
                </label>

                <span class="badge badge-secondary">
                    ${lesson.chapters_count}
                </span>
            </div>

            <a class="progressOfSubjectLink subject" data-toggle="modal" data-target="#createSubjectModal"
                data-chapterscount="${lesson.chapters_count}"
                data-finishedchapterscount="${nlrData.lastChapter}"
                data-groupid="${groupId}" data-lessonid="${lesson.id}"
                data-studentid="${studentId}">
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar"
                        aria-valuenow="${nlrData.finishPercentage}"
                        style="width:${nlrData.finishPercentage}%"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-title">
                            <span class="progress-bar-percentage">
                                ${nlrData.finishPercentage}%
                            </span>
                        </div>
                    </div>
                </div>
            </a>



            <div class="row">
                <div class="p-3 text-center col" style="font-size:1.5rem;">
                    <div class="mb-4">
                        Last Page Finished : <span class="badge bg-success studentLessonLastPageFinishedElementReview">${nlrData.lastPage}</span>
                        <span class="btn btn-outline-info openStudentLastPageFinishedElementReview" data-last-page-finished="${nlrData.lastPage}">
                            <i class="fa-solid fa-book-open"></i>
                        </span>
                    </div>

                    <div class="${nlrData.nextLesson ? '' : 'd-none'} newLessonContainerElementReview">
                        <div class="mb-3">
                            <span>
                                <span>Next Lesson Is From Chapter</span>
                                <span class="badge bg-info nextLessonFromChapterReview">
                                    ${nlrData.fromChapter}
                                </span>
                                <span>To Chapter</span>
                                <span class="badge bg-info nextLessonToChapterReview">${nlrData.toChapter}</span>
                            </span>
                        </div>
                        <div class="mb-3">
                            <span>
                                <span>Next Lesson Is From Page</span>
                                <span class="badge bg-info nextLessonFromPageReview" data-last-page-finished="${nlrData.fromPage}">
                                    <span>${nlrData.fromPage}</span>
                                    <i class="fa-solid fa-book-open"></i>
                                </span>
                                <span>To Page</span>
                                <span class="badge bg-info nextLessonToPageReview" data-last-page-finished="${nlrData.toPage}">
                                    <span>${nlrData.toPage}</span>
                                    <i class="fa-solid fa-book-open"></i>
                                </span>
                            </span>
                        </div>

                    </div>
                    <div class="mb-3">
                        <select class="form-control newLessonRateReview ${nlrData.nextLesson ? '' : 'd-none'}">
                            <option value="excellent"> excellent </option>
                            <option value="very good"> very good </option>
                            <option value="good"> good </option>
                            <option value="fail"> fail </option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary newLessonButtonReview ${nlrData.nextLesson ? 'd-none' : ''}" data-student-lesson-review-id="${studentLessonReview ? studentLessonReview.id : null}" data-group-id="${groupId}" data-lesson-id="${lesson.id}" data-last-page-finished-review="${nlrData.lastPage}" data-last-chapter-finished-review="${nlrData.lastChapter}">New Lesson</button>

                        <button class="btn btn-info finishNewLessonButtonReview ${nlrData.nextLesson ? '' : 'd-none'}" data-syllabi-review-id=${nlrData.id}>
                            Finish New Lesson
                            <i class="fa-solid fa-square-check"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    `
}