document.querySelector('form')
.addEventListener('submit', procesar => {
    procesar.preventDefault();
    const data = Object.fromEntries(new FormData(procesar.target).entries());
});
    registros.push(registro);
function procesar() {
    const email = document.getElementById('email').value;
    console.log(`Correo electrónico suscrito: ${email}`);
    const emailJSON = JSON.stringify(email);
    localStorage.setItem('email', emailJSON);
    const correo = {};
for (let i = 0; i < localStorage.length; i++) {
  const key = localStorage.key(i);
  correo[key] = localStorage.getItem(key);
}

    const jsonString = JSON.stringify(correo, null, 2);
    const blob = new Blob([jsonString], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'datos_suscripcion.json';
    
    a.click(); 
URL.revokeObjectURL(url);


}