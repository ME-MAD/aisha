<div class="actions d-flex justify-content-center align-items-center text-center">

    <a class='editRoleButton  text-success mx-1 '

       data-role="{{ $query }}"
       data-href="{{ route('admin.role.update', $query->id) }}">

        <i class="icon fa-solid fa-pen-to-square fa-xl"></i>
    </a>


    <a class="text-danger mx-1"
       href="javascript:void(0)"
       onclick="document.getElementById('role-delete-{{ $query->id }}').submit()">
        <i class=" icon fa-solid fa-trash-arrow-up fa-xl"></i>
    </a>

    <form action="{{ route('admin.role.delete',  $query->id) }}" method="post" id="role-delete-{{  $query->id }}"
          style="display: none;">
        @csrf
        @method('DELETE')
    </form>

</div>


