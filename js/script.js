
// Without JQuery
var mySlider = new Slider("#ex13", {
    ticks: ['5000', '10000', '20000', '30000', '40000', '50000'],
    ticks_labels: ['|', '|', '|', '|', '|', '|'],
    ticks_snap_bounds:1,
    tooltip_position:'bottom',
    formatter: function (num) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        return '$' + num;
    },
});

$('#ex13').on('change',function (e) {
    e.preventDefault();
    let num = $(this).val();
    $('.amount_input').val(num);
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/, '');
    $('.amount').text(num);
    $('.set_amount').val(num.replace(/\./g, ''));
})
let i = 0;
$('#subir').on('mousedown', function(event) {
    i=parseInt($('#ex13').val())+1;
    mySlider.setValue(i);
    $('#ex13').change();

});

$('#bajar').on('mousedown',function (event) {
    i=parseInt($('#ex13').val())-1;
    mySlider.setValue(i);
    $('#ex13').change();
});

$('#amount_input_set').on('keyup', function (event) {
    let amount_set = $(this).val();
    mySlider.setValue(amount_set.replace(/\./g, ''));
    $('#ex13').change();

});

$('.view_input_set').on('click', function (event) {
    event.preventDefault();
    $('.set_amount').val($('#ex13').val());
    $('.set_amount').toggle();
    $('#amount_input_set').focus();
});


/*
*   Esto para que la maqueta funcione
*
*   En caso de implementar en un frameworks,
*   esto tendria que revisarlo el desarrollador
*   para estar seguros de que le funcione para su
*   caso.
* */

$('.simular_prestamo').on('click', function (event) {
    localStorage.setItem("amount", $('#ex13').val());
    location.href='simulador.html';
});

