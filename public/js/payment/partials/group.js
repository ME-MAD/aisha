export function appendMainGroup(group)
{
    $('.groupsContainer').append(`
        <li class="nav-item">
            <div class="nav-link list-actions" id="group-${group.id}" data-invoice-id="group-${group.id}">
                <div class="f-m-body">
                    <div class="f-head">
                        <p class="" style="font-size:1.2rem">
                            Group <span style="font-weight:bold">${group.name}</span>
                        </p>
                        <h5 class="${group.allStudentsPaid ? 'text-success' : 'text-danger'}">
                            ${group.allStudentsPaid ? 'All paid' : 'Not All Paid'}
                        </h5>
                    </div>
                </div>
            </div>
        </li>
    `)        
}