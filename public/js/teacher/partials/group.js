import { getStudentsTableHtml, handleStudentLessonModal, handleAddStudentLessonModal, addNewLessonHandler } from "./student.js";

import { Book } from "../../student/partials/book.js";

export function renderTeacherGroups(groups) {
    groups.forEach(group => {
        $('#pills-tab').append(`
            <li class="nav-item">
                <div class="nav-link list-actions" id="group-${group.id}"
                    data-invoice-id="group : ${group.name}">
                    <div class="f-m-body">
                        <div class="f-head">
                          
                        </div>
                        <div class="f-body">
                       <h3>${group.name}</h3>
                        </div>
                    </div>
                </div>
            </li>
        `)

        let studentsGroupStudentsHtml = getStudentsTableHtml(group);


        $('#ct').append(`
            <div class="group-${group.id}">
                <div class="content-section  animated animatedFadeInUp fadeInUp">

                    <div class="row inv--head-section alert alert-primary" role="alert">

                        <div class="col-sm-6 col-12">
                            <h3 class="in-heading">${group.name}</h3>
                        </div>
                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                            <div class="company-info">
                           
                                <h5 class="inv-brand-name">
                                    COUNT Student : ${group.students.length}
                                </h5>
                            </div>
                        </div>

                    </div>

                    <div class="row inv--product-table-section">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Show Lessons</th>
                                            <th scope="col">Add Lessons</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student">
                                    `
            +
            studentsGroupStudentsHtml
            +
            `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `)
    });




    // $('#addStudentLessonModal').on('shown.bs.modal', function () {
    //     $('.showBookBtn').off('click')

    //     console.log($(this).data('book'));

    //     let book = new Book($(this).data('book'))

    //     $('.showBookBtn').on('click', function () {
    //         book.renderPage()
    //         $('#showBookModal').modal('show')
    //     })


    //     $('#next').off('click')
    //     $('#prev').off('click')
    //     $('#next').on('click', function () {
    //         book.onNextPage()
    //     })
    //     $('#prev').on('click', function () {
    //         book.onPrevPage()
    //     })



    //     $('#addStudentLessonModal #lesson_from_page').off('click')
    //     $('#addStudentLessonModal #lesson_from_page').on('click', function () {
    //         book.pageNum = Number($('#addStudentLessonModal #lesson_from_page').html())
    //         book.renderPage()
    //         $('#showBookModal').modal('show')
    //     })

    //     $('#addStudentLessonModal #lesson_to_page').off('click')
    //     $('#addStudentLessonModal #lesson_to_page').on('click', function () {
    //         book.pageNum = Number($('#addStudentLessonModal #lesson_to_page').html())
    //         book.renderPage()
    //         $('#showBookModal').modal('show')
    //     })
    // })






    handleStudentLessonModal(groups)
    handleAddStudentLessonModal(groups)

    addNewLessonHandler()
}