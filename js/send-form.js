$('#form-simulador').on('submit',function(event) {
    event.preventDefault();
    //Actualizar host con url del servicio python
    var host = 'http://127.0.0.1:5000/sendmail';


    var formdata = $(this).serializeArray();
    var data = {};
    $(formdata ).each(function(index, obj){
        data[obj.name] = obj.value;
    });
    fetch(host, {
        method: 'post',
        headers: new Headers({
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "Access-Control-Allow-Origin":"*"
        }),
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then((fechResponse) => {
        console.log(fechResponse);
    });
})