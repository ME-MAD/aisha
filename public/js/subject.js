let groupStudentsContainer = $('#groupStudentsContainer')
let studentId = $('#studentProfileContainer').data('student-id')


function renderSubjectsInStudentsShow(){

    $.ajax({
        url: groupStudentsContainer.data('href'),
        success: function (response) {

            let groupStudents = response.groupStudents
            let subjects = response.subjects

            groupStudents.forEach(groupStudent => {
                groupStudentsContainer.append(`
                    <div id="groupStudentContainer${groupStudent.id}"></div>
                `)
                renderSubjectsForEachGroup(subjects, groupStudent)
                
            });
        },
        error: function () { }
    })
}


function renderSubjectsForEachGroup(subjects, groupStudent)
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

        let subject = subjects.filter( subject => subject.id == $(this).data('subject-id'))[0]
        let groupId = subjectsContainer.data('group-id')
        let lessonsElements = ''

        subject.lessons.forEach(lesson => {
            let studentLesson = lesson.student_lessons.filter(studentLesson => {
                return(studentLesson.student_id == studentId &&
                    studentLesson.group_id == groupId
                )
            })[0]
            let studentFinishedChaptersCount = studentLesson ? studentLesson.chapters_count : 0
            let studentFinishedChaptersPercentage = studentLesson ? studentLesson.percentage : 0
            let studentLessonIsFinished = studentLesson ? studentLesson.finished : false
            
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


        $('.lesson_finished_checkbox').on('change',function(){
            let lesson_finished_checkbox = this;
            let group_id = $(this).data('group-id');
            let lesson_id = $(this).data('lesson-id');
            let student_id = $(this).data('student-id');
            let chapters_count = $(this).data('chapters-count');

            if (lesson_finished_checkbox.checked == true) {
                $.ajax({
                    url: '/admin/student_lesson/ajaxStudentLessonFinished',
                    data: {
                        group_id: group_id,
                        lesson_id: lesson_id,
                        student_id: student_id,
                        finished: true,
                        chapters_count: chapters_count
                    },
                    success: function(response) {
                        let mainParent = $(lesson_finished_checkbox).parent().parent().parent()

                        mainParent.find(
                            '.progressOfSubjectLink .progress-bar').css({
                                'width': '100%',
                                'transision': '1.5s'
                            }).find(".progress-bar-percentage").html("100%")

                        mainParent.find('.studentFinishedChaptersCountElement').html(chapters_count)

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

        $(`#backToSubjects${groupStudent.id}`).on('click',function(){

            renderSubjectsForEachGroup(subjects, groupStudent)

        })


    })
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