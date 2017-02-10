
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='create-emprendimiento-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombre: "required",
      descripcion:{"required",maxlength:200},
      id_estudiante: {required:true, minlength:13, maxlength:13, digits:true}

        },
    // Specify validation error messages
    messages: {
      nombre: "Por favor, ingrese el nombre de la empresa",
      descripcion:{
        required:"Por favor, ingrese la descripción de su negocio",
        maxlength: "Su descripción no debe sobrepasar los 150 caracteres"
    },
    id_estudiante:{
      required:"Por favor, ingrese el id del estudiante",
      digits: "Ingrese un número de cédula o RUC válido",
      minlength: "Ingrese un número de cédula o RUC válido",
      maxlength: "Su número de cédula o RUC debe tener máximo 13 caracteres"
    }
        },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
