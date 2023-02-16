export function renderGroupDays(groupStudent)
{
    let groupDaysElements = `
        <div class="table-responsive my-5">
        <table class="table table-bordered mb-4">
            <thead>
                <tr class="table-secondary">
                    <th>Name</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </thead>
            <tbody>
    `

    groupStudent.group.group_days.forEach(groupDay => {
        groupDaysElements += `
            <tr >
                <td class="text-secondary">${groupDay.day}</td>
                <td class="text-secondary">${groupDay.from_time_formated}</td>
                <td class="text-secondary">${groupDay.to_time_formated}</td>
            </tr>
        `
    });

    groupDaysElements += `
            </tbody>
            </table>
        </div>
    `

    $(`#groupStudentContainer${groupStudent.id}`).append(`
        <p class="text-center">

            ${groupDaysElements}

        </p>
    `)
}