import {renderTeacherStatistics} from "./partials/statistics.js";
import {renderTeacherExperiences} from "./partials/experience.js"
import {renderTeacherGroups} from "./partials/group.js"

    let href = $('#showTeacherAjaxContainer').data('href')
    $.ajax({
        url: href,
        success: function (response) {

            renderTeacherStatistics(response.statistics);

            renderTeacherExperiences(response.experiences)

            renderTeacherGroups(response.groups)

            invoiceListClickEvents()

            initEditeExperienceModal()
        },
        error: function () {
        }
    })