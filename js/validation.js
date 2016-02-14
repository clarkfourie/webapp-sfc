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
// jQuery.validator.addMethod("exactLength", function(value, element, param) {
//  return this.optional(element) || value.length == param;
// }, jQuery.format("Please enter exactly {0} characters."));


//jQuery validation via plugin

$().ready(function () {
  "use strict";
  $('#register').validate({

    rules: {
      firstname: {
        required: true,
        maxLength: 40
      },
      lastname: {
        required: true,
        maxLength: 40
      },
      email: {
        required: true,
        maxLength: 64,
        email: true
      },
      password: {
        required: true,
        minLength: 6,
        maxLength: 32
      },
      confirmPassword: {
        required: true,
        equalTo: "#password"
      },
      rsaid: {
        required: true,
        //exactLength: 13,
        digits: true
      }
    },

    messages: {
      firstname: {
        required: "Please enter your first name.",
        maxLength: "Your first name cannot exceed 40 characters."
      },
      lastname: {
        required: "Please enter your last name.",
        maxLength: "Your last name cannot exceed 40 characters."
      },
      email: {
        required: "Please enter your email address.",
        maxLength: "Your email address cannot exceed 64 characters.",
        email: "The email format provided is invalid."
      },
      password: {
        required: "Please enter a password.",
        minLength: "Your password must contain at least 6 characters.",
        maxLength: "Your password cannot contain more than 32 characters."
      },
      confirmPassword: {
        required: "Please confirm your password.",
        equalTo: "Your passwords do not match!"
      },
      rsaid: {
        required: "Please enter a valid RSA id number.",
        //exactLength: "Your ID number must contain 13 characters!",
        digits: "Your ID number must consist of numerals only!"
      }
    },

    errorContainer: $('#errorContainer'),
    errorLabelContainer: $('#errorContainer ul'),
    wrapper: 'li'

  });
});