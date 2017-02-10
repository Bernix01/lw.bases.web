
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='formulario-pago']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombres: {required:true, maxlength: 46, lettersonly:true},
      apellidos:{required:true, maxlength: 46, lettersonly:true},
      ccv: {required:true, minlength:3, maxlength:3, digits:true},
      num_tarjeta:{required:true, minlength:16, maxlength:16, digits:true}
      },
    // Specify validation error messages
    messages: {
      nombres: {
        required:"Por favor, ingrese sus nombres",
        lettersonly:"Sus nombres no deben contener números",
        maxlength: "Sus nombres no deben de exceder un máximo de 46 caracteres"},
      apellidos:{
        lettersonly:"Sus apellidos no deben contener números",
        required:"Por favor, ingrese sus apellidos",
        maxlength: "Sus apellidos no deben de exceder un máximo de 46 caracteres"
      },
      ccv: {
        required: "Por favor, ingrese una contraseña",
        minlength: "Debe de tener 3 dígitos",
        digits: "Sólo se permiten números",
        maxlength: "Debe de tener 3 dígitos"
      },
      num_tarjeta:{
        required:"Por favor, ingrese su número de cédula o RUC",
        digits: "Sólo se permiten números",
        minlength: "Debe de tener 16 dígitos",
        maxlength: "Debe de tener 16 dígitos"

      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
