const form = document.getElementById('myForm');

form.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita la recarga de la página

  const email = document.getElementById('email').value;
 
  console.log(`Correo Electrónico: ${email}`);
});

