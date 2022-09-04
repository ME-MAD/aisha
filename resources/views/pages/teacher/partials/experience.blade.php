<div class="work-experience layout-spacing ">

      <div class="widget-content widget-content-area">
            <h3 class="">
                  Work Experiences
                  <a class="text-success float-right" type="button" data-toggle="modal" data-target="#createExperienceModal">
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
                                <p class="">{{ $experience->date->diffForHumans() }}</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                              <a 
                              class="editExperienceButton title" 
                              data-experience="{{$experience}}"
                              data-date="{{$experience->date->format('Y-m-d')}}"
                              data-toggle="modal" 
                              data-target="#editExperience" 
                              data-href="{{route('admin.experience.update',$experience->id)}}">

                                <p class="text-primary">{{ $experience->title }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
      </div>
</div>

<!--  modal tamplet Creat -->

<div class="modal fade" id="createExperienceModal" tabindex="-1" role="dialog" aria-labelledby="createExperienceModal"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="createExperienceModal">إضافة مؤهل</h5>
                  </div>
                  <div class="modal-body">
                        <form action="{{ route('admin.experience.store') }}" method="post">
                              @csrf

                              <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                              <x-text name="title" label="العنوان" :value="old('title')" />

                              <x-date name="date" label="التاريخ" :value="old('date')" />
                             


                            

                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                              </div>

                        </form>
                  </div>

            </div>
      </div>
</div>

<!--  modal tamplet Edit -->
    
<div class="modal fade" id="editExperience" tabindex="-1" role="dialog" aria-labelledby="editExperience" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExperience">تعديل العنوان</h5>
            </div>
            <div class="modal-body">
                <form
                id="editExperienceForm" 
                method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                    <x-text name="title" label="العنوان" id="title"/>

                    {{-- <x-date name="date" label="التاريخ" 
                    id="date"/> --}}
                    <div class="date-field">
                        <label for="date">التاريخ</label>
                    </div>
                    
                    <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

              </form>
            </div>
        </div>
    </div>
</div>





