function leerArchivo(callback) {
    var url = "../calculo-dos.xlsm";
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
        var first_sheet_name = workbook.SheetNames[4];
        /* Get worksheet */
        var worksheet = workbook.Sheets[first_sheet_name];
        let fileJson=XLSX.utils.sheet_to_json(worksheet,{raw: true});
        callback(fileJson);
    }
    oReq.send();
}
const formatterPeso = new Intl.NumberFormat(['ban', 'id'], {
    style: 'currency',
    currency: 'ARG'
});
const formatterNumero = new Intl.NumberFormat(['ban', 'id']);

$('input').on('change keyup click', function (event) {
    event.preventDefault();
    leerArchivo(function (result) {
        let B3 = parseFloat($('#ex13').val());
        let B4 = parseFloat($('input[name="meses"]:checked').val());
        let B5 = parseFloat($('input[name="porcentaje"]:checked').val());

        // PARAMETROS DEL MERCADO
        let B28 = result[24].Datos; // IVA sobre pago de intereses
        let B29 = result[25].Datos; // tasa en DAI
        let B30 = result[26].Datos; // tasa tomadora en ARS (tasa caucion)
        let B31 = result[27].Datos; // tasa de mercado en ARS
        let B32 = result[28].Datos; // tasa de futuros USD/ARS
        let B33 = result[29].Datos; // spread de futuros canje
        let B34 = result[30].Datos; // USD/ARS spot
        let B35 = result[31].Datos; // Aforo títulos

        // tasa mensual
        let B8 = B5 / 12 * 100;
        // Interes mes 1

        let C10 = 0;
        let D10 = 0;
        let E10 = 0;
        let F10 = 0;
        let G10 = 0;
        let H10 = 0;
        let I10 = 0;
        let J10 = 0;
        let K10 = 0;
        let L10 = 0;
        let M10 = 0;
        let N10 = 0;

        // Total a pagar
        let B16 = 0;
        // Total a pagar con IVA
        let B17 = 0;

        // Total a pagar en ARS (IVA incluido)
        let B22 = 0;

        // Cuota en ARS (IVA incluido)
        let B21 = 0;

        // CFT (Costo Financiero Total) con IVA
        let B24 = 0;
        for (let i = 1; i <= B4; i++) {
            let periodo = i - 1;
            switch (i) {
                case 1:
                    // Intereses
                    let C12 = interesMensual(B3, B8);
                    // Interes con IVA
                    let C13 = interesConIvaMensual(C12, B28);
                    // Cuota total
                    let C14 = cuotaMensual(periodo, B3, B3, B4, B8, i);
                    // Amortizacion
                    let C11 = C14 - C12;
                    // Cuota total con IVA
                    let C15 = C11 + C13;
                    // Deuda mes 1
                    C10 = (B3 - C11 >= 0) ? B3 - C11 : 0;
                    B16 = B16 + C14;
                    B17 = B17 + C15;
                    B21 = C14;
                    B24 = B24 + C13;
                    break;
                case 2:
                    // Intereses
                    let D12 = interesMensual(C10, B8);
                    // Interes con IVA
                    let D13 = interesConIvaMensual(D12, B28);
                    // Cuota total
                    let D14 = cuotaMensual(periodo, C10, B3, B4, B8, i);
                    // Amortizacion
                    let D11 = D14 - D12;
                    // Cuota total con IVA
                    let D15 = D11 + D13;
                    // Deuda mes 1
                    D10 = (C10 - D11 >= 0) ? C10 - D11 : 0;
                    B16 = B16 + D14;
                    B17 = B17 + D15;
                    B24 = B24 + D13;
                    break;
                case 3:
                    // Intereses
                    let E12 = interesMensual(D10, B8);
                    // Interes con IVA
                    let E13 = interesConIvaMensual(E12, B28);
                    // Cuota total
                    let E14 = cuotaMensual(periodo, D10, B3, B4, B8, i);
                    // Amortizacion
                    let E11 = E14 - E12;
                    // Cuota total con IVA
                    let E15 = E11 + E13;
                    // Deuda mes 1
                    E10 = (D10 - E11 >= 0) ? D10 - E11 : 0;
                    B16 = B16 + E14;
                    B17 = B17 + E15;
                    B24 = B24 + E13;
                    break;
                case 4:
                    // Intereses
                    let F12 = interesMensual(E10, B8);
                    // Interes con IVA
                    let F13 = interesConIvaMensual(F12, B28);
                    // Cuota total
                    let F14 = cuotaMensual(periodo, E10, B3, B4, B8, i);
                    // Amortizacion
                    let F11 = F14 - F12;
                    // Cuota total con IVA
                    let F15 = F11 + F13;
                    // Deuda mes 1
                    F10 = (E10 - F11 >= 0) ? E10 - F11 : 0;
                    B16 = B16 + F14;
                    B17 = B17 + F15;
                    B24 = B24 + F13;
                    break;
                case 5:
                    // Intereses
                    let G12 = interesMensual(F10, B8);
                    // Interes con IVA
                    let G13 = interesConIvaMensual(G12, B28);
                    // Cuota total
                    let G14 = cuotaMensual(periodo, F10, B3, B4, B8, i);
                    // Amortizacion
                    let G11 = G14 - G12;
                    // Cuota total con IVA
                    let G15 = G11 + G13;
                    // Deuda mes 1
                    G10 = (F10 - G11 >= 0) ? F10 - G11 : 0;
                    B16 = B16 + G14;
                    B17 = B17 + G15;
                    B24 = B24 + G13;
                    break;
                case 6:
                    // Intereses
                    let H12 = interesMensual(G10, B8);
                    // Interes con IVA
                    let H13 = interesConIvaMensual(H12, B28);
                    // Cuota total
                    let H14 = cuotaMensual(periodo, G10, B3, B4, B8, i);
                    // Amortizacion
                    let H11 = H14 - H12;
                    // Cuota total con IVA
                    let H15 = H11 + H13;
                    // Deuda mes 1
                    H10 = (G10 - H11 >= 0) ? G10 - H11 : 0;
                    B16 = B16 + H14;
                    B17 = B17 + H15;
                    B24 = B24 + H13;
                    break;
                case 7:
                    // Intereses
                    let I12 = interesMensual(H10, B8);
                    // Interes con IVA
                    let I13 = interesConIvaMensual(I12, B28);
                    // Cuota total
                    let I14 = cuotaMensual(periodo, H10, B3, B4, B8, i);
                    // Amortizacion
                    let I11 = I14 - I12;
                    // Cuota total con IVA
                    let I15 = I11 + I13;
                    // Deuda mes 1
                    I10 = (H10 - I11 >= 0) ? H10 - I11 : 0;
                    B16 = B16 + I14;
                    B17 = B17 + I15;
                    B24 = B24 + I13;
                    break;
                case 8:
                    // Intereses
                    let J12 = interesMensual(I10, B8);
                    // Interes con IVA
                    let J13 = interesConIvaMensual(J12, B28);
                    // Cuota total
                    let J14 = cuotaMensual(periodo, I10, B3, B4, B8, i);
                    // Amortizacion
                    let J11 = J14 - J12;
                    // Cuota total con IVA
                    let J15 = J11 + J13;
                    // Deuda mes 1
                    J10 = (I10 - J11 >= 0) ? I10 - J11 : 0;
                    B16 = B16 + J14;
                    B17 = B17 + J15;
                    B24 = B24 + J13;
                    break;
                case 9:
                    // Intereses
                    let K12 = interesMensual(J10, B8);
                    // Interes con IVA
                    let K13 = interesConIvaMensual(K12, B28);
                    // Cuota total
                    let K14 = cuotaMensual(periodo, J10, B3, B4, B8, i);
                    // Amortizacion
                    let K11 = K14 - K12;
                    // Cuota total con IVA
                    let K15 = K11 + K13;
                    // Deuda mes 1
                    K10 = (J10 - K11 >= 0) ? J10 - K11 : 0;
                    B16 = B16 + K14;
                    B17 = B17 + K15;
                    B24 = B24 + K13;
                    break;
                case 10:
                    // Intereses
                    let L12 = interesMensual(K10, B8);
                    // Interes con IVA
                    let L13 = interesConIvaMensual(L12, B28);
                    // Cuota total
                    let L14 = cuotaMensual(periodo, K10, B3, B4, B8, i);
                    // Amortizacion
                    let L11 = L14 - L12;
                    // Cuota total con IVA
                    let L15 = L11 + L13;
                    // Deuda mes 1
                    L10 = (K10 - L11 >= 0) ? K10 - L11 : 0;
                    B16 = B16 + L14;
                    B17 = B17 + L15;
                    B24 = B24 + L13;
                    break;
                case 11:
                    // Intereses
                    let M12 = interesMensual(L10, B8);
                    // Interes con IVA
                    let M13 = interesConIvaMensual(M12, B28);
                    // Cuota total
                    let M14 = cuotaMensual(periodo, L10, B3, B4, B8, i);
                    // Amortizacion
                    let M11 = M14 - M12;
                    // Cuota total con IVA
                    let M15 = M11 + M13;
                    // Deuda mes 1
                    M10 = (L10 - M11 >= 0) ? L10 - M11 : 0;
                    B24 = B24 + M13;
                    break;
                case 12:
                    // Intereses
                    let N12 = interesMensual(M10, B8);
                    // Interes con IVA
                    let N13 = interesConIvaMensual(N12, B28);
                    // Cuota total
                    let N14 = cuotaMensual(periodo, M10, B3, B4, B8, i);
                    // Amortizacion
                    let N11 = N14 - N12;
                    // Cuota total con IVA
                    let N15 = N11 + N13;
                    // Deuda mes 1
                    N10 = (M10 - N11 >= 0) ? M10 - N11 : 0;
                    B24 = B24 + N13;
                    break;
            }
        }
        B22 = B16;
        let B23 = B5;
        B24 = (B3 * B5 + B24) / B3;

        // Parametros de Politicas
        let B38 = 0.10;
        let B25=0;
        switch (B4) {
            case 3:
                if(B5 == 0.0){
                    B25 = 0.264712458;
                }else if(B5 == 0.25){
                    B25 = 0.359113643;
                }else{
                    B25 = 0.562332711;
                }
                break;
            case 6:
                if(B5 == 0.0){
                    B25 = 0.263912448;
                }else if(B5 == 0.25){
                    B25 = 0.341357315;
                }else{
                    B25 = 0.489854472;
                }
                break;
            case 12:
                if(B5 == 0.0){
                    B25 = 0.210937500;
                }else if(B5 == 0.25){
                    B25 = 0.244490596;
                }else{
                    B25 = 0.294688012;
                }
                break;
        }

        //Garantia DAIs result[22].Datos
        let B20 = B3 / (result[30].Datos * B25) ; //#


        // Calculo gananacia
        let B41 = (B3 / B34) * (1 / B35); // Monto a dejar en caución (DAIs)
        let B42 = B20 - B41; //# // Monto a invertir (DAIs)


        // Saldos Finales
        let B45 = -(Math.pow((1 + B30), (B4 / 12)) - 1) * B3; //Caución (pago intereses)
        let B46 = -B3; // Caucion (pago capital)
        let B47 = -(Math.pow((1 + B38), (B4 / 12)) - 1) * B3; // Buenbit (intereses recibidos por prestamo)
        let B48 = B16; // Pago total prestamos
        let B49 = -B33 * B41 * B4 * B34; // Costo Recompra DAI
        let B50 = (Math.pow((1 + B29), (B4 / 12)) - 1) * B42 * B34; //# // Intereses recibidos por inversion en garantia
        let B51 = B45 + B46 + B47 + B48 + B49 + B50; //#

        let B53 = -(B47); // Buenbit intereses ganados por prestamo

       // console.log(B20,B21,B22,B23,B24,B25)
        $('.monto_solicitado').text(formatterPeso.format(B3.toFixed(2)));
        $('input[name="monto_solicitado"]').val(formatterPeso.format(B3.toFixed(2)));

        $('.cuotas').text(B4);
        $('input[name="cuotas"]').val(B4);

        $('.cuotas_inicial_con_iva').text( formatterPeso.format(B21.toFixed(2)));
        $('input[name="cuotas_inicial_con_iva"]').val(formatterPeso.format(B21.toFixed(2)));

        $('.garantia_en_cripto').text(formatterNumero.format(B20.toFixed(2)));
        $('input[name="garantia_en_cripto"]').val(formatterNumero.format(B20.toFixed(2)));

        $('.interes').text((B24*100).toFixed(2)+'%');
        $('input[name="interes"]').val((B24*100).toFixed(2)+'%');

        $('.monto_total_cancelar').text(formatterPeso.format(B17.toFixed(2)));
        $('input[name="monto_total_cancelar"]').val(formatterPeso.format(B17.toFixed(2)));

        $('.garantia').text(B20.toFixed(2));
    });
})

//
function interesMensual(B3, tasa) {
    return tasa*B3/100;
}
function interesConIvaMensual(C12, B28) {
    return C12*(1+B28);
}

function cuotaMensual(periodo,deuda,B3,B4,B8,mes) {
    if(mes<=B4){
        if(B8==0){
            return B3/B4;
        }else{
            return deuda*(B8/100)*Math.pow((1+(B8/100)),(B4-periodo))/(Math.pow((1+(B8/100)),(B4-periodo))-1);
        }
    }else{
        return 0;
    }
}

function roundToTwo(num) {
    return +(Math.round(num + "e+2")  + "e-2");
}