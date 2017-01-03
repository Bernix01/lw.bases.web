
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
            nombre: {required:true, maxlength:4},
            cupo_max: {required:true, digits:true},
            cupo_min: {required:true, digits:true},
            costo:{required:true, number:true},
            descripcion: {required:true , maxlength:200}
        },
        // Specify validation error messages
        messages: {
            nombre: {
                required: "Por favor, ingrese el nombre del curso",
                maxlength: "El nombre del curso no debe sobrepasar los 64 caracteres"
            },
            cupo_max: {
                required:"Por favor, ingrese el número máximo de cupos",
                digits: "Ingrese una cantidad válida"
            },
            cupo_min:  {
                required:"Por favor, ingrese el número mínimo de cupos",
                digits: "Ingrese una cantidad válida"
            },

            costo: {
                required:"Por favor, ingrese el costo del curso",
                digits: "Ingrese un valor válido"
            },
            descripcion:{
                required:"Por favor, ingrese una descripción",
                maxlength:"La descripción no debe exceder los 200 caracteres"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form,event) {
            event.preventDefault();
            var f_inicio=document.getElementsByName("fecha_inicio").value;
            var f_fin=document.getElementsByName("fecha_fin").value;
            console.log(f_inicio);
            var inicios=document.getElementsByClassName("inicio");
            var fines= document.getElementsByClassName("fin");
            var tam=len(inicios);
            for(var i=0; i<tam; i++){

            }
            //form.submit();
            //return false;
        }

    });
});
