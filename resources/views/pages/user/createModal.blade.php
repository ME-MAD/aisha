<div class="modal fade" id="creatUserModal" tabindex="-1" role="dialog" aria-labelledby="creatUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="creatUserModalTitle">{{trans('user.add user')}}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <x-text name="name" :required="true" placeholder="أدخل أسم المستخدم" label="{{trans('user.name')}}" :value="old('name')"/>
                           
                        </div>
                        <div class="col-6">
                            <x-text name="email" :required="true" placeholder="أدخل البريد الألكتروني" label="{{trans('user.email')}}" :value="old('email')" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.role')}}
                            <i class="fa-solid fa-star-of-life required-star"></i>
                        </label>
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

                    <div class="row">
                        <div class="col-6">
                            <x-text name="password" :required="true" placeholder="أدخل كلمة المرور" label="{{trans('user.password')}}" :value="old('password')" />
                        </div>
                        <div class="col-6">
                            <x-text name="password_confirmation" :required="true" placeholder="تأكيد كلمة المرور " label="{{trans('user.confirm password')}}" />
                        </div>
                    </div>
                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-capitalize font-weight-bold ">{{trans('user.save')}}</button>
                        <button class="btn btn-light-default  text-capitalize font-weight-bold " data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{trans('user.discard')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
