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

    // uncomment to put validation messages in a box - must fix css as well.
    errorContainer: $('#errorContainer'),
    errorLabelContainer: $('#errorContainer ul'),
    wrapper: 'li'

  });

  // Login form validation
  // $('#login_form').validate({

  //   rules: {
  //     loginEmail: {
  //       required: true,
  //       maxlength: 64
  //     },
  //     loginPasswd: {
  //       required: true,
  //       maxlength: 32
  //     }
  //   },

  //   messages: {
  //     loginEmail: {
  //       required: "Please enter your email.",
  //       maxlength: "Your email address cannot exceed 64 characters."
  //     },
  //     loginPasswd: {
  //       required: "Please enter your password.",
  //       maxlength: "Your password cannot exceed 32 characters."
  //     }
  //   }
  // });

// Registration form slide
  $('#reg-div').hide();
  $('#reg-btn').click(function(e) {
      e.preventDefault();
     $('#reg-div').stop().slideToggle(500);
  });

// Send checkbox to mid.php
  // $("#loginBtn").click(function() {

  //   //alert($("#persist_box").val());

  //       $.ajax({
  //           type: "POST",
  //           url: "mid.php",
  //           data:{ 
  //               id : flag
  //           },
  //           success: function(data) {
  //               alert(data);
  //               // reload main.php to receive a new question
  //               //$("#content").load("mid.php");

  //           },
  //           error: function(jqXHR, textStatus, errorThrown) {
  //             alert("jqXHR: " + jqXHR.status + "\ntextStatus: " + textStatus + "\nerrorThrown: " + errorThrown);
  //           }
  //       });

  //       // UNCOMMENT THIS AND THE INFO DIV IN MAIN.PHP TO VIEW UPDATESCORE.PHP
  //       //$("#infoDiv").load("updateScore.php");
        
  //   });

});

// // change the active tab
// function chooseStats(evt, choice) {
//     // Declare all variables
//     var i, tabcontent, tablinks;

//     // // Get all elements with class="tabcontent" and hide them
//     // tabcontent = document.getElementsById("content");
//     // for (i = 0; i < tabcontent.length; i++) {
//     //     tabcontent[i].style.display = "none";
//     // }

//     // Get all elements with class="tablinks" and remove the class "active"
//     tablinks = document.getElementsByClassName("navlinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }

//     // Show the current tab, and add an "active" class to the link that opened the tab
//     document.getElementById(choice).style.display = "block";
//     evt.currentTarget.className += " active";
// }

// $(document).on('click', '#loginBtn', function(e) {
//     e.preventDefault();
//     $.ajax({
//         type: "POST",
//         url: $("#login_form").attr('action'),
//         data: $("#login_form").serialize(),

//         success: function(response) {
//              if (response === "success") {
//                   window.reload;
//              } else {
//                    alert("invalid username/password.  Please try again");
//                    alert(response);
//                    alert(data);
//              }
//         }
//     });
// });