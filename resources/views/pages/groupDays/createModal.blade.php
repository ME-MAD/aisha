<div class="modal fade" id="creatGroupDayModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupDayModal"
     aria-hidden="true" data-toggle="modal" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="creatGroupDayModal">
                    {{ __('group.Create Group Days') }}
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.group_day.store') }}" method="post">
                    @csrf

                    <div class="row">
                        @if (!isset($group))
                            <div class="col-6">
                        @else
                            <div class="col-12">
                        @endif
                            <div class="form-group row mb-4">
                                <label for="day" class="col-xl-12 col-md-6  col-form-label text-dark font-weight-bold">
                                    {{ __('group.day') }}
                                    <i class="fa-solid fa-star-of-life required-star"></i>
                                </label>
                                <div class="col-xl-12 col-md-6  ">
                                    <select class="form-control selectpicker" style="width: 100%;" name="day"
                                            id="day">
                                        <option value="Monday">
                                            {{ __('group.Monday') }}
                                        </option>
        
                                        <option value="Tuesday">
                                            {{ __('group.Tuesday') }}
                                        </option>
        
                                        <option value="Wednesday">
                                            {{ __('group.Wednesday') }}
                                        </option>
        
                                        <option value="Thursday">
                                            {{ __('group.Thursday') }}
                                        </option>
        
                                        <option value="Friday">
                                            {{ __('group.Friday') }}
                                        </option>
        
                                        <option value="Saturday">
                                            {{ __('group.Saturday') }}
                                        </option>
        
                                        <option value="Sunday">
                                            {{ __('group.Sunday') }}
                                        </option>
        
                                    </select>
                                    @error('day')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        
                        <div class="col-6">
                            @if (!isset($group))
                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-12 col-md-6  col-form-label text-dark font-weight-bold">
                                    {{ __('group.Choose group') }}
                                    <i class="fa-solid fa-star-of-life required-star"></i>
                                </label>
                                <div class="col-xl-12 col-md-6  ">
                                    <select class="form-control basic" style="width: 100%;" name="group_id"
                                            id="group_id" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
                                        <option value=""> {{ __('group.Choose group') }}</option>
                                        @foreach ($groups as $group)
                                            @if (!$group->checkIfGroupExceededGroupDaysLimit())
    
                                                <option
                                                    value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                    <p class="text-danger" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
                                        {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}"
                                   data-groupid="{{ $group->id }}">
                        @endif
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-time name="from_time" :required="true" id="from_time" label="{{ __('group.from') }}" :value="old('from_time')"/>
                        </div>
                        <div class="col-6">
                            <x-time name="to_time" :required="true" id="to_time" label="{{ __('group.to') }}" :value="old('to_time')"/>
                        </div>
                    </div>
                   
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-outline-dark">
                            {{ __('global.Save') }}
                        </button>

                        <button class="btn btn-outline-danger" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>
                            {{ __('global.Discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
