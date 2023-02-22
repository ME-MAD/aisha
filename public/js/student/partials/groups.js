export function renderGroupDays(groupStudent)
{
    let groupDaysElements = `
        <div class="table-responsive">
        <table class="table table-hover table-bordered mb-4">
            <thead>
                <tr class="table-secondary">
                    <th class="text-secondary">ألايام</th>
                    <th class="text-secondary">من الساعه</th>
                    <th class="text-secondary">إلى الساعة</th>
                </tr>
            </thead>
            <tbody>
    `

    groupStudent.group.group_days.forEach(groupDay => {
        groupDaysElements += `
            <tr >
                <td class="text-dark">${groupDay.day}</td>
                <td class="text-dark">${groupDay.from_time_formated}</td>
                <td class="text-dark">${groupDay.to_time_formated}</td>
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