// var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
// pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 0.8,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});




















































// import {PAGE_NUMBER_ELEMENTS} from "./config.js"


// export function handleShowingOfTheBook(pageCount = 1, subject){
//     let book = null;
//     $('#show-lesson-con').remove('')
//     $('#next').remove()
//     $('#prev').remove()
//     $('#navButtonsForBook').html(`
//         <button class="btn btn-info" id="prev">
//             <i class="fa-solid fa-left-long"></i>
//         </button>
//         <button class="btn btn-info" id="next">
//             <i class="fa-solid fa-right-long"></i>
//         </button>
//     `)
//     $('#zoom-view-port').html(`
//         <div id="show-lesson-con">

//         </div>
//     `)

//     const fullPage = document.querySelector('#fullpage');

//     $('#show-lesson-con').append(`
//         <div>
//             <img
//                 src="/files/subjects/${subject.name}/1.jpg"
//                 alt=""
//                 class="w-100 full--screen"
//                 height="1200"
//             >
//         </div>
//     `)

//     book = $('#show-lesson-con').turn({
//         duration:1000,
//         direction: "rtl",
//         height: 1200,
//         display: "single"
//     });

//     for(let  i = 1; i <= pageCount; i++)
//     {
//         if( !book.turn('hasPage',i) ){
//             addPage(book, subject.name, i)
//         }
//     }

//     $('.full--screen').on('click',function(){
//         fullPage.style.backgroundImage = 'url(' + this.src + ')';
//         fullPage.style.display = 'block';
//     })

//     book.bind('start',
//         function (event, pageObject, corner)
//         {
//             if (corner == 'tl' || corner == 'tr' || corner == 'bl' || corner == 'br')
//             {
//                 event.preventDefault();
//             }
//         }
//     );

//     $('#prev').on('click',function(){
//         book.turn("previous");
//     })

//     $('#next').on('click',function(){
//         pageCount += 1
//         if(subject.pages_count >= pageCount)
//         {
//             addPage(book, subject.name, pageCount)
//         }

//         pageCount += 1
//         if(subject.pages_count >= pageCount)
//         {
//             addPage(book, subject.name, pageCount)
//         }

//         $('.full--screen').on('click',function(){
//             fullPage.style.backgroundImage = 'url(' + this.src + ')';
//             fullPage.style.display = 'block';
//         })

//         book.turn("next");
//     })

//     book.turn('page',pageCount)
// }

// function addPage(book, subjectName, pageCount){
//     book.turn('addPage',`
//         <div>
//             <img
//                 src="/files/subjects/${subjectName}/${pageCount}.jpg"
//                 alt=""
//                 class="w-100 full--screen"
//                 height="1200"
//             >
//         </div>
//     `)
//     book.turn('pages', pageCount)
// }

// function openPageFromTheBook(subject, className = '')
// {
//     $(`.${className}`).click(function(){
//         let lastPageFinished = $(this).data('last-page-finished') || 1
//         let bookElement = document.getElementById('show-lesson-con')
//         bookElement.scrollIntoView({
//             behavior: 'smooth'
//         })
//         handleShowingOfTheBook(lastPageFinished , subject)
//     })
// }

// export function handleOpenPageClick(subject)
// {
//     PAGE_NUMBER_ELEMENTS.forEach(className => {
//         openPageFromTheBook(subject, className)
//     });
// }