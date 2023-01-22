<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserTitle">{{trans('user.edit user')}}</h5>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="post">
                    @csrf
                    @method('PUT')


                    <x-text name="name" label="{{trans('user.name')}}" />
                    <x-text name="email" label="{{trans('user.email')}}" />

                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">{{trans('user.role')}}</label>
                        <select class="form-control basic"
                                name="role"
                                id="editRole">

                            <option >{{trans('user.roles')}}</option>

                            @foreach ($roles as $role)

                                <option  class="active" value="{{$role->name}}">{{$role->name}}</option>

                            @endforeach
                        </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-text name="password" label="{{trans('user.password')}}"/>

                    <x-text name="password_confirmation" label="{{trans('user.confirm password')}}" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success text-capitalize font-weight-bold">{{trans('user.update')}}</button>
                        <button class="btn btn-light-default text-capitalize font-weight-bold" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{trans('user.discard')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
