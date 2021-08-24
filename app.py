from flask import Flask, jsonify, request
from flask_cors import CORS, cross_origin
from sendgrid import SendGridAPIClient
from sendgrid.helpers.mail import Mail

app = Flask(__name__)
cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'

@app.route('/sendmail', methods=['post'])
def sendmail():
    print(request.json)
    message = Mail(
        from_email='jsdlcs266@gmail.com',
        to_emails=request.json['email'],
        subject='Test'
        )

    message.dynamic_template_data = {
        "host-url": request.json['host-url'],
        "full_name":request.json['full_name'],
        "monto_solicitado": request.json['monto_solicitado'],
        "cuotas":request.json['cuotas'],
        "cuotas_inicial_con_iva":request.json['cuotas_inicial_con_iva'],
        "garantia_en_cripto":request.json['garantia_en_cripto'],
        "costo_financiero": request.json['costo_financiero'] ,
        "monto_total_cancelar": request.json['monto_total_cancelar']
    }

    message.template_id = 'colocar aqui el template ID de sendgrid'
    try:
        sg = SendGridAPIClient(
            'Colocar aqui el API KEY de sendgrid'
            )
        response = sg.send(message)
        return jsonify({'mensaje':'true'})
    except Exception as e:
        print(e)
if __name__ == '__main__':
    app.run(debug=True, port=5000)
