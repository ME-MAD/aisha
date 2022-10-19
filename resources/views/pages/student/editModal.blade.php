<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning ">
                <h5 class="modal-title text-white" id="editStudent">تعديل بيانات الطالب</h5>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="الإسم" id="name" />

                    <x-date name="birthday" label="تاريخ الميلاد" id="birthday" />

                    <x-text name="phone" label="الهاتف" id="phone" />

                    <x-text name="qualification" label="المؤهل" id="qualification" />


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
