<div class="work-experience layout-spacing ">

    <div class="widget-content widget-content-area">
        <h3 class="">
            Work Experiences
            <a class="text-success float-right creatTeacherExperienceButton" type="button" data-toggle="modal"
                data-target='#creatExperienceModal'>
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
            </a>
        </h3>
        <div class="timeline-alter" id="experience">
        </div>
    </div>
</div>


@include('pages.experience.createModal')

@include('pages.experience.editModal')
