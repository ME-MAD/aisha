export class StudentLesson
{
    constructor(lesson, groupId, studentId) {
        this.studentLesson = lesson.student_lessons.filter(studentLesson => {
            return(studentLesson.student_id == studentId &&
                studentLesson.group_id == groupId
            )
        })[0]
    }

    getStudentLessonId()
    {
        if(this.studentLesson)
        {
            return this.studentLesson.id
        }
        return null
    }

    getNextLesson()
    {
        if(this.studentLesson)
        {
            return this.studentLesson.syllabus.filter(syllabi => syllabi.finished == 0)[0]
        }
        return null
    }

    getNextLessonData()
    {
        if(this.studentLesson && this.getNextLesson())
        {
            return {
                showUrl: `/admin/student_lesson/show/${this.studentLesson.id}`,
                nextLesson: this.studentLesson.syllabus.filter(syllabi => syllabi.finished == 0)[0],
                fromChapter: this.getNextLesson().from_chapter,
                toChapter: this.getNextLesson().to_chapter,
                fromPage: this.getNextLesson().from_page,
                toPage: this.getNextLesson().to_page,
                id: this.getNextLesson().id,
                lastChapter: this.studentLesson.last_chapter_finished,
                finishPercentage: this.studentLesson.percentage,
                finished: this.studentLesson.finished,
                lastPage: this.studentLesson.last_page_finished
            }
        }

        return {
            showUrl: "#",
            nextLesson: null,
            fromChapter: 0,
            toChapter: 0,
            fromPage: null,
            toPage: null,
            id: null,
            lastChapter: 0,
            finishPercentage: 0,
            finished: false,
            lastPage: 0
        }
    }


    getStudentLessonReview()
    {
        if(this.studentLesson)
        {
            if(this.studentLesson.student_lesson_review)
            {
                return this.studentLesson.student_lesson_review
            }
        }
        return null
    }

    getNextLessonReview()
    {
        if(this.studentLesson)
        {
            if(this.getStudentLessonReview())
            {
                return this.getStudentLessonReview().syllabus_reviews.filter(syllabusReview => syllabusReview.finished == 0)[0]
            }
        }
        return null
    }

    getNextLessonReviewData()
    {
        if(this.getStudentLessonReview() && this.getNextLessonReview())
        {
            return {
                nextLesson: this.getNextLessonReview(),
                fromChapter: this.getNextLessonReview().from_chapter,
                toChapter: this.getNextLessonReview().to_chapter,
                fromPage: this.getNextLessonReview().from_page,
                toPage: this.getNextLessonReview().to_page,
                id: this.getNextLessonReview().id,
                lastChapter: this.getStudentLessonReview().last_chapter_finished,
                finishPercentage: this.getStudentLessonReview().percentage,
                finished: this.getStudentLessonReview().finished,
                lastPage: this.getStudentLessonReview().last_page_finished
            }
        }

        return {
            nextLesson: null,
            fromChapter: 0,
            toChapter: 0,
            fromPage: null,
            toPage: null,
            id: null,
            lastChapter: 0,
            finishPercentage: 0,
            finished: false,
            lastPage: 0
        }
    }

    

    studentLessonFinishedAjax()
    {
        $('.finishNewLessonButtonReview').on('click',function(){
            let syllabi_review_id = $(this).data('syllabi-review-id')
            let mainParent = $(this).parent().parent().parent().parent()
            let rate = mainParent.find('.newLessonRateReview').val()

            $.ajax({
                url: "/admin/syllabus-review/finishNewLessonReviewAjax/" + syllabi_review_id,
                type: "POST",
                data: {
                rate: rate
                },
                success: function(response) {
                    if(response.status == 200)
                    {
                        if(rate == "fail")
                        {
                            location.reload();
                            return;
                        }
                        mainParent.find('.newLessonContainerElementReview').addClass('d-none')

                        mainParent.find('.newLessonButtonReview').removeClass('d-none')
                        mainParent.find('.finishNewLessonButtonReview').addClass('d-none')

                        mainParent.find('.studentLessonLastPageFinishedElementReview').html(response.studentLessonReview.last_page_finished)

                        mainParent.find('.StudentFinishedChaptersCountElementReview').html(response.studentLessonReview.last_chapter_finished)

                        mainParent.find('.lesson_finished_checkbox_review').prop('checked', response.studentLessonReview.finished)

                        mainParent.find('.openStudentLastPageFinishedElement').data('last-page-finished',response.studentLessonReview.last_page_finished)

                        mainParent.find('.newLessonRateReview').addClass('d-none')
                        changePercentageBar(mainParent, response.studentLessonReview.percentage)

                        Swal.fire(
                            'Success!5',
                            `Finished Successfully !`,
                            'success',
                        )
                    }
                    else if(response.status == 400)
                    {
                        Swal.fire(
                            'Warning!',
                            `The Student Did't F`,
                            'warning',
                        )
                    }
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


        
    }
}