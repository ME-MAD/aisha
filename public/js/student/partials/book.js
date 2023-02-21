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
    this.canvas = document.getElementById('book-canvas')
    this.ctx = this.canvas.getContext('2d');
    this.pdfDoc = pdfjsLib.getDocument(url)
  }

  renderPage()
  {
    this.pageRendering = true;

    
    this.pdfDoc.promise.then((pdf) => {
      pdf.getPage(this.pageNum).then((page) => {

        var viewport = page.getViewport({scale: this.scale});
        console.log(viewport);
        console.log($(window).width());
        console.log($(window).height());
        // this.canvas.height = $(window).height();
        // this.canvas.width = $(window).width() - 100;
        // viewport.height = $(window).height()
        // viewport.width = $(window).width();
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

          $('#showBookModal').modal('show')

          book.pageNum = lastPageFinished
          book.renderPage()
         
      })
    });
}

