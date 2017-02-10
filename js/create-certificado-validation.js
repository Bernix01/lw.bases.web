
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#create-certificado-form").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      id_estudiante:{
        required:true,
        minlength:13,
        maxlength:13
      }
      contenido:{
        required:true,
        maxlength:100,
      }

        },
    // Specify validation error messages
    messages: {
      id_estudiante:{
        required:"Por favor, ingrese la URL del certificado",
        maxlength: "El id del usuario no debe sobrepasar los 13 caracteres",
        minlength: "El id del usuario debe tener 13 caracteres"
      }
      contenido:{
        required:"Por favor, ingrese la URL del certificado",
        maxlength: "La URL no debe de sobrepasar 100 caracteres"
    }
        },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
