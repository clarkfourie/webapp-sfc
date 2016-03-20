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

    $(".block1").hover(function(){
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block2").hover(function(){
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block3").hover(function(){
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });

    $(".block4").hover(function(){
        $(this).find("div.snipit").slideDown("slow");
    },function(){
        $(this).find("div.snipit").slideUp("slow");    
    });
 
});