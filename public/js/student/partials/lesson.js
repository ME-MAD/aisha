export function getStudentLesson(lesson, groupId, studentId) {
    return lesson.student_lessons.filter(studentLesson => {
        return(studentLesson.student_id == studentId &&
            studentLesson.group_id == groupId
        )
    })[0]
}