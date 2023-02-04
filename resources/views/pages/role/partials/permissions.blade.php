<div class="table-responsive">
    <table class="table table-bordered mb-4 text-left">
        <thead>
        <tr>
            <th>Table</th>
            <th>Create</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
            <th>Index</th>
            <th>Store</th>
        </tr>
        </thead>
        <tbody>
        @foreach (getPermissionsForView() as $table => $permissions)
            <tr>
                <td>
                    <label class="control control-checkbox">
                        {{$table}}
                        <input type="checkbox" name="permissions[{{$table}}][]" id="{{$table}}" class="checkAll auto"
                               data-table="{{$table}}"/>
                        <div class="control_indicator"></div>
                    </label>
                </td>
                @foreach ($permissions as $permission)
                    <td>
                        <label class="control control-checkbox">
                            <span class="opacity-0">Hello</span>
                            
                            <input type="checkbox" class="permissionCheckbox" name="permissions[{{$table}}][]"
                                   value="{{$permission['value'] }}" data-table="{{$table}}"/>
                            <div class="control_indicator"></div>
                        </label>
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('js')
    <script>
        // make all checkbox checked when click on checkAll
        $('.checkAll').on('change', function () {
            let table = $(this).data('table')
            if (this.checked == true) {
                $(`input[name='permissions[${table}][]']`).prop('checked', true)
            } else {
                $(`input[name='permissions[${table}][]']`).prop('checked', false)
            }
        })

        // check if all checkboxs is checked then make checkAll checked
        $(".permissionCheckbox").change(function () {
            let table = $(this).data('table')

            let allCheckboxes = document.querySelectorAll(`input[name='permissions[${table}][]']:not([id="${table}"])`);
            let checkboxChecked = document.querySelectorAll(`input[name='permissions[${table}][]']:not([id="${table}"]):checked`);

            if (allCheckboxes.length == checkboxChecked.length) {
                $(`input[name='permissions[${table}][]']`).prop('checked', true)
            } else {
                $(`#${table}`).prop('checked', false)
            }
        });
    </script>
@endpush
