<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark rounded">
                <h5 class="modal-title text-white font-weight-bold text-capitalize"
                    id="editRoleModalTitle">{{__("roles.update role")}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRoleForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <x-text name="name"
                                label="{{__('roles.update name')}}"
                                class="text-capitalize text-muted font-weight-bold"
                        />
                    </div>
                    <div class="form-group mb-3">
                        <x-text name="display_name"
                                label="{{__('roles.update display_name')}}"
                                class="text-capitalize text-muted font-weight-bold"
                        />
                    </div>
                    <div class="form-group mb-3">
                        <x-textarea name="description"
                                    label="{{__('roles.update description')}}"
                                    class="text-capitalize text-muted font-weight-bold"
                        />
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-success font-weight-bold text-white">{{__('globalWorld.update')}}</button>
                        <button class="btn btn-danger font-weight-bold text-white" data-dismiss="modal"><i
                                    class="flaticon-cancel-12"></i>{{__('globalWorld.discard')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

