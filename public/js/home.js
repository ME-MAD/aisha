let href = $("#getfromdata").data('href');
$.ajax({
    url: href,

    success: function (response) {

        $('#statustucsContanerOne').append(`
            <div class="widget-four">
            <div class="widget-heading">
                <h5 class="text-secondary">${response.words.groups}<span
                        class="badge badge-secondary ml-2">${response.allGroupsCount}</span>
                </h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="4"></circle>
                                <line x1="21.17" y1="8" x2="12" y2="8"></line>
                                <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                                <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                            </svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>kid<span class="badge badge-primary ml-2">${response.groupKidsCount}</span></h6>
                                <p class="browser-count">${response.groupKidsPercentage}%</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                        style="width: ${response.groupKidsPercentage}%" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                        </div>
                        <div class="w-browser-details">

                            <div class="w-browser-info">
                                <h6>Adult<span class="badge badge-danger ml-2">${response.groupAdultCount}</span></h6>
                                <p class="browser-count">${response.groupAdultPercentage}%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar"
                                        style="width: ${response.groupAdultPercentage}%" aria-valuenow=""
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                `)


        let groupTypesHtml = '';
        response.groupTypes.forEach(groupType => {
            groupTypesHtml += `
                        <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="4"></circle>
                                <line x1="21.17" y1="8" x2="12" y2="8"></line>
                                <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
                                <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
                            </svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6> ${groupType.name} <span
                                        class="badge badge-primary ml-2"> ${groupType.price}</span>
                                </h6>
                                <p class="browser-count">${groupType.percentage}%</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                        style="width: ${groupType.percentage}%" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                            `
        });


        $('#statustucsContanerTwo').append(`
            <div class="widget-four">
            <div class="widget-heading">
                <h5 class="text-secondary">
                ${response.words.groups}
                    <span class="badge badge-secondary ml-2">
                        ${response.allGroupsCount}
                    </span>
                </h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                       `+
            groupTypesHtml
            + `
                </div>
            </div>
        </div>
                `)
    },
    error: function (response) {

    }

})
