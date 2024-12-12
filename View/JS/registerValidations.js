document.addEventListener("DOMContentLoaded", function() {
  var form = document.querySelector("form");
  var usuarioInput = document.getElementById("usuario");
  var correoInput = document.getElementById("correo");
  var contrasenaInput = document.getElementById("contrasena");
  var confirmarContraselaInput = document.getElementById("confirmarContrasela");
  var terminosInput = document.getElementById("terminos");
  var errorDiv = document.getElementById("error-message");

  form.addEventListener("submit", function(event) {
    // Validaciones adicionales para cada campo

           // Clear previous error messages
    errorDiv.textContent = '';


      if (!usuarioInput.value) {
        // Agrega el texto al div
        errorDiv.textContent = 'El campo Usuario es obligatorio';
          event.preventDefault();
          return;
      }

      if (!correoInput.value || !isValidEmail(correoInput.value)) {

        // Agrega el texto al div
        errorDiv.textContent = 'El campo Correo Electrónico es obligatorio y debe ser un correo válido';
          event.preventDefault();
          return;
      }

      if (!contrasenaInput.value || contrasenaInput.value.length < 8) {

        // Agrega el texto al div
        errorDiv.textContent = 'El campo Contraseña es obligatorio y debe tener al menos 8 caracteres';
          event.preventDefault();
          return;
      }

    //   if (contrasenaInput.value !== confirmarContraselaInput.value) {
    //       alert("Las contraseñas no coinciden");
    //       event.preventDefault();
    //       return;
    //   }

      if (!terminosInput.checked) {
          alert("Debes aceptar los Términos y Condiciones");
          event.preventDefault();
          return;
      }
  });

  function isValidEmail(email) {
      var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(email);
  }
});
