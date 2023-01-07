<div class="table-responsive">
    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Table</th>
                <th>Create</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>show</th>
                <th>index</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getPermissionsForView() as $table => $permissions)
                <tr>
                    <td>
                        <label for="{{$table}}">{{$table}}</label>
                        <input type="checkbox" id="{{$table}}" class="checkAll" data-table="{{$table}}">
                    </td>
                    @foreach ($permissions as $permission)
                        <td>
                            <input type="checkbox" name="{{$table}}[]" value="{{$permission['value']}}">
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('js')
    <script>
        $('.checkAll').on('change',function(){
            let table = $(this).data('table')
            if(this.checked == true)
            {
                $(`input[name='${table}[]']`).prop('checked',true)
            }
            else
            {
                $(`input[name='${table}[]']`).prop('checked',false)
            }
        })
    </script>
@endpush