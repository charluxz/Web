import resend
import js

def procesar_datos():
  email = js.document.getElementById("email").value

def enviarCorreo():
  import resend
  resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"
  correo = "gabrielcarlosmolpe@gmail.com"
  r = resend.Emails.send({
  "from": "onboarding@resend.dev",
  "to": correo,
  "subject": "Receta Sopaipillas",
  "html": "aaa"
  })
resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"

enviarCorreo()