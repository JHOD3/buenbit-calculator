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
        let garantia = (monto/result[7].datos)/porcentaje;
        garantia = garantia.toFixed(2);

        // Calculo la caucion
        let caucion_c = Math.max(Math.pow((1+result[1].datos),(meses/12))-1,0)*monto;
        let caucion = caucion_c.toFixed(2);

        // Tasa buenbit
        let tasa_buenbit_c = Math.max(Math.pow((1+result[6].datos),(meses/12))-1,0)*monto;
        let tasa_buenbit = tasa_buenbit_c.toFixed(2);

        // Monto a dejar en caucion DAI
        let monto_dejar_caucion_dai_c = monto/result[7].datos/result[2].datos;
        let monto_dejar_caucion_dai = monto_dejar_caucion_dai_c.toFixed(2);

        // Recompra DAI
        let recompra_dai_c = monto_dejar_caucion_dai_c*result[5].datos*meses;
        let recompra_dai = recompra_dai_c.toFixed(2);

        // Monto a invertir DAI
        let monto_invertir_dai_c = garantia - monto_dejar_caucion_dai_c;
        let monto_invertir_dai = monto_invertir_dai_c.toFixed(2);

        // Inversiones DAI
        let inversiones_dai_c = (Math.pow((1+result[0].datos),(meses/12))-1)*monto_invertir_dai_c;
        let inversiones_dai = inversiones_dai_c.toFixed(2);

        //Diferencia DAI
        let diferencia_dai_c = inversiones_dai_c+(-recompra_dai_c);
        let diferencia_dai = diferencia_dai_c.toFixed(2);

        // Diferencia en ARG
        let direncia_arg_c = diferencia_dai_c*result[7].datos*(1+result[4].datos);
        let direncia_arg = direncia_arg_c.toFixed(2);


        let diferencia_a_cobrar_c = (-(-caucion_c+(-tasa_buenbit_c)+direncia_arg_c) > 0)? -(-caucion_c+(-tasa_buenbit_c)+direncia_arg_c) :0;
        let diferencia_a_cobrar =  diferencia_a_cobrar_c.toFixed(2);

        let interes = Math.max(Math.pow((diferencia_a_cobrar/monto+1), (12/meses))-1)*100;
        interes = interes.toFixed(2);

        let coutas = (diferencia_a_cobrar_c+monto)/meses;

        let interesTotal = coutas*meses;

        console.log(interes, result, direncia_arg,caucion , tasa_buenbit, diferencia_a_cobrar,coutas);

        $('.interes').text(interes+'%');
        $('.cuotas').text(formatterPeso.format(coutas.toFixed(2)));
        $('.interes_total').text(formatterPeso.format(interesTotal.toFixed(2)));


        $('.garantia').text(formatterPeso.format(garantia));

        // Input
        $('.interes_input').val(interes+'%');
        $('.cuotas_input').val(formatterPeso.format(coutas.toFixed(2)));
        $('.interes_total_input').val(interesTotal.toFixed(2));
    });
})

