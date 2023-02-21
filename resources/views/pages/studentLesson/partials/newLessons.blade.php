<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
               الدرس الجديد
            </h3>
        </div>
        <div class="card-body"  >
            <div class="user-info-list">
                <table id="html5-extension_1" class="table table-hover non-hover dataTable no-footer" style="width: 100%;"
                role="grid" aria-describedby="html5-extension_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Position: activate to sort column ascending"
                            style="width: 197px;">From Chapter</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Office: activate to sort column ascending"
                            style="width: 85px;">To Chapter</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Age: activate to sort column ascending" style="width: 32px;">
                            From Page</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Start date: activate to sort column ascending"
                            style="width: 95px;">To Page</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Start date: activate to sort column ascending"
                            style="width: 95px;">Rate</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Salary: activate to sort column ascending"
                            style="width: 61px;">Finished</th>
                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                            colspan="1" aria-label="Salary: activate to sort column ascending"
                            style="width: 61px;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentLesson->syllabus as $syllab)
                        <tr role="row">
                            <td>{{ $syllab->from_chapter }}</td>
                            <td>{{ $syllab->to_chapter }}</td>
                            <td>{{ $syllab->from_page }}</td>
                            <td>{{ $syllab->to_page }}</td>
                            <td>
                                @if ($syllab->rate == 'excellent')
                                    <span class="badge badge-primary">
                                        {{ $syllab->rate }}
                                    </span>
                                @elseif ($syllab->rate == 'very good')
                                    <span class="badge badge-secondary">
                                        {{ $syllab->rate }}
                                    </span>
                                @elseif ($syllab->rate == 'good')
                                    <span class="badge badge-success">
                                        {{ $syllab->rate }}
                                    </span>
                                @elseif ($syllab->rate == 'fail')
                                    <span class="badge badge-danger">
                                        {{ $syllab->rate }}
                                    </span>
                                @endif
                            </td>
                            @if ($syllab->finished == 1)
                                <td><span class="badge badge-success"> Completed
                                    </span></td>
                            @else
                                <td><span class="badge badge-danger">Not Completed </span></td>
                            @endif
                            <td>{{ $syllab->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>



