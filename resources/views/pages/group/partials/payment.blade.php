<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4 my-4">
      <div class="card ">
            <div
                  class="card-header d-flex justify-content-between align-items-center card__header__for_tables_show_teacher">
                  <h3 class="text-capitalize text-white">
                        {{ __('group.Payment') }}
                        <span id="paymentsCount" class="badge badge-pill badge-light">{{ $groupPaymentsCount }}</span>
                  </h3>
            </div>
            <div class="card-body">
                  <div class="user-info-list">
                        <div class="table-responsive mb-4 mt-4 ">
                              <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-12 mb-4">
                                                      <select class="form-control basic month"
                                                            name="month{{ $group->id }}" id="month"
                                                            data-group-id="{{ $group->id }}"
                                                            data-href-payment-count="{{ route('admin.payment.getPaymentCountOfGroupByMonth') }}">
                                                            <option value="">
                                                                  {{ __('group.choose the month') }}
                                                            </option>
                                                            <option value="January"
                                                                  {{ $currentMonth == 'January' ? 'selected' : '' }}>

                                                                  {{ __('group.January') }}
                                                            </option>
                                                            <option value="February"
                                                                  {{ $currentMonth == 'February' ? 'selected' : '' }}>
                                                                  {{ __('group.February') }}
                                                            </option>
                                                            <option value="March"
                                                                  {{ $currentMonth == 'March' ? 'selected' : '' }}>
                                                                  {{ __('group.March') }}
                                                            </option>
                                                            <option value="April"
                                                                  {{ $currentMonth == 'April' ? 'selected' : '' }}>
                                                                  {{ __('group.April') }}
                                                            </option>
                                                            <option value="May"
                                                                  {{ $currentMonth == 'May' ? 'selected' : '' }}>
                                                                  {{ __('group.May') }}
                                                            </option>
                                                            <option value="June"
                                                                  {{ $currentMonth == 'June' ? 'selected' : '' }}>
                                                                  {{ __('group.June') }}
                                                            </option>
                                                            <option value="July"
                                                                  {{ $currentMonth == 'July' ? 'selected' : '' }}>
                                                                  {{ __('group.July') }}
                                                            </option>
                                                            <option value="August"
                                                                  {{ $currentMonth == 'August' ? 'selected' : '' }}>
                                                                  {{ __('group.August') }}
                                                            </option>
                                                            <option value="September"
                                                                  {{ $currentMonth == 'September' ? 'selected' : '' }}>
                                                                  {{ __('group.September') }}
                                                            </option>
                                                            <option value="October"
                                                                  {{ $currentMonth == 'October' ? 'selected' : '' }}>
                                                                  {{ __('group.October') }}
                                                            </option>
                                                            <option value="November"
                                                                  {{ $currentMonth == 'November' ? 'selected' : '' }}>
                                                                  {{ __('group.November') }}
                                                            </option>
                                                            <option value="December"
                                                                  {{ $currentMonth == 'December' ? 'selected' : '' }}>
                                                                  {{ __('group.December') }}
                                                            </option>
                                                      </select>
                                                </div>
                                                <div class="table-responsive group_show_card_scroll">
                                                      <table
                                                            class="table table-bordered table-hover table-striped mb-4">
                                                            <thead>
                                                                  <tr>
                                                                        <th class="text-secondary">
                                                                              {{ __('group.S.No') }}</th>
                                                                        <th class="text-secondary">
                                                                              {{ __('group.Name') }}</th>
                                                                        <th class="text-secondary">
                                                                              {{ __('group.Paid') }}</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>

                                                                  @foreach ($group->groupStudents as $groupStudent)
                                                                        <tr role="row">
                                                                              <td>{{ $groupStudent->student->id }}</td>
                                                                              <td class="sorting_1 sorting_2">
                                                                                    <div class="d-flex">
                                                                                          <div
                                                                                                class="usr-img-frame mr-2 rounded-circle">
                                                                                                @if ($groupStudent->student->avatar)
                                                                                                      <img alt="avatar"
                                                                                                            class="img-fluid rounded-circle"
                                                                                                            src="{{ $groupStudent->student->avatar }}">
                                                                                                @else
                                                                                                      <img src="{{ asset('images/Spare.jpg') }}"
                                                                                                            class="img-fluid rounded-circle"
                                                                                                            class="avatar-image">
                                                                                                @endif
                                                                                          </div>
                                                                                          <a
                                                                                                href="{{ route('admin.student.show', $groupStudent->student->id) }}">
                                                                                                <p
                                                                                                      class="align-self-center mb-0 admin-name text-primary">
                                                                                                      {{ $groupStudent->student->name }}
                                                                                                </p>
                                                                                          </a>
                                                                                    </div>
                                                                              </td>
                                                                              <td id="checkbok">
                                                                                    <input type="checkbox"
                                                                                          class="paidCheckbox big-checkbox"
                                                                                          id="paidCheckbox-{{ $group->id }}-{{ $groupStudent->student->id }}"
                                                                                          data-student-id="{{ $groupStudent->student->id }}"
                                                                                          data-group-id="{{ $group->id }}"
                                                                                          data-amount="{{ $group->groupType->price }}"
                                                                                          {{ $groupStudent->student->checkPaid($group->id, $currentMonth) ? 'checked' : '' }}>
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
      </div>
</div>
