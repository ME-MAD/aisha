export class LessonElement
{
    changePercentageBar(mainParent, percentage)
    {
        mainParent.find(
        '.progressOfSubjectLink .progress-bar').css({
            'width': `${percentage}%`,
            'transision': '1.5s'
        }).find(".progress-bar-percentage").html(`${percentage}%`)
    }

    setLessonUI(mainParent,object)
    {
        for(const className in object)
        {
            mainParent.find(`.${className}`).html(object[className])
        }
    }

    setLessonUIData(mainParent,object)
    {
        for(const className in object)
        {
            for(const key in object[className])
            {
                mainParent.find(`.${className}`).data(key,object[className][key])
            }
        }
    }
}