<div class="modal fade" id="creatUserModal" tabindex="-1" role="dialog" aria-labelledby="creatUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize font-weight-bold text-muted" id="creatUserModalTitle">{{trans('user.add user')}}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <x-text name="name" label="{{trans('user.name')}}" :value="old('name')"/>
                        </div>
                        <div class="col-6">
                            <x-text name="email" label="{{trans('user.email')}}" :value="old('email')" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">{{trans('user.role')}}</label>
                        <select class="form-control basic"
                                name="role"
                                id="role">
                            <option >{{trans('user.roles')}}</option>

                            @foreach ($roles as $role)

                                <option  class="active" value="{{$role->name}}">{{$role->name}}</option>

                            @endforeach
                        </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-text name="password" label="{{trans('user.password')}}" :value="old('password')" />

                    <x-text name="password_confirmation" label="{{trans('user.confirm password')}}" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-capitalize font-weight-bold ">{{trans('user.save')}}</button>
                        <button class="btn btn-light-default  text-capitalize font-weight-bold " data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{trans('user.discard')}}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
