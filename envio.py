import resend
import pythonmonkey as pm

def procesar_datos():
  email = pm.eval('document.getElementById("email").value')
  return email

def enviarCorreo():
  import resend
  resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"
  correo = procesar_datos()
  r = resend.Emails.send({
  "from": "onboarding@resend.dev",
  "to": correo,
  "subject": "Receta Sopaipillas",
  "html": "aaa"
  })
resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"

print(procesar_datos())