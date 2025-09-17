// Referencia a los elementos
const divPatente = document.getElementById("validacionPatente");
const patenteInvalido = document.getElementById("patenteInvalid");
const patenteValido = document.getElementById("patenteValid");

// funcion para ejecutar la validacion 
function validarPatente() {
    // Inicializo mi bandera como true
    let esValido = true; 
    // Guardo el valor del input
    const patente = divPatente.value.trim();
    // Reset previo
    divPatente.classList.remove("is-invalid", "is-valid");
    patenteInvalido.textContent = "";
    patenteValido.textContent = "";
    // Validaciones
    if (patente === "") {
        divPatente.classList.add("is-invalid");
        patenteInvalido.textContent = "Este campo no puede estar vacío.";
        esValido = false;
    } else {
        const regexPatente = /^[A-Z]{3}\d{3}$/i;
        if (!regexPatente.test(patente)) {
            divPatente.classList.add("is-invalid");
            patenteInvalido.textContent = "Formato de patente inválido (ej: AAA123).";
            esValido = false;
        } else {
            divPatente.classList.add("is-valid");
            patenteValido.textContent = "Patente válida ✅";
        }
    }
    return esValido;
}

// Evento en tiempo real
divPatente.addEventListener("input", validarPatente);

// Evento al enviar formulario
document.getElementById("loginForm").addEventListener("submit", function(event) {
    if (!validarPatente()) {
        event.preventDefault(); // Evita envío si está mal
    }
});
