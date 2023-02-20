<div class="skills layout-spacing ">
    <div class="widget-content widget-content-area">
        <h3 class="">Quran Surah</h3>
        <div class="zoom-view-port" id="zoom-view-port">
            <div id="show-lesson-con">
                <canvas id="the-canvas" width="800px" height="800px"></canvas>
            </div>
        </div>
        <div class="buttons text-center mt-4" id="navButtonsForBook">

            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                <button class="btn btn-info" id="next">
                    <i class="fa-solid fa-right-long"></i>
                </button>

                <span class="mx-3 badge bg-secondary" id="currentPage">0</span>

                <button class="btn btn-info" id="prev">
                    <i class="fa-solid fa-left-long"></i>
                </button>
            @else
                <button class="btn btn-info" id="prev">
                    <i class="fa-solid fa-left-long"></i>
                </button>

                <span class="mx-3 badge bg-secondary" id="currentPage">0</span>

                <button class="btn btn-info" id="next">
                    <i class="fa-solid fa-right-long"></i>
                </button>
            @endif
           
        </div>
    </div>
</div>

<div id="fullpage" onclick="this.style.display='none';"></div>


{{-- <embed id="embed" src="" type="application/pdf" width="100%" height="600px" /> --}}

{{-- <object id="embed" type="application/pdf" data="" width="995" height="841" ></object>

<a href="http://127.0.0.1:8000/files/subjects/%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7%D8%A7_book.pdf#page=8">Jump to page 9</a> --}}


{{-- 

<div>
    <button class="btn btn-primary" id="xxx">XXXX</button>
    <button class="btn btn-primary" id="zzz">ZZZZ</button>
</div> --}}