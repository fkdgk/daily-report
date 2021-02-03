flatpickr('.datepicker', {
    locale: "ja",
    disableMobile: true,
    dateFormat: 'Y-m-d',
    allowInput:true,
});

$('.timepicker').timepicker({
	'minTime': '07:00',
    'maxTime': '23:30',
    'step' : 15,
    'timeFormat': 'H:i',
	'showDuration': false
});