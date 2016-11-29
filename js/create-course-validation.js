
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='create-course-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombre: "required",
      cupo_max: "required",
      cupo_min: "required",
      cupos_disponibles:"required",
      costo:"required"
    },
    // Specify validation error messages
    messages: {
      nombre: "Por favor, ingrese el nombre del curso",
      cupo_max: "Por favor, ingrese el número máximo de cupos",
      cupo_min: "Por favor, ingrese el número mínimo de cupos",
      cupos_disponibles:"Por favor, ingrese la cantidad de cupos disponibles",
      costo:"Por favor, ingrese el costo del curso"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
