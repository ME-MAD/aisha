<div class="modal fade" id="editGroupType" tabindex="-1" role="dialog" aria-labelledby="editGroupType"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-dark text-capitalize font-weight-bold ">
                <h5 class="modal-title text-white" id="editGroupType">{{ __('group.edite Group Types') }}</h5>
            </div>
            <div class="modal-body ">
                <form id="editGroupTypeForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="{{ __('group.name') }}" id="name"/>

                    <x-text name="days_num" label="{{ __('group.days_num') }}" id="days_num"/>

                    <x-text name="price" label="{{ __('group.price') }}" id="price"/>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-success font-weight-bold text-capitalize">{{ __('global.Update') }}</button>
                        <button class="btn btn-default font-weight-bold text-capitalize" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>{{ __('global.discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
