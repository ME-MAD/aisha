export function appendMainGroup(group)
{
    $('.groupsContainer').append(`
        <li class="nav-item">
            <div class="nav-link list-actions" id="group-${group.id}" data-invoice-id="group-${group.id}">
                <div class="f-m-body">
                    <div class="f-head">
                        <p class="${group.allStudentsPaid ? 'text-success' : 'text-danger'}" style="font-size:1.2rem">
                            Group ${group.name}
                        </p>
                    </div>
                    <div class="f-body">
                        
                    </div>
                </div>
            </div>
        </li>
    `)        
}