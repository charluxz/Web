import resend
resend.api_key = secreto

r = resend.Emails.send({
  "from": "onboarding@resend.dev",
  "to": "gabrielcarlosmolpe@gmail.com",
  "subject": "Hello World",
  "html": "<p>Congrats on sending your <strong>first email</strong>!</p>"
})
