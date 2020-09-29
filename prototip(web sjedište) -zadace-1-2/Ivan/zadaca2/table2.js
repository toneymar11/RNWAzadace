$(document).ready(function(){
    $("td").click(function(){  
     $("#redak")
        .empty()
        .append("<div>" + $(this).parent().text() + "</div>")
    });
  });