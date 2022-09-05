<div class="widget-content widget-content-area">
    <h3 class="">Teacher's Groups</h3>
    <div class="table-responsive">

        <table class="table mb-4 contextual-table">
            <thead>

                <tr class="">
                    <th class="text-center">#</th>
                    <th>From </th>
                    <th>To </th>
                    <th>Ege Type </th>
                    <th>Name Group Type</th>
                    <th>Day Number </th>
                </tr>

            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr class="table-info">
                        <td class="text-center">{{ $group->id }}</td>
                        <td class="text-center">{{ $group->from }}</td>
                        <td class="text-center">{{ $group->to }}</td>
                        <td class="text-center">{{ $group->age_type }}</td>
                        <td class="text-center">{{ $group->groupType->name }}</td>
                        <td class="text-center">{{ $group->groupType->days_num }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
