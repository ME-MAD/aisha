<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="user-profile">
            <img src="{{ asset('adminAssets/assets/img/mother.png') }}" class="" alt="..." style="width: 200px">
        </div>
        <div class="user-info" style="margin: 50px">
            @foreach ($group->groupDays as $groupDay)
                <div class="btn mt-2 mb-3 ml-2" style="background-color: #c2d5ff; color:#060818">
                    {{ $groupDay->day }}
                </div>
                <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                    <a href="{{ route('admin.group_day.edit', $groupDay->id) }}"
                        class="btn btn-success  float-left">Edite</a>
                </div>
            @endforeach

        </div>
    </div>
</div>
