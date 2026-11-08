const form = document.getElementById('mecanico-form');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // No enviar el formulario

    //Obtenemos los valores de los campos
    const nombre = document.getElementById('nombre').value;
    const edad = document.getElementById('edad').value;
    const ciudadNacimiento = document.getElementById('ciudad-nacimiento').value;
    const dni = document.getElementById('dni').value;
    const telefono = document.getElementById('telefono').value;

    // Realizar validaciones adicionales si es necesario

    // Mostrar los datos ingresados en la consola
    console.log('Nombre:', nombre);
    console.log('Edad:', edad);
    console.log('Ciudad de nacimiento:', ciudadNacimiento);
    console.log('DNI:', dni);
    console.log('Teléfono:', telefono);

    
});

function actualizarCiudad() {
    const select = document.getElementById("ciudad-select");
    const input = document.getElementById("ciudad-nacimiento");
    const ciudadSeleccionada = select.options[select.selectedIndex].text;

    if (ciudadSeleccionada !== "Seleccione su ciudad") {
        input.value = ciudadSeleccionada;
    } else {
        input.value = "";
    }
}