<div class="card component-card_4 col-sm-12">
    <div class="card-body ">
        <div class="table-responsive mb-4 mt-4 ">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12 mb-4">
                            <select class="form-control basic month" name="month{{$group->id}}" id="month"
                                data-group-id="{{ $group->id }}"
                                data-href-payment-count="{{ route('admin.payment.getPaymentCountOfGroupByMonth') }}">
                                <option value="">
                                    {{ __('group.choose the month') }}
                                </option>
                                <option value="January" {{ $currentMonth == "January" ? 'selected' : '' }}>

                                    {{ __('group.January') }}
                                </option>
                                <option value="February" {{ $currentMonth == "February" ? 'selected' : '' }}>
                                    {{ __('group.February') }}
                                </option>
                                <option value="March" {{ $currentMonth == "March" ? 'selected' : '' }}>
                                    {{ __('group.March') }}
                                </option>
                                <option value="April" {{ $currentMonth == "April" ? 'selected' : '' }}>
                                    {{ __('group.April') }}
                                </option>
                                <option value="May" {{ $currentMonth == "May" ? 'selected' : '' }}>
                                    {{ __('group.May') }}
                                </option>
                                <option value="June" {{ $currentMonth == "June" ? 'selected' : '' }}>
                                    {{ __('group.June') }}
                                </option>
                                <option value="July" {{ $currentMonth == "July" ? 'selected' : '' }}>
                                    {{ __('group.July') }}
                                </option>
                                <option value="August" {{ $currentMonth == "August" ? 'selected' : '' }}>
                                    {{ __('group.August') }}
                                </option>
                                <option value="September" {{ $currentMonth == "September" ? 'selected' : '' }}>
                                    {{ __('group.September') }}
                                </option>
                                <option value="October" {{ $currentMonth == "October" ? 'selected' : '' }}>
                                    {{ __('group.October') }}
                                </option>
                                <option value="November" {{ $currentMonth == "November" ? 'selected' : '' }}>
                                    {{ __('group.November') }}
                                </option>
                                <option value="December" {{ $currentMonth == "December" ? 'selected' : '' }}>
                                    {{ __('group.December') }}
                                </option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-4">
                                <thead>
                                    <tr>
                                        <th>{{ __('group.S.No') }}</th>
                                        <th>{{ __('group.Name') }}</th>
                                        <th>{{ __('group.Paid') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                        
                                    @foreach ($group->students as $student)
                                        <tr role="row">
                                            <td>{{ $student->id }}</td>
                                            <td class="sorting_1 sorting_2">
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        @if ($student->avatar)
                                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                                src="{{ $student->avatar }}">
                                                        @else
                                                            <img src="{{ asset('images/Spare.jpg') }}"
                                                                class="img-fluid rounded-circle" class="avatar-image">
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('admin.student.show', $student->id) }}">
                                                        <p class="align-self-center mb-0 admin-name text-primary">
                                                            {{ $student->name }} </p>
                                                    </a>
                                                </div>
                                            </td>
                                            <td id="checkbok">
                                                <input type="checkbox"
                                                    class="paidCheckbox big-checkbox"
                                                    id="paidCheckbox-{{ $group->id }}-{{ $student->id }}"
                                                    data-student-id="{{ $student->id }}"
                                                    data-group-id="{{ $group->id }}"
                                                    data-amount="{{ $group->groupType->price }}"
                                                    {{ $student->checkPaid($group->id, $currentMonth) ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

