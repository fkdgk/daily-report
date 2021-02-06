<script>

const init = () => {
    datepiker();
    timepiker();
    slider();
}

init();

$(document).on('click','.work-delete',function(){
    $(this)
    .parent()
    .parent()
    .remove();
});

$('#append-btn').click(function(){
    $('#repeat-content .row')
    .clone()
    .insertBefore('#append-to');
    init();
});

</script>