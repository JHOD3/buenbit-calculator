# Ajustes en su cuenta sendgrid

1) Navegar por el menu lateral izquierdo de su monitor, hasta el item ```Email API / Dynamic Templates ``` una vez dentro, precionar el boton ``` Crear a Dynamic Template ```
2) Insetar un nombre para su template y precionar el boton  ```Create```
3) Una ves creado el template, desplegar el template agregado y precionar el boton ```add version ```
4) Seleccionar el ``` Blank Template ```
5) Luego seleccionar ``` Code Editor```
6) Ir hasta este proyecto y copiar el codigo que contiene el archivo ``` plantilla_para_sendgrid.html``` y pegar lo en el editor de sendgrid
7) Precionar el boton ``` save ```
   8)Volva a la vista de los template y copiar el Template ID

# Deploy del servicios
1) Instalar Flask 
    ``` pip install flask ```
2) Instalar libreria de Sendgrid para python 
   ``` pip install sendgrid ```
3) Instalar flask cors
       ``` pip install flask-cors ```
4) Insertar el template ID proporcionado por sendgrid, en la ``` linea 30```  del archivo ``` app.py``` 

5) Insertar el API KEY proporscionado por sendgrid en la ``` linea 33 ``` del archivo ``` app.py``` , si ya tiene configurada en sus sistema puede utilizarla usando el ```os.environ.get('SENDGRID_API_KEY')``` no olvide importar OS en el archivo ``` app.py``` para este caso.



# Deploy de la maquenta html

1) Ir hasta el archivo  ``` js/send-from.js ``` y actualizar la variable host con la url del servicio(del paso anterior)

