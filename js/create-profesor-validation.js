
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='create-profesor-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombres: "required",
      apellidos:"required",
      password: "required",
      email: "required",
      nickname:"required"
        },
    // Specify validation error messages
    messages: {
      nombres: "Por favor, ingrese sus nombres",
      apellidos:"Por favor, ingrese sus apellidos",
      password: "Por favor, ingrese una contraseña",
      email: "Por favor, ingrese un correo electrónico",
      nickname:"Por favor, ingrese un nombre de usuario"
        },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
