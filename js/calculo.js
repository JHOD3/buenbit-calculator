function leerArchivo(callback) {
    var url = "../calculo.xlsx";
    var oReq = new XMLHttpRequest();
    oReq.open("GET", url, true);
    oReq.responseType = "arraybuffer";
    oReq.onload = function(e) {
        var arraybuffer = oReq.response;

        /* convert data to binary string */
        var data = new Uint8Array(arraybuffer);
        var arr = new Array();
        for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
        var bstr = arr.join("");

        /* Call XLSX */
        var workbook = XLSX.read(bstr, {type:"binary"});

        /* DO SOMETHING WITH workbook HERE */
        var first_sheet_name = workbook.SheetNames[0];
        /* Get worksheet */
        var worksheet = workbook.Sheets[first_sheet_name];
        let fileJson=XLSX.utils.sheet_to_json(worksheet,{raw: true});
        callback(fileJson);
    }
    oReq.send();
}
const formatterPeso = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
});
$('input').on('change keyup click', function (event) {
    event.preventDefault();
    leerArchivo(function (result) {
        let monto = parseFloat($('#ex13').val());
        let meses = parseFloat($('input[name="meses"]:checked').val());
        let porcentaje = parseFloat($('input[name="porcentaje"]:checked').val());

        let coutas = (result[22].datos+result[12].datos)/meses;
        let interes = result[23].datos;
        let interesTotal = coutas*meses;

        let garantia = (monto/result[7].datos)/porcentaje;

        $('.interes').text(interes+'%');
        $('.cuotas').text(formatterPeso.format(coutas.toFixed(2)));
        $('.interes_total').text(formatterPeso.format(interesTotal.toFixed(2)));


        $('.garantia').text(formatterPeso.format(garantia.toFixed(2)));

        // Input
        $('.interes_input').val(interes+'%');
        $('.cuotas_input').val(formatterPeso.format(coutas.toFixed(2)));
        $('.interes_total_input').val(interesTotal.toFixed(2));
    });
})

