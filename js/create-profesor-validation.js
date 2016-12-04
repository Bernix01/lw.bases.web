
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
      nombres: {required:true, maxlength: 46, lettersonly:true},
      apellidos:{required:true, maxlength: 46, lettersonly:true},
      cedula: {required:true, minlength:10, maxlength:13, digits:true},
      password: {required:true, minlength: 5, maxlength: 15},
      email: {required: true, email:true},
      nickname:{required:true, maxlength: 16, nowhitespace:true},
      tagline:{required:true, maxlength: 100}
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
      password: {
        required: "Por favor, ingrese una contraseña",
        minlength: "Su contraseña debe tener mínimo 5 caracteres",
        maxlength: "Su contraseña debe tener máximo 15 caracteres"
      },
      cedula:{
        required:"Por favor, ingrese su número de cédula o RUC",
        digits: "Ingrese un número de cédula o RUC válido",
        minlength: "Ingrese un número de cédula o RUC válido",
        maxlength: "Su número de cédula o RUC debe tener máximo 13 caracteres"
      },
      email: {
        required: "Por favor, ingrese un correo electrónico",
        email: "Ingrese un correo electrónico válido"
      },
      nickname:{
        nowhitespace: "Su nombre de usuario no debe contener espacios en blanco",
        required:"Por favor, ingrese un nombre de usuario",
        maxlength: "Su nombre de usuario debe tener máximo 16 caracteres"
      },
      tagline:{
        required:"Debe llenar este campo con su información académica",
        maxlength:"No se debe de exceder de 100 caracteres "
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
