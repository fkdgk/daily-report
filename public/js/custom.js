/* ionRangeSlider */
const slider = () => {
    $(".slider:not(#repeat-content .slider)").ionRangeSlider({
        skin: "round",
        min: 0,
        max: 100,
        grid: true,
    });
}

/* FlatPicker */
const datepiker = () => {
    flatpickr('.datepicker', {
        locale: "ja",
        disableMobile: true,
        dateFormat: 'Y-m-d',
        allowInput: true,
    });
}

/* TimePicker */
const timepiker = () => {
    $('.timepicker').timepicker({
        'minTime': '07:00',
        'maxTime': '23:30',
        'step': 15,
        'timeFormat': 'H:i',
        'showDuration': false
    });
}