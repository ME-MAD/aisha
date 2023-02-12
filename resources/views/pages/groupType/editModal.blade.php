<div class="modal fade" id="editGroupType" tabindex="-1" role="dialog" aria-labelledby="editGroupType"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="editGroupType">{{ __('group.edite Group Types') }}</h5>
            </div>
            <div class="modal-body ">
                <form id="editGroupTypeForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" :required="true" label="{{ __('group.name') }}" id="name"/>

                    <div class="row">
                        <div class="col-6">
                            <x-text name="days_num" :required="true" label="{{ __('group.days_num') }}" id="days_num"/>
                        </div>
                        <div class="col-6">
                            <x-text name="price" :required="true" label="{{ __('group.price') }}" id="price"/>
                        </div>
                    </div>

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
