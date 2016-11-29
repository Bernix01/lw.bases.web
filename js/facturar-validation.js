
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='facturar-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombres: "required",
      apellidos:"required",
      ruc: "required",
      direccion: "required"
    },
    // Specify validation error messages
    messages: {
      nombres: "Por favor, ingrese sus nombres",
      apellidos: "Por favor, ingrese sus apellidos",
      ruc: "Por favor, ingrese el ruc",
      direccion:"Por favor, ingrese la dirección"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
