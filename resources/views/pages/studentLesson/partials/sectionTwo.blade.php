 {{-- <div class="widget-content widget-content-area">
     <h3 class="">Lesson : {{ $studentLesson->lesson->title ?? '' }}</h3>

     <div class="bio-skill-box">
         <div class="row">
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Chapters Count</h5>
                         <p>{{ $studentLesson->lesson->chapters_count ?? '' }}</p>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Lesson Starts From</h5>
                         <p>{{ $studentLesson->lesson->from_page ?? '' }}</p>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Lesson Ends At</h5>
                         <p>{{ $studentLesson->lesson->to_page ?? '' }}</p>
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
               معلومات عن الدرس  
            </h3>
        </div>
        <div class="card-body"  >
            <div class="user-info-list">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">العدد الكلي لدرس</h6>
                        </th>
                        <td>
                            {{ $studentLesson->lesson->chapters_count ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">يبدأ الدرس من</h6>
                        </th>
                        <td> 
                            {{ $studentLesson->lesson->from_page ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                            <h6 class="text-secondary">ينتهى الدرس  إلى</h6>
                        </th>
                        <td> 
                            {{ $studentLesson->lesson->to_page ?? '' }}
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
