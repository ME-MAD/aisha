<div class="modal fade" id="x" tabindex="-1" role="dialog" aria-labelledby="editTeacher" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-dark  ">
                <h5 class="modal-title text-white font-weight-bold"  id="editTeacher">{{ __('teacher.edite teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form id="editTeacherForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                  <h2></h2>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('teacher.Update') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('teacher.Discard') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
