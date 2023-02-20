import {PAGE_NUMBER_ELEMENTS} from "./config.js"

export class Book
{
  pdfDoc = null
  canvas = null
  ctx = null
  scale = 1
  pageNumPending = null
  pageRendering = false
  pageNum = 1;

  constructor(url){
    this.canvas = document.getElementById('the-canvas')
    this.ctx = this.canvas.getContext('2d');
    this.pdfDoc = pdfjsLib.getDocument(url)
  }

  renderPage()
  {
    this.pageRendering = true;

    
    this.pdfDoc.promise.then((pdf) => {
      pdf.getPage(this.pageNum).then((page) => {

        var viewport = page.getViewport({scale: this.scale});
        // this.canvas.height = viewport.height;
        // this.canvas.width = viewport.width;
  
        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: this.ctx,
          viewport: viewport
        };
        var renderTask = page.render(renderContext);
  
        // Wait for rendering to finish
        renderTask.promise.then(() => {
          this.pageRendering = false;
          if (this.pageNumPending !== null) {
            // New page rendering is pending
            this.renderPage(this.pageNumPending);
            this.pageNumPending = null;
          }
        });
      });
    });

    $('#currentPage').html(this.pageNum)
  }




  queueRenderPage(num)
  {
    if (this.pageRendering) 
    {
      this.pageNumPending = num;
    } 
    else 
    {
      this.renderPage(num);
    }
  }
  



  onPrevPage()
  {
    if (this.pageNum <= 1) 
    {
      return;
    }
    this.pageNum--;
    this.queueRenderPage(this.pageNum);
  }



  onNextPage()
  {
    if (this.pageNum >= this.pdfDoc.numPages) 
    {
      return;
    }
    this.pageNum++;
    this.queueRenderPage(this.pageNum);
  }
}





export function handleOpenPageClick(book)
{
    PAGE_NUMBER_ELEMENTS.forEach(className => {
      $(`.${className}`).click(function(){
          let lastPageFinished = $(this).data('last-page-finished') || 1
          let bookElement = document.getElementById('show-lesson-con')
          bookElement.scrollIntoView({
              behavior: 'smooth'
          })

          book.pageNum = lastPageFinished
          book.renderPage()
      })
    });
}























































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