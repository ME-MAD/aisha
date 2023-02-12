<div class="modal fade" id="creatGroupTypeModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupTypeModal"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light"
                    id="creatGroupTypeModal">{{ __('group.Create Group Type') }}</h5>
            </div>
            <div class="modal-body px-6">
                <form action="{{ route('admin.group_types.store') }}" method="post">
                    @csrf

                    <x-text name="name" :required="true" placeholder="أدخل اسم نوع المجموعة" label="{{ __('group.name') }}" :value="old('name')"/>

                    <div class="row">
                        <div class="col-6">
                            <x-text name="days_num" :required="true" placeholder="أدخل عدد أيام المجموعة" label="{{ __('group.days_num') }}" :value="old('days_num')"/>
                        </div>
                        <div class="col-6">
                            <x-text name="price" :required="true" placeholder="أدخل سعر المجموة" label="{{ __('group.price') }}" :value="old('price')"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-primary font-weight-bold text-capitalize">
                            {{ __('global.Save') }}
                        </button>

                        <button class="btn btn-light-default font-weight-bold text-capitalize" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>{{ __('global.Discard') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
