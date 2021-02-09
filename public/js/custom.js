/* form delete confirm */
$('.copy').on('submit',function(e){
    if(!confirm('複製しますか？')){
          e.preventDefault();
    }
});

/* display File name */
$('#file').on('change',function(e){
    const fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
});

/* form delete confirm */
$('.delete').on('submit',function(e){
    if(!confirm('削除しますか？')){
          e.preventDefault();
    }
});

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
        showButtonPanel: true,
    });
}

/* TimePicker */
const timepiker = () => {
    $('.timepicker').timepicker({
        // 'minTime': '00:00',
        // 'maxTime': '23:30',
        'step': 15,
        'timeFormat': 'H:i',
        // 'showDuration': false
    });
}

/* datatable responsive */
$('.table.responsive').DataTable( {
    "language" : {
        "zeroRecords": "データがありません"             
    },
    "responsive":true,
    "searching": false,
    "sort": false,
    "info": false,
    "paging": false,
    "order": [],
});
