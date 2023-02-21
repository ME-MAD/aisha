<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
            <h3 class="text-capitalize text-white">
                مراجعة الدرس
            </h3>
        </div>
        <div class="card-body"  >
            <div class="user-info-list">
                <table id="html5-extension_1" class="table table-hover non-hover dataTable no-footer" style="width: 100%;"
                role="grid" aria-describedby="html5-extension_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label="Name: activate to sort column descending"
                            style="width: 177px;">id</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="from_chapter: activate to sort column ascending"
                            style="width: 275px;">from_chapter</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="to_chapter: activate to sort column ascending"
                            style="width: 125px;">to_chapter</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="from_page: activate to sort column ascending"
                            style="width: 55px;">from_page</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="to_page: activate to sort column ascending"
                            style="width: 94px;">to_page</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="finished: activate to sort column ascending"
                            style="width: 94px;">finished</th>
                        <th class="sorting" tabindex="0" aria-controls="zero-config"
                            rowspan="1" colspan="1"
                            aria-label="rate: activate to sort column ascending"
                            style="width: 94px;">rate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentLessonReview->syllabusReviews as $syllabusReview)
                        <tr role="row">
                            <td class="sorting_1">{{ $syllabusReview->id }}</td>
                            <td>{{ $syllabusReview->from_chapter }}</td>
                            <td>{{ $syllabusReview->to_chapter }}</td>
                            <td>{{ $syllabusReview->from_page }}</td>
                            <td>{{ $syllabusReview->to_page }}</td>

                            @if ($syllabusReview->finished == 1)
                                <td><span class="badge badge-success"> Completed
                                    </span></td>
                            @else
                                <td><span class="badge badge-danger">Not Completed </span></td>
                            @endif
                            </td>
                            <td>
                                @if ($syllabusReview->rate == 'excellent')
                                    <span class="badge badge-primary">
                                        {{ $syllabusReview->rate }}
                                    </span>
                                @elseif ($syllabusReview->rate == 'very good')
                                    <span class="badge badge-secondary">
                                        {{ $syllabusReview->rate }}
                                    </span>
                                @elseif ($syllabusReview->rate == 'good')
                                    <span class="badge badge-success">
                                        {{ $syllabusReview->rate }}
                                    </span>
                                @elseif ($syllabusReview->rate == 'fail')
                                    <span class="badge badge-danger">
                                        {{ $syllabusReview->rate }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>