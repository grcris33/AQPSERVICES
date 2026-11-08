document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitamos que el formulario se envíe

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorElement = document.getElementById('error');

    if (username.toLowerCase() === 'admi' && password === '12345') {
        window.location.href = 'InicioAdmi.html';
    } else {
        errorElement.textContent = 'Usuario o contraseña incorrectos';
    }
    
   
});
