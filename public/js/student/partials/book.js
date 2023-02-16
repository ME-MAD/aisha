export function handleShowingOfTheBook(pageCount = 1, subject){
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
        if(subject.pages_count >= pageCount)
        {
            addPage(book, subject.name, pageCount)
        }

        pageCount += 1
        if(subject.pages_count >= pageCount)
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