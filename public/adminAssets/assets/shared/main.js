$(document).ready(function () {
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content") } });

    refreshAllTableLinks()

    $('.showSurahOfLesson').on('click',function(){
        let lesson = $(this).data('lesson')
        let href = $(this).data('href')

        $('#show-lesson').html('')
        $.ajax({
            url: href,
            data: {
                lesson_title: lesson.title,
                lesson_chapters_count: lesson.chapters_count
            },
            success: function(response) {
                for (const verse in response.surah) {
                    $('#show-lesson').append(`
                        <span class="quraanVerse num${verse}">${response.surah[verse]}</span>
                    `)
                }
            },
            error: function() {}
        })
    })
})

function areYouSureForLinks()
{
    $('.ays').on('click',function(e){
        e.preventDefault()
        var href = $(this).attr('href');
        message ="Are You Sure";
        Swal.fire({
            title: `${message}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.value) {
                location.href = href
            }
        });
    });
}

function refreshAllTableLinks()
{
    areYouSureForLinks();
}


function areYouSure(formId,message = "")
{
    message = message == "" ? "Are You Sure" : message;
    $(`#${formId}`).submit(function(e){
        e.preventDefault()
        Swal.fire({
            title: `${message}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit()
            }
        });
    })
}

