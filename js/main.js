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


    $().ready(function(){
    "use strict";

  // Hover functions

    $(".block1").hover(function() {
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block2").hover(function() {
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block3").hover(function() {
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block4").hover(function() {
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

  // Click functions

    var flag = 0;

    $(".block1").click(function() {
        flag = 1; 
        alert(flag);
    });

    $(".block2").click(function() {
        flag = 2;
        alert(flag);
    });

    $(".block3").click(function() {
        flag = 3;
        alert(flag);
    }); 

    $(".block4").click(function() {
        flag = 4;
        alert(flag);
    });



// TRY TO GET THIS FIXED INSTEAD OF USING SESSION
    $("#ansSubmit").click(function() {

        $.ajax({
            //type: "POST",
            url: "updateScore.php",
            data:{ 
                id : flag
            },
            //dataType: "json",
            // async: false,
            //contentType: "application/json",
            success: function(data) {
                alert(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert("jqXHR: " + jqXHR.status + "\ntextStatus: " + textStatus + "\nerrorThrown: " + errorThrown);
            }
        });


        // $.ajax({
        //     url: "main.php",
        //     success: function(data){ 
        //         $.ajax({
        //             url: "updateScore.php",
        //             data: {id: flag},
        //             success: function(data){ 
        //                 // your code
        //                 alert(data);
        //             }
        //         });
        //     }
        // });

        $("#infoDiv").load("updateScore.php");
  
    });

    

});