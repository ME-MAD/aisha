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
                    <label class="control control-checkbox text-dark">
                        {{getPermissionTables()[$table]}}
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
    


<div class="card-footer">
    <button type="button"
            class="btn btn-danger font-weight-bold text-white"
            data-dismiss="modal">{{__('global.Close')}}
    </button>

    <button type="submit"
            class="btn btn-primary font-weight-bold text-white">{{__('global.create')}}
    </button>
</div>

</div>

@push('js')
    <script>
        // make all checkbox checked when click on checkAll
        

        // check if all checkboxs is checked then make checkAll checked
        
    </script>
@endpush
