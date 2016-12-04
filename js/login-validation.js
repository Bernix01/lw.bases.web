
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='login-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side

      password: {required:true},
      nickname:{required:true}
        },
    // Specify validation error messages
    messages: {
      nickname:"Por favor, ingrese un nombre de usuario",
      password:"Por favor, ingrese una contraseña"
  },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});
