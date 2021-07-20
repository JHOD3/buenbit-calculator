function leerArchivo(callback) {
    var url = "../calculo-dos.xlsx";
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
const formatterPeso = new Intl.NumberFormat();
$('input').on('change keyup click', function (event) {
    event.preventDefault();
    accion();
});

$(document).ready(function () {
    accion();
})

function accion() {
    leerArchivo(function (result) {
        let garantia = $('.garantia');
        let monto = parseFloat($('#ex13').val());
        let meses = parseFloat($('input[name="meses"]:checked').val());



        let cal_result = monto * result[3].Dato * (Math.pow((1+result[4].Dato),(meses/12)));
        garantia.text(formatterPeso.format(cal_result.toFixed(2)));
        $('#monto').val(monto.toFixed(2));
        $('#meses').val(meses.toFixed(2));
        $('#monto_recibir').val(cal_result.toFixed(2));

    });
}