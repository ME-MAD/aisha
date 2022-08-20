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
                            <a class="editExperienceTitleButton" data-toggle="modal" data-target="#editExperienceTitleModal" data-title="{{ $experience->title }}">
                                <p>{{ $experience->title }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
      </div>

</div>


    
<div class="modal fade" id="editExperienceTitleModal" tabindex="-1" role="dialog" aria-labelledby="editExperienceTitleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExperienceTitleModal">تعديل العنوان</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.experience.store') }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                    <div class="form-group row mb-4">
                          <label for="title"
                                class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">العنوان</label>
                          <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="title" placeholder=""
                                      name="title">
                          </div>
                    </div>

                    <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

              </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


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
