  {{-- <div class="widget-content widget-content-area">
      <div class="bio-skill-box">
          <div class="row">
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Subject</h5>
                          <p>{{ $studentLesson->lesson->subject->name ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Lesson</h5>
                          <p>{{ $studentLesson->lesson->title ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Student</h5>
                          <p>{{ $studentLesson->student->name ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Group</h5>
                          <p>{{ $studentLesson->group->from ?? '' }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}




  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
               بيانات  
            </h3>
        </div>
        <div class="card-body"  >
            <div class="user-info-list">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">المادة</h6>
                        </th>
                        <td>
                            {{ $studentLesson->lesson->subject->name ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">الدرس</h6>
                        </th>
                        <td> 
                            {{ $studentLesson->lesson->title ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">الطالب</h6>
                        </th>
                        <td> 
                            {{ $studentLesson->student->name ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">المجموعة</h6>
                        </th>
                        <td> 
                            {{ $studentLesson->group->from ?? '' }}
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


