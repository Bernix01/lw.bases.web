
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
      nombres: {
        required:true,
        lettersonly:true,
        maxlength: 46
      },
      apellidos:{
        required:true,
        maxlength: 46,
        lettersonly:true
      },
      ruc: {
        required:true,
        minlength:10,
        maxlength:13,
        digits:true
      },
      direccion: "required"
    },
    // Specify validation error messages
    messages: {
      nombres: {
        required:"Por favor, ingrese sus nombres",
        lettersonly:"Sus nombres no deben contener números",
        maxlength: "Sus nombres no deben de exceder un máximo de 46 caracteres"},
      apellidos:{
        required:"Por favor, ingrese sus apellidos",
        lettersonly:"Sus apellidos no deben contener números",
        maxlength: "Sus apellidos no deben de exceder un máximo de 46 caracteres"
      },
      ruc:{
        required:"Por favor, ingrese su número de cédula o RUC",
        digits: "Ingrese un número de cédula o RUC válido",
        minlength: "Ingrese un número de cédula o RUC válido",
        maxlength: "Su número de cédula o RUC debe tener máximo 13 caracteres"
      },
      direccion:"Por favor, ingrese la dirección"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
