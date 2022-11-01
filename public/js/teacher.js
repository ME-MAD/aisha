
getDataShow();

function getDataShow() {
    let href = $('#profileAneExperience').data('href')
    $.ajax({
        url: href,
        success: function (response) {
            response.statistics.forEach(element => {
                $('#statustucsContaner').append(`
                <div class="col-4">
                <div class="card border-secondary">
                <div class="card-body">
                <h5 class="card-title text-primary text-center">
                ${element.name}
                                <i class="fa-solid fa-users-rays text-secondary"></i>
                            </h5>
                            <p class="card-text text-primary text-center">
                            ${element.value}
                            </p>
                        </div>
                    </div>
                    </div>
            `)
            });

            response.experiences.forEach(element => {
                $('#experience').append(`
            <div class="item-timeline">
            <div class="t-meta-date">
            <p class="">${element.from}</p>
            <p class="">${element.to}</p>
            </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                    <div class="t-text">
                            <a class="editExperienceButton title" data-title="${element.title}"
                            data-from="${element.from}"
                            data-to="${element.to}"
                           data-teacherid="${element.teacher_id}"
                                   data-toggle="modal"
                                   data-target="#editexperience"
                                   data-href="/admin/experience/update/${element.id}">
                                   <p>${element.title}</p>
                            </a>
                            </div>
                    <div class="deleteButton">
                            <a href="/admin/experience/delete/${element.id}">
                                <i class="fa-solid fa-rectangle-xmark"></i>
                            </a>
                    </div>
                </div>
            `)
            });

            response.groups.forEach(element => {

                console.log(element.id);
            });





            initEditeExperienceModal()
        },
        error: function () { }
    })
}






