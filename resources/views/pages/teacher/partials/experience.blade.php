<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables">
            <h3 class="text-capitalize text-white">
                {{ __('teacher.Experiences') }}
            </h3>
            <a class="icon text-white" data-toggle="modal" 
            data-target="#creatTeacherModal">
                <i class="fa-solid fa-plus fa-2xl"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-light table-bordered table-hover mb-4">
                    <thead>
                        <tr class="bg-dark">
                            <th class="text-light">Id</th>
                            <th class="text-light">Title</th>
                            <th class="text-light">From</th>
                            <th class="text-center text-light">To</th>
                            <th class="text-center text-light">
                                Edit
                            </th>
                            <th class="text-center text-light">
                                Delte
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experiences as $experience)
                            <tr>
                                <td>{{$experience->id}}</td>
                                <td>{{$experience->title}}</td>
                                <td>{{$experience->from}}</td>
                                <td>{{$experience->to}}</td>
                                <td>10/08/2021</td>
                                <td>320</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@include('pages.experience.createModal')

@include('pages.experience.editModal')
