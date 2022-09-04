$('.editExperienceButton').on('click', function () {
    let experience = $(this).data('experience')
    let date = $(this).data('date')
    console.log(date)
    // let dateNew = new Date(experience.date)
    // let vvv = dateNew.toDateString()
    // let href = $(this).data('href')
   
    // $('#editExperienceForm #title').val(experience.title)
    // $('#date').val(date)

    let formInput = `<input type="date" class="form-control " id="date" placeholder="" name="date" value="${date}">`;

    // let formInput = `<x-date name="date" label="التاريخ"  id="date" value="${date}"/>`;
 
    console.log(formInput)
    $('#editExperienceForm .date-field').html('');
    $('#editExperienceForm .date-field').append(formInput);

    // $('#editExperienceForm').attr('action', href)
})

console.log("sdoufods")