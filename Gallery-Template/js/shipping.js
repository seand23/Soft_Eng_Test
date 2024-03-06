// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#confirm").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        //name: "required",
        name: "required",
        email: "required",
        address1: "required",
        address2: "required",
        phone: "required",
        
        phone: {
            required: true,
            number: true,
            minlength: 9,
        },
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        }
      },
      // Specify validation error messages
     messages: {
        phone: {
            number: "Please enter a valid phone number without spaces"
        }
     },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
