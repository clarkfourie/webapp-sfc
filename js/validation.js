//jQuery test

// window.onload = function() {
//     if (window.jQuery) {  
//         // jQuery is loaded  
//         alert("Yeah!");
//     } else {
//         // jQuery is not loaded
//         alert("Doesn't Work");
//     }
// }
 
// Custom jQuery validation methods
// jQuery.validator.addMethod("exactlength", function(value, element, param) {
//  return this.optional(element) || value.length == param;
// }, jQuery.format("Please enter exactly {0} characters."));


//jQuery validation via plugin

$().ready(function () {
  "use strict";

  // Registration form validation
  $('#register').validate({

    rules: {
      firstname: {
        required: true,
        maxlength: 40
      },
      lastname: {
        required: true,
        maxlength: 40
      },
      email: {
        required: true,
        maxlength: 64,
        email: true
      },
      password: {
        required: true,
        minlength: 6,
        maxlength: 32
      },
      confirmPassword: {
        required: true,
        equalTo: "#password"
      },
      rsaid: {
        required: true,
        // exactlength: 13,
        digits: true
      }
    },

    messages: {
      firstname: {
        required: "Please enter your first name.",
        maxlength: "Your first name cannot exceed 40 characters."
      },
      lastname: {
        required: "Please enter your last name.",
        maxlength: "Your last name cannot exceed 40 characters."
      },
      email: {
        required: "Please enter your email address.",
        maxlength: "Your email address cannot exceed 64 characters.",
        email: "The email format provided is invalid."
      },
      password: {
        required: "Please enter a password.",
        minlength: "Your password must contain at least 6 characters.",
        maxlength: "Your password cannot contain more than 32 characters."
      },
      confirmPassword: {
        required: "Please confirm your password.",
        equalTo: "Your passwords do not match!"
      },
      rsaid: {
        required: "Please enter a valid RSA id number.",
        // exactlength: "Your ID number must contain 13 characters!",
        digits: "Your ID number must consist of numerals only!"
      }
    },

    errorContainer: $('#errorContainer'),
    errorLabelContainer: $('#errorContainer ul'),
    wrapper: 'li'

  });

  // Login form validation
  $('#login_form').validate({

    rules: {
      loginEmail: {
        required: true,
        maxlength: 64
      },
      loginPasswd: {
        required: true,
        maxlength: 32
      }
    },

    messages: {
      loginEmail: {
        required: "Please enter your email.",
        maxlength: "Your email address cannot exceed 64 characters."
      },
      loginPasswd: {
        required: "Please enter your password.",
        maxlength: "Your password cannot exceed 32 characters."
      }
    }

  });

});