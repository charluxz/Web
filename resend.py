import resend
resend.api_key = "re_6LVBnd1c_H7D9nQRCTfrqy2AgMNWXvDbq"

r = resend.Emails.send({
  "from": "onboarding@resend.dev",
  "to": "gabrielcarlosmolpe@gmail.com",
  "subject": "Hello World",
  "html": "<p>Congrats on sending your <strong>first email</strong>!</p>"
})
