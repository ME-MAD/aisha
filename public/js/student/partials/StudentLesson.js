export class StudentLesson
{
    constructor(lesson, groupId, studentId) {
        this.studentLesson = lesson.student_lessons.filter(studentLesson => {
            return(studentLesson.student_id == studentId &&
                studentLesson.group_id == groupId
            )
        })[0]
    }

    getNextLessonData()
    {
        if(this.studentLesson)
        {
            return {
                ShowUrl: `/admin/student_lesson/show/${this.studentLesson.id}`,
                NextLesson: this.studentLesson.syllabus.filter(syllabi => syllabi.finished == 0)[0],
                NextLessonFromChapter: this.getNextLesson().from_chapter,
                NextLessonToChapter: this.getNextLesson().to_chapter,
            }
        }

        return {
            ShowUrl: "#",
            NextLesson: null,
            NextLessonFromChapter: 0,
            NextLessonToChapter: 0,
        }
    }

    getStudentLessonShowUrl()
    {
        
        if(this.studentLesson)
        {
            return `/admin/student_lesson/show/${this.studentLesson.id}`;
        }
        return "#";
    }

    getNextLesson()
    {
        if(this.studentLesson)
        {
            return this.studentLesson.syllabus.filter(syllabi => syllabi.finished == 0)[0]
        }
        return null
    }

    getNextLessonFromChapter()
    {
        if(this.studentLesson)
        {
            return this.getNextLesson().from_chapter
        }
        return 0;
    }

    getNextLessonToChapter()
    {
        if(this.studentLesson)
        {
            return this.getNextLesson().to_chapter
        }
        return 0;
    }
}