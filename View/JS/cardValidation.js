document.getElementById('formularioPago').addEventListener('submit', function(event) {
    event.preventDefault();

    // Limpia mensajes de error
    document.querySelectorAll('.error').forEach(function(el) {
        el.textContent = '';
});


    const nombre = document.getElementById('nombre');
    const numeroCuenta = document.getElementById('numeroCuenta');
    const dni = document.getElementById('dni');
    const fechaExpiracion = document.getElementById('fechaExpiracion');
    const codigoSeguridad = document.getElementById('codigoSeguridad');

    let isValid = true;

    // Comprobación de campos requeridos
    if (nombre.value.trim() === "") {
        document.getElementById('errorNombre').textContent = "Este campo es obligatorio.";
        isValid = false;
    }
    if (numeroCuenta.value.trim() === "") {
        document.getElementById('errorNumeroCuenta').textContent = "Este campo es obligatorio.";
        isValid = false;
    }
    if (dni.value.trim() === "") {
        document.getElementById('errorDni').textContent = "Este campo es obligatorio.";
        isValid = false;
    }
    if (fechaExpiracion.value.trim() === "") {
        document.getElementById('errorFechaExpiracion').textContent = "Este campo es obligatorio.";
        isValid = false;
    }
    if (codigoSeguridad.value.trim() === "") {
        document.getElementById('errorCodigoSeguridad').textContent = "Este campo es obligatorio.";
        isValid = false;
    }

    // Validación para Nombre y Apellidos
    const nombreRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!nombreRegex.test(nombre.value)) {
        document.getElementById('errorNombre').textContent = "El nombre solo debe contener letras y espacios.";
        isValid = false;
    }

    // Validación para Número de Cuenta
    const cuentaRegex = /^\d{16}$/;
    if (!cuentaRegex.test(numeroCuenta.value)) {
        document.getElementById('errorNumeroCuenta').textContent = "El número de cuenta debe tener exactamente 16 dígitos.";
        isValid = false;
    }

    // Validación para DNI
    const dniRegex = /^\d{8}[A-Za-z]$/;
    if (!dniRegex.test(dni.value)) {
        document.getElementById('errorDni').textContent = "El DNI debe contener 8 dígitos y una letra al final.";
        isValid = false;
    }

    // Validación para Fecha de Expiración
    const fechaExpiracionRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
    if (!fechaExpiracionRegex.test(fechaExpiracion.value)) {
        document.getElementById('errorFechaExpiracion').textContent = "La fecha de expiración debe tener el formato MM/AA.";
        isValid = false;
    }

    // Validación para Código de Seguridad
    const codigoSeguridadRegex = /^\d{3}$/;
    if (!codigoSeguridadRegex.test(codigoSeguridad.value)) {
        document.getElementById('errorCodigoSeguridad').textContent = "El código de seguridad debe ser de 3 dígitos.";
        isValid = false;
    }

    // Si todas las validaciones pasan, se envía el formulario
    if (isValid) {
        console.log("Datos bancarios validados correctamente. Procesando pago...");
        event.target.submit(); 
		window.location.href = '../Controller/validations/CompraValidation.php';
    }
		

	});
