subjectShowHandle()

function subjectShowHandle() 
{
    $('.subjectShowButton').on('click',function(){
        let opensubjecthref = $(this).data('opensubjecthref')
        let subject = $(this).data('subject')

        
        $('#show-lesson-con').append(`
            <img 
                src="/files/subjects/${subject.name}/1.jpg"
                alt=""
                class="w-100"
            >
        `)

        $("#show-lesson-con").turn({
            width: 400,
            height: 300,
            autoCenter: true
        });
        // $.ajax({
        //     url: opensubjecthref,
        //     success: function(response) {
        //         console.log(response);
        //     },
        //     error: function() {}
        // })
    })
}