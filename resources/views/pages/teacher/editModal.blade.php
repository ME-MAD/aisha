<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog" aria-labelledby="editTeacher" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTeacher">تعديل بيانات المعلم</h5>
            </div>
            <div class="modal-body">
                <form id="editTeacherForm" method="post">
                    @csrf
                    @method('PUT')

                    {{-- <input type="hidden" name="teacher_id" id="teacher_id" /> --}}

                    <x-text name="name" label="الإسم" id="name" />

                    <x-date name="birthday" label="تاريخ الميلاد" id="birthday" />

                    <x-text name="phone" label="الهاتف" id="phone" />

                    <x-text name="qualification" label="المؤهل" id="qualification" />


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
