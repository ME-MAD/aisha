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
