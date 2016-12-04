
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

      contenido:{
        required:true,
        maxlength:100,
        url:true
      }

        },
    // Specify validation error messages
    messages: {
      contenido:{
        required:"Por favor, ingrese la URL del certificado",
        maxlength: "La URL no debe de sobrepasar 100 caracteres",
        url: "URL no válida"
    }
        },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
