<div class="card component-card_4 col-sm-12">
    <div class="card-body ">
        <div class="table-responsive mb-4 mt-4 ">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12 mb-4">
                            <select class="form-control basic month" name="month" id="month"
                                data-group="{{ $group->id }}"
                                data-href="{{ route('admin.payment.getMonthOfPayment') }}">
                                <option value="" selected="selected">
                                    choose the month
                                </option>
                                <option value="January" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    January</option>
                                <option value="February" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    February</option>
                                <option value="March" selected="selected" {{ $currentMonth ? 'selected' : '' }}>March
                                </option>
                                <option value="April" selected="selected" {{ $currentMonth ? 'selected' : '' }}>April
                                </option>
                                <option value="May" selected="selected" {{ $currentMonth ? 'selected' : '' }}>May
                                </option>
                                <option value="June" selected="selected" {{ $currentMonth ? 'selected' : '' }}>June
                                </option>
                                <option value="July" selected="selected" {{ $currentMonth ? 'selected' : '' }}>July
                                </option>
                                <option value="August" selected="selected" {{ $currentMonth ? 'selected' : '' }}>August
                                </option>
                                <option value="September" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    September</option>
                                <option value="October" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    October</option>
                                <option value="November" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    November</option>
                                <option value="December" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    December</option>
                            </select>
                        </div>
                        <table id="zero-config3" class="table table-hover dataTable">

                            <thead>

                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 82px;">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="birthDay: activate to sort column ascending" style="width: 70px;">
                                        Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="paid: activate to sort column ascending" style="width: 70px;">
                                        Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="paid: activate to sort column ascending" style="width: 70px;">
                                        Paid</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->payments as $payment)
                                    <tr role="row">
                                        <td>{{ $payment->id }}</td>
                                        <td class="sorting_1 sorting_2">
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 admin-name">
                                                    {{ $payment->student->name }} </p>
                                            </div>
                                        </td>
                                        <td>{{ $payment->amount }}</td>
                                        <td id="checkbok">
                                            <input type="checkbox" class="paid_finished_checkbox big-checkbox"
                                                id="paid_finished_checkbox_{{ $payment->student->id }}_{{ $payment->group->id }}"
                                                data-href="{{ route('admin.payment.store') }}"
                                                data-student="{{ $payment->student->id }}"
                                                data-group="{{ $payment->group->id }}"
                                                data-amount="{{ $payment->group->groupType->price }}"
                                                {{ $payment->paid ? 'checked' : '' }}>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Amount</th>
                                    <th rowspan="1" colspan="1">Paid</th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
