<div class="modal fade" id="creatTeacherModal" tabindex="-1" role="dialog" aria-labelledby="creatTeacherModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatTeacherModal">إضافة مدرس</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.teacher.store') }}" method="post">
                    @csrf
                    
                    <x-text name="name" label="الإسم" :value="old('name')" />

                    <x-date name="birthday" label="تاريخ الميلاد" :value="old('birthday')" />

                    <x-text name="phone" label="الهاتف" :value="old('phone')" />

                    <x-text name="qualification" label="المؤهل" :value="old('qualification')" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
