<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="user-profile">
            <img src="{{ asset('adminAssets/assets/img/mother.png') }}" class="" alt="..." style="width: 200px">
            <br>
            <br>

            <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                <a href="{{ route('admin.teacher.edit', $group->teacher->id) }}"
                    class="btn btn-success  float-left">Edit</a>
            </div>
        </div>

        <div class="user-info">
            <h5>Teacher Name :</h5>
            <h6 class="text-primary">{{ $group->teacher->name }}</h6>
            <br>
            <h5> Birthday :</h5>
            <h6 class="text-primary">{{ $group->teacher->birthday }}</h6>
            <br>
            <h5> Age Type :</h5>
            <h6 class="text-primary">{{ $group->age_type }}</h6>
            <br>
            <h5>Teacher phone :</h5>
            <h6 class="text-primary"> {{ $group->teacher->phone }}</h6>
            <br>
            <h5>Qualification :</h5>
            <h6 class="text-primary">{{ $group->teacher->qualification }}</h4>
        </div>

    </div>
</div>
