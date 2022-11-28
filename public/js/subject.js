let groupStudentsContainer = $('#groupStudentsContainer')
let studentId = $('#studentProfileContainer').data('student-id')
let groupStudents = null
let subjects = null

function renderSubjectsInStudentsShow(){

    $.ajax({
        url: groupStudentsContainer.data('href'),
        success: function (response) {

            groupStudents = response.groupStudents
            subjects = response.subjects

            groupStudents.forEach(groupStudent => {
                groupStudentsContainer.append(`
                    <div id="groupStudentContainer${groupStudent.id}"></div>
                `)
                renderSubjectsForEachGroup(groupStudent)
                
            });
        },
        error: function () { }
    })
}


function renderSubjectsForEachGroup(groupStudent)
{
    let subjectsElements = ''
    let groupDaysElements = ''

    $(`#groupStudentContainer${groupStudent.id}`).html('')

    subjects.forEach(subject => {
        subjectsElements += `
            <div class="col-4 mb-4 subjectContainer${groupStudent.id}" data-subject-id="${subject.id}">
                <div class="card component-card_1" style="height:280px">
                    <div class="d-flex flex-column card-body justify-content-between">
                        <h5 class="card-title text-center subjectShowButton">
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
        
    groupStudent.group.group_days.forEach(groupDay => {
        groupDaysElements += `
            <span class="badge bg-info text-light">${groupDay.day}</span>
        `
    });

    $(`#groupStudentContainer${groupStudent.id}`).append(`
        <p class="text-center"> 

            <span class="badge bg-primary text-light">From</span>
            ${groupStudent.group.from} :
            <span class="badge bg-primary text-light">To</span>
            ${groupStudent.group.to}
            
            ${groupDaysElements}

        </p>

        <div class="row" id="subjectsContainer${groupStudent.id}" data-group-id="${groupStudent.group_id}">
            ${subjectsElements}
        </div>
    `)

    let subjectsContainer = $(`#subjectsContainer${groupStudent.id}`)


    $(`.subjectContainer${groupStudent.id}`).on('click',function(){

        let subject = getSubjectById($(this).data('subject-id'))
        let groupId = subjectsContainer.data('group-id')
        let lessonsElements = ''

        subject.lessons.forEach(lesson => {
            let studentLesson = lesson.student_lessons.filter(studentLesson => {
                return(studentLesson.student_id == studentId &&
                    studentLesson.group_id == groupId
                )
            })[0]
            let studentFinishedChaptersCount = studentLesson ? studentLesson.last_chapter_finished : 0
            let studentFinishedChaptersPercentage = studentLesson ? studentLesson.percentage : 0
            let studentLessonIsFinished = studentLesson ? studentLesson.finished : false
            let studentLessonLastPageFinished = studentLesson ? studentLesson.last_page_finished : 0

            lessonsElements += `
                <div class="studentLessonContainer">
                    <div class="text-center mb-3">
                        <label class="float-left">
                            <input 
                                type="checkbox" 
                                class="lesson_finished_checkbox big-checkbox" 
                                data-group-id="${groupId}"
                                data-lesson-id="${lesson.id}"
                                data-student-id="${studentId}"
                                data-chapters-count="${lesson.chapters_count}"
                                data-last-page-finished="${lesson.to_page}"
                                ${studentLessonIsFinished ? 'checked' : ''}>
                        </label>

                        <span>
                            <a class="text-primary">
                                ${lesson.title}
                            </a>
                        </span>

                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="badge badge-success studentFinishedChaptersCountElement">
                            ${studentFinishedChaptersCount}
                        </span>
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
                    <div>
                        Last Page Finished : <span class="badge bg-primary studentLessonLastPageFinishedElement">${studentLessonLastPageFinished}</span>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary newLessonButton" data-student-lesson-id="${studentLesson ? studentLesson.id : null}" data-group-id="${groupId}" data-lesson-id="${lesson.id}">New Lesson</button>
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

        studentLessonFinishedAjax()
       

        $(`#backToSubjects${groupStudent.id}`).on('click',function(){

            renderSubjectsInStudentsShow()

        })


    })
}


function studentLessonFinishedAjax()
{
    $('.lesson_finished_checkbox').on('change',function(){
        let lesson_finished_checkbox = this;
        let group_id = $(this).data('group-id');
        let lesson_id = $(this).data('lesson-id');
        let student_id = $(this).data('student-id');
        let chapters_count = $(this).data('chapters-count');
        let last_page_finished = $(this).data('last-page-finished');

        if (lesson_finished_checkbox.checked == true) {
            $.ajax({
                url: '/admin/student_lesson/ajaxStudentLessonFinished',
                data: {
                    group_id: group_id,
                    lesson_id: lesson_id,
                    student_id: student_id,
                    finished: true,
                    chapters_count: chapters_count,
                    last_page_finished: last_page_finished,
                },
                success: function(response) {
                    let mainParent = $(lesson_finished_checkbox).parent().parent().parent()

                    mainParent.find(
                        '.progressOfSubjectLink .progress-bar').css({
                            'width': '100%',
                            'transision': '1.5s'
                        }).find(".progress-bar-percentage").html("100%")
                    
                    mainParent.find('.studentFinishedChaptersCountElement').html(chapters_count)
                    mainParent.find('.studentLessonLastPageFinishedElement').html(last_page_finished)

                    Swal.fire(
                        'Success!',
                        `Finished Successfully !`,
                        'success',
                    )
                },
                error: function(res) {
                    Swal.fire(
                        'Error!',
                        `There Was an Error !`,
                        'error',
                    )
                    console.log(res);
                }
            })
        } else {
            $.ajax({
                url: '/admin/student_lesson/ajaxStudentLessonFinished',
                data: {
                    group_id: group_id,
                    lesson_id: lesson_id,
                    student_id: student_id,
                    finished: false,
                },
                success: function(response) {
                    Swal.fire(
                        'Success!',
                        `Finished Successfully !`,
                        'success',
                    )
                },
                error: function(res) {
                    Swal.fire(
                        'Error!',
                        `There Was an Error !`,
                        'error',
                    )
                    console.log(res);
                }

            })
        }
    })

    $('.newLessonButton').on('click',function(){
        $('#newLessonModal').modal('show')
        let student_lesson_id = $(this).data('student-lesson-id')

        

        $('#newLessonForm').submit(function(e){
            e.preventDefault()
            let from_chapter = $('#newLessonForm #from_chapter').val()
            let to_chapter = $('#newLessonForm #to_chapter').val()
            let from_page = $('#newLessonForm #from_page').val()
            let to_page = $('#newLessonForm #to_page').val()
            let group_id = $(this).data('group-id')
            let lesson_id = $(this).data('lesson-id')
            
            let url = $(this).data('url')

            $.ajax({
                url: url,
                type: "POST",
                data: {
                   from_chapter,
                   to_chapter,
                   from_page,
                   to_page,
                   student_lesson_id,
                   student_id: studentId,
                   group_id,
                   lesson_id
                },
                success: function(response) {
                    $('#newLessonModal').modal('hide')
                    Swal.fire(
                        'Success!',
                        `Finished Successfully !`,
                        'success',
                    )
                },
                error: function(res) {
                    Swal.fire(
                        'Error!',
                        `There Was an Error !`,
                        'error',
                    )
                    console.log(res);
                }
            })
        })
    })
}

function getSubjectById(subject_id)
{
    return subjects.filter( subject => subject.id == subject_id)[0]
}

function getLessonById(subject,lesson_id)
{
    return subject.lessons.filter( lesson => lesson.id == lesson_id)[0]
}


function subjectShowHandle() 
{
    $('.subjectShowButton').on('click',function(){
        handleShowingOfTheBook(1 , $(this).data('subject'))
    })
}

function handleShowingOfTheBook(pageCount = 1, subject){
    let book = null;
    $('#show-lesson-con').remove('') 
    $('#next').remove()
    $('#prev').remove()
    $('#navButtonsForBook').html(`
        <button class="btn btn-info" id="prev">
            <i class="fa-solid fa-left-long"></i>
        </button>
        <button class="btn btn-info" id="next">
            <i class="fa-solid fa-right-long"></i>
        </button>
    `)
    $('#zoom-view-port').html(`
        <div id="show-lesson-con">
        
        </div>
    `)

    const fullPage = document.querySelector('#fullpage');
    
    $('#show-lesson-con').append(`
        <div>
            <img 
                src="/files/subjects/${subject.name}/1.jpg"
                alt=""
                class="w-100 full--screen"
                height="1200"
            >
        </div>
    `)

    book = $('#show-lesson-con').turn({
        duration:1000,
        direction: "rtl",
        height: 1200,
        display: "single"
    });

    for(let  i = 1; i <= pageCount; i++)
    {
        if( !book.turn('hasPage',i) ){
            addPage(book, subject.name, i)
        }
    }

    $('.full--screen').on('click',function(){
        fullPage.style.backgroundImage = 'url(' + this.src + ')';
        fullPage.style.display = 'block';
    })

    book.bind('start', 
        function (event, pageObject, corner)
        {
            if (corner == 'tl' || corner == 'tr' || corner == 'bl' || corner == 'br')
            {
                event.preventDefault();
            }
        }
    );

    $('#prev').on('click',function(){
        book.turn("previous");
    })

    $('#next').on('click',function(){
        pageCount += 1
        if(subject.pagesCount >= pageCount)
        {
            addPage(book, subject.name, pageCount)
        }
        
        pageCount += 1
        if(subject.pagesCount >= pageCount)
        {
            addPage(book, subject.name, pageCount)
        }

        $('.full--screen').on('click',function(){
            fullPage.style.backgroundImage = 'url(' + this.src + ')';
            fullPage.style.display = 'block';
        })

        book.turn("next");
    })

    book.turn('page',pageCount)
}

function addPage(book, subjectName, pageCount){
    book.turn('addPage',`
        <div>
            <img 
                src="/files/subjects/${subjectName}/${pageCount}.jpg"
                alt=""
                class="w-100 full--screen"
                height="1200"
            >
        </div>
    `)
    book.turn('pages', pageCount)
}