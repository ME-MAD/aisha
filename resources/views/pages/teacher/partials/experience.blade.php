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
        <div class="timeline-alter">
            @foreach ($experiences as $experience)
                <div class="item-timeline">
                    <div class="t-meta-date">
                        <p class="">{{ $experience->from }}</p>
                        <p class="">{{ $experience->to }}</p>
                    </div>
                    <div class="t-dot" data-original-title="" title="">
                    </div>
                    <div class="t-text">
                        <a class="editExperienceButton title" data-experience="{{ $experience }}" data-toggle="modal"
                            data-target="#editexperience"
                            data-href="{{ route('admin.experience.update', $experience->id) }}">

                            <p>{{ $experience->title }}</p>
                        </a>
                    </div>

                    <div class="deleteButton">
                        <a href="{{ route('admin.experience.delete', $experience->id) }}">
                            <i class="fa-solid fa-rectangle-xmark"></i>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>


@include('pages.experience.createModal')

@include('pages.experience.editModal')
