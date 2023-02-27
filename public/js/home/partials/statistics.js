export function statisticsRun()
{
    var cSpeed = 6000;
    var value = $('.ico-counter1').text();
    $('.ico-counter1').countTo({
        from: 0,
        to: value,
        speed: cSpeed,
        formatter: function (value, options) {
            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
    });
    var value = $('.ico-counter2').text();
    $('.ico-counter2').countTo({
        from: 0,
        to: value,
        speed: cSpeed,
        formatter: function (value, options) {
            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
    });
    var value = $('.ico-counter3').text();
    $('.ico-counter3').countTo({
        from: 0,
        to: value,
        speed: cSpeed,
        formatter: function (value, options) {
            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
    });
}
