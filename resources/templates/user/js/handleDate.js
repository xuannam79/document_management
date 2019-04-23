$(function () {
    $("#date-start").datepicker({
        autoclose: true,
        todayHighlight: true,
        startDate: '+0d'
    }).datepicker('update', new Date());

    document.getElementById("date-start").onchange = function () {
        var start_date = document.getElementById("date-start").value;
        $('#date-end').datepicker('setStartDate', start_date);
    }

    $("#date-end").datepicker({
        autoclose: true,
        todayHighlight: true
    });
});
