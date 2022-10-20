<div class="modal fade" id="editGroupType" tabindex="-1" role="dialog" aria-labelledby="editGroupType" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning ">
                <h5 class="modal-title text-white" id="editGroupType">تعديل نوع المجموعة</h5>
            </div>
            <div class="modal-body">
                <form id="editGroupTypeForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="الاسم" id="name" />

                    <x-text name="days_num" label="عدد الايام" id="days_num" />

                    <x-text name="price" label="السعر" id="price" />



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
