import resend
import js

def procesar_datos(self):
  email = js.document.getElementById("email").value

def enviarCorreo(self):
  import resend
  resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"
  correo = procesar_datos().email
  r = resend.Emails.send({
  "from": "onboarding@resend.dev",
  "to": correo,
  "subject": "Receta Sopaipillas",
  "html": "aaa"
  })
resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"

