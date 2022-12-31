$(document).ready(function () {

    const URL_GET_NOTES = '/admin/student_note/getStudentsNotesByAjax'
    const URL_GET_DATA_STUDENTS = '/admin/student_note/getDataStudentsByAjax'
    const URL_STORE_NOTES = '/admin/student_note/store'
    const URL_EDIT_NOTES = '/admin/student_note/edit/'
    const URL_UPDATE_NOTES = '/admin/student_note/update/'
    const URL_DELETE_NOTES = '/admin/student_note/delete/'


    //Start ajax
    $.ajax({
        type: 'POST',
        url: URL_GET_NOTES,
        success: function (response) {
            //Start function success
            //----------------------------------------------------------




            //---------------------------------
            //Start append notes content
            let allNotes = ``;
            response.data.forEach((note) => {

                allNotes += `<div class="note-item all-notes note-${note.type}">
                            <div class="note-inner-content">

                                <div class="note-content">
                                    <p class="note-title">Student Name Here</p>
                                    <p class="meta-time">${note.created_at}</p>
                                    <div class="note-description-content">
                                        <p class="note-description">${note.note}</p>
                                    </div>
                                </div>

                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fav-note">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete-note" data-id="${note.id}">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </div>

                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                            <span>
                                                <div class="tags">
                                                    <div class="g-dot-personal"></div>
                                                    <div class="g-dot-work"></div>
                                                    <div class="g-dot-social"></div>
                                                    <div class="g-dot-important"></div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </div>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>`

            });

            $('#content-notes').html(allNotes)
            //End append notes content
            //---------------------------------






            // //Start ajax
            $.ajax({
                type: 'POST',
                url: URL_GET_DATA_STUDENTS,
                success: function (response) {
                    //Start function success
                    //----------------------------------------------------------

                    // Start append input student type options
                    appendTypesOptions(response.types)
                    // End append input student type options


                    //Start append input student name options
                    // appendStudentsOptions(response.students)
                    //End append input student name options

                    //----------------------------------------------------------
                    //End function success
                },
                error: function (reject) {


                }
            })
            // //End ajax

















































            $('#btn-add-notes').on('click', function (event) {
                $('#notesMailModal').modal('show');
                $('#btn-n-save').hide();
                $('#btn-n-add').show();
            })







            // // Button add
            $("#btn-n-add").on('click', function (event) {



                var type = $('#input-type').val();
                var note = $('#input-note').val();
                // var student = $('#input-student').val();
                // //Start ajax
                $.ajax({
                    type: 'POST',
                    url: URL_STORE_NOTES,
                    data: {
                        type: type,
                        note: note,
                        notable_id: 5,
                    },
                    success: function (response) {
                        //Start function success
                        //----------------------------------------------------------

                        swal({
                            title: 'success',
                            text: "تمت العملية بنجاح",
                            type: 'success',
                            padding: '2em'
                        })

                        //----------------------------------------------------------
                        //End function success
                    },
                    error: function (reject) {

                        console.log(reject)
                        // let res = $.parseJSON(reject.responseText);
                        // $.each(res.errors, function(key, value) {
                        //     $("#" + key).text(value[0]);
                        // })
                    }
                })
                // //End ajax




                /*
                event.preventDefault();
                / * Act on the event * /
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var today = mm + '/' + dd + '/' + yyyy;

                var note = document.getElementById('n-title').value;
                var $_noteDescription = document.getElementById('n-description').value;

                html = '<div class="note-item all-notes">' +
                    '<div class="note-inner-content">' +
                    '<div class="note-content">' +
                    '<p class="note-title" data-noteTitle="' + $_noteTitle + '">' + $_noteTitle + '</p>' +
                    '<p class="meta-time">' + today + '</p>' +
                    '<div class="note-description-content">' +
                    '<p class="note-description" data-noteDescription="' + $_noteDescription + '">' + $_noteDescription + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="note-action">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fav-note"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> ' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete-note"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>' +
                    '</div>' +
                    '<div class="note-footer">' +
                    '<div class="tags-selector btn-group">' +
                    '<a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
                    '<span>' +
                    '<div class="tags">' +
                    '<div class="g-dot-personal"></div>' +
                    '<div class="g-dot-work"></div>' +
                    '<div class="g-dot-social"></div>' +
                    '<div class="g-dot-important"></div>' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>' +
                    '</div>' +
                    '</span>' +
                    '</a>' +
                    '<div class="dropdown-menu dropdown-menu-right d-icon-menu">' +
                    '<a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> Personal</a>' +
                    '<a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> Work</a>' +
                    '<a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> Social</a>' +
                    '<a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> Important</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div> ';









                    html += `<div class="note-item all-notes note-${note.type}">
                    <div class="note-inner-content">

                        <div class="note-content">
                            <p class="note-title">Student Name Here</p>
                            <p class="meta-time">${today}</p>
                            <div class="note-description-content">
                                <p class="note-description">${note}</p>
                            </div>
                        </div>

                        <div class="note-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fav-note">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete-note" data-id="${note.id}">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </div>

                        <div class="note-footer">
                            <div class="tags-selector btn-group">
                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                    <span>
                                        <div class="tags">
                                            <div class="g-dot-personal"></div>
                                            <div class="g-dot-work"></div>
                                            <div class="g-dot-social"></div>
                                            <div class="g-dot-important"></div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </div>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> Personal</a>
                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> Work</a>
                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> Social</a>
                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> Important</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>`










                $("#content-notes").prepend(html);
                $('#notesMailModal').modal('hide');
            */




            });



















            $(".delete-note").on('click', function () {


                // //Start ajax
                $.ajax({
                    type: 'DELETE',
                    url: URL_DELETE_NOTES + $(this).data('id'),
                    success: function (response) {
                        //Start function success
                        //----------------------------------------------------------

                        console.log('form :  - delete-note');

                        $(this).parents('.note-item').remove()

                        console.log($(this).parents('.note-item'));
                        swal({
                            title: 'success',
                            text: "تمت العملية بنجاح",
                            type: 'success',
                            padding: '2em'
                        })

                        //----------------------------------------------------------
                        //End function success
                    },
                    error: function (reject) {

                        // let res = $.parseJSON(reject.responseText);
                        // $.each(res.errors, function(key, value) {
                        //     $("#" + key).text(value[0]);
                        // })
                    }
                })
                // //End ajax



            })





            //----------------------------------------------------------
            //End function success
        },
        error: function (reject) {

            // let res = $.parseJSON(reject.responseText);
            // $.each(res.errors, function(key, value) {
            //     $("#" + key).text(value[0]);
            // })
        }
    })
    //End ajax








    function appendStudentsOptions(data, student_id = null) {

        let allStudents = ``;
        response.students.forEach((student) => {
            allStudents += `<option value="${student.id}" ${(student_id == student.id) ? 'selected' : ''}>
                                ${student.name}
                            </option>`
        });

        $('#content-student').html(`<select name="name" class="form-control basic">
                                        <option value="">Choose ...</option>
                                        ${allStudents}
                                    </select>`);

    }

    function appendTypesOptions(data, type = null) {

        //Start append type content
        let allType = ``;
        response.type.forEach((data) => {
            allType += `<option value="${data}" ${(type == data) ? 'selected' : ''}>
                                    ${data}
                        </option>`
        });

        $('#content-type').html(`<select class="form-control" name="type" id="input-type">
                                            <option selected>Select Type</option>
                                            ${allType}
                                 </select>`);

        //End append type content
    }























    // function deleteNote() {
    //     $(".delete-note").off('click').on('click', function (event) {
    //         event.stopPropagation();


    //         console.log('form :  - delete-note');

    //         $(this).parents('.note-item').remove();
    //     })
    // }

    // function favNote() {
    //     $(".fav-note").off('click').on('click', function(event) {
    //       event.stopPropagation();
    //       $(this).parents('.note-item').toggleClass('note-fav');
    //     })
    // }

    // function addLabelGroups() {
    //     $('.tags-selector .label-group-item').off('click').on('click', function(event) {
    //       event.preventDefault();
    //       /* Act on the event */
    //       var getclass = this.className;
    //       var getSplitclass = getclass.split(' ')[0];
    //       if ($(this).hasClass('label-personal')) {
    //         $(this).parents('.note-item').removeClass('note-social');
    //         $(this).parents('.note-item').removeClass('note-work');
    //         $(this).parents('.note-item').removeClass('note-important');
    //         $(this).parents('.note-item').toggleClass(getSplitclass);
    //       } else if ($(this).hasClass('label-work')) {
    //         $(this).parents('.note-item').removeClass('note-personal');
    //         $(this).parents('.note-item').removeClass('note-social');
    //         $(this).parents('.note-item').removeClass('note-important');
    //         $(this).parents('.note-item').toggleClass(getSplitclass);
    //       } else if ($(this).hasClass('label-social')) {
    //         $(this).parents('.note-item').removeClass('note-personal');
    //         $(this).parents('.note-item').removeClass('note-work');
    //         $(this).parents('.note-item').removeClass('note-important');
    //         $(this).parents('.note-item').toggleClass(getSplitclass);
    //       } else if ($(this).hasClass('label-important')) {
    //         $(this).parents('.note-item').removeClass('note-personal');
    //         $(this).parents('.note-item').removeClass('note-social');
    //         $(this).parents('.note-item').removeClass('note-work');
    //         $(this).parents('.note-item').toggleClass(getSplitclass);
    //       }
    //     });
    // }

    // $('.hamburger').on('click', function (event) {
    //     $('.app-note-container').find('.tab-title').toggleClass('note-menu-show')
    //     $('.app-note-container').find('.app-note-overlay').toggleClass('app-note-overlay-show')
    // })
    // $('.app-note-overlay').on('click', function (e) {
    //     $(this).parents('.app-note-container').children('.tab-title').removeClass('note-menu-show')
    //     $(this).removeClass('app-note-overlay-show')
    // })
    // $('.tab-title .nav-pills a.nav-link').on('click', function (event) {
    //     $(this).parents('.app-note-container').find('.tab-title').removeClass('note-menu-show')
    //     $(this).parents('.app-note-container').find('.app-note-overlay').removeClass('app-note-overlay-show')
    // })

    // var $btns = $('.list-actions').click(function () {
    //     if (this.id == 'all-notes') {
    //         var $el = $('.' + this.id).fadeIn();
    //         $('#ct > div').not($el).hide();
    //     } if (this.id == 'important') {
    //         var $el = $('.' + this.id).fadeIn();
    //         $('#ct > div').not($el).hide();
    //     } else {
    //         var $el = $('.' + this.id).fadeIn();
    //         $('#ct > div').not($el).hide();
    //     }
    //     $btns.removeClass('active');
    //     $(this).addClass('active');
    // })

    // $('#btn-add-notes').on('click', function (event) {
    //     $('#notesMailModal').modal('show');
    //     $('#btn-n-save').hide();
    //     $('#btn-n-add').show();
    // })

    // // Button add
    // $("#btn-n-add").on('click', function (event) {
    //     event.preventDefault();
    //     /* Act on the event */
    //     var today = new Date();
    //     var dd = String(today.getDate()).padStart(2, '0');
    //     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    //     var yyyy = today.getFullYear();
    //     var today = mm + '/' + dd + '/' + yyyy;

    //     var $_noteTitle = document.getElementById('n-title').value;
    //     var $_noteDescription = document.getElementById('n-description').value;

    //     $html = '<div class="note-item all-notes">' +
    //         '<div class="note-inner-content">' +
    //         '<div class="note-content">' +
    //         '<p class="note-title" data-noteTitle="' + $_noteTitle + '">' + $_noteTitle + '</p>' +
    //         '<p class="meta-time">' + today + '</p>' +
    //         '<div class="note-description-content">' +
    //         '<p class="note-description" data-noteDescription="' + $_noteDescription + '">' + $_noteDescription + '</p>' +
    //         '</div>' +
    //         '</div>' +
    //         '<div class="note-action">' +
    //         '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fav-note"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> ' +
    //         '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete-note"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>' +
    //         '</div>' +
    //         '<div class="note-footer">' +
    //         '<div class="tags-selector btn-group">' +
    //         '<a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
    //         '<span>' +
    //         '<div class="tags">' +
    //         '<div class="g-dot-personal"></div>' +
    //         '<div class="g-dot-work"></div>' +
    //         '<div class="g-dot-social"></div>' +
    //         '<div class="g-dot-important"></div>' +
    //         '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>' +
    //         '</div>' +
    //         '</span>' +
    //         '</a>' +
    //         '<div class="dropdown-menu dropdown-menu-right d-icon-menu">' +
    //         '<a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> Personal</a>' +
    //         '<a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> Work</a>' +
    //         '<a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> Social</a>' +
    //         '<a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> Important</a>' +
    //         '</div>' +
    //         '</div>' +
    //         '</div>' +
    //         '</div>' +
    //         '</div> ';

    //     $("#note-item").prepend($html);
    //     $('#notesMailModal').modal('hide');

    //     // deleteNote();
    //     // favNote();
    //     // addLabelGroups();
    // });

    // $('#notesMailModal').on('hidden.bs.modal', function (event) {
    //     event.preventDefault();
    //     document.getElementById('n-title').value = '';
    //     document.getElementById('n-description').value = '';
    // })

    // deleteNote();
    // favNote();
    // addLabelGroups();
})

// Validation Process

// var $_getValidationField = document.getElementsByClassName('validation-text');

// getNoteTitleInput = document.getElementById('n-title');

// getNoteTitleInput.addEventListener('input', function() {

//     getNoteTitleInputValue = this.value;

//     if (getNoteTitleInputValue == "") {
//       $_getValidationField[0].innerHTML = 'Title Required';
//       $_getValidationField[0].style.display = 'block';
//     } else {
//       $_getValidationField[0].style.display = 'none';
//     }
// })

// getNoteDescriptionInput = document.getElementById('n-description');

// getNoteDescriptionInput.addEventListener('input', function() {

//   getNoteDescriptionInputValue = this.value;

//   if (getNoteDescriptionInputValue == "") {
//     $_getValidationField[1].innerHTML = 'Description Required';
//     $_getValidationField[1].style.display = 'block';
//   } else {
//     $_getValidationField[1].style.display = 'none';
//   }

// })









































