<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="editUserTitle">{{trans('user.edit user')}}</h5>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6">
                            <x-text name="name" :required="true" label="{{trans('user.name')}}" />
                        </div>
                        <div class="col-6">
                            <x-text name="email" :required="true" label="{{trans('user.email')}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.role')}}
                           <i class="fa-solid fa-star-of-life" style="color:rgba(255, 0, 0, 0.778)"></i>
                        </label>
                        <select class="form-control basic"
                                name="role"
                                id="role">

                            <option value="" >اختر وظيفة</option>

                            @foreach ($roles as $role)
                                <option  class="active" value="{{$role->name}}">
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <x-text name="password"  label="{{trans('user.password')}}"/>
                        </div>
                        <div class="col-6">
                            <x-text name="password_confirmation"  label="{{trans('user.confirm password')}}" />
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success text-capitalize font-weight-bold">{{trans('user.update')}}</button>
                        <button class="btn btn-light-default text-capitalize font-weight-bold" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{trans('user.discard')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
