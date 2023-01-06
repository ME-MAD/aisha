{{--<div class="modal fade" id="creatUserModal" tabindex="-1" role="dialog" aria-labelledby="creatUserModal"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="creatUserModalTitle">إضافة درس</h5>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form action="{{ route('admin.user.store') }}" method="post">--}}
{{--                    @csrf--}}

{{--                    <x-text name="name" label="name" :value="old('name')"/>--}}

{{--                    <x-text name="email" label="Email" :value="old('email')"/>--}}

{{--                    <x-text name="password" label="Password" :value="old('password')"/>--}}

{{--                    <x-text name="password_confirmation" label="Confirm Password"/>--}}

{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{-- Create Modal --}}
<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark  ">
                <h5 class="modal-title text-capitalize text-white" id="createRoleModalLabel">{{__('roles.create')}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.role.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-3">

                        <x-text name="name"
                                label="{{__('roles.create name')}}"
                                class="text-capitalize text-muted "
                                :value="old('name')"/>
                    </div>
                    <div class="form-group mb-3">
                        <x-text name="display_name" label="{{__('roles.create display_name')}}"
                                class="text-capitalize text-muted "
                                :value="old('display_name')"/>
                    </div>
                    <div class="form-group mb-3">
                        <x-textarea name="description"
                                    label="{{__('roles.create description')}}"
                                    class="text-capitalize text-muted "
                                    :value="old('description')"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-danger font-weight-bold text-white"
                            data-dismiss="modal">{{__('globalWorld.Close')}}</button>
                    <button type="submit"
                            class="btn btn-primary font-weight-bold text-white">{{__('globalWorld.create')}}</button>
                </div>
            </form>


        </div>
    </div>
</div>
