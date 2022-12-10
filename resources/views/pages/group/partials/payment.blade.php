<div class="card component-card_4 col-sm-12">
    <div class="card-body ">
        <div class="table-responsive mb-4 mt-4 ">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">

                        <table id="zero-config3" class="table table-hover dataTable">

                            <thead>
                                <div class="col-sm-12 mb-4"> <select class="form-control basic month" name="month"
                                        id="month" data-group=""
                                        data-href="{{ route('admin.payment.getMonthOfPayment') }}">
                                        <option value="{{ $currentMonth }}" selected="selected">
                                            {{ $currentMonth }}
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select></div>
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
                                            <input type="checkbox" {{ $payment->paid ? 'checked' : '' }}>
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
