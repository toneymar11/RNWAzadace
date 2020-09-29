$(document).ready(function(){
    $("td").mouseover(function() {
      let span = $('<span>', {class: 'tip', text : $(this).parent().text()});
      $(this).addClass("tip").append(span);
    });
  
    $("td").mouseout(function() {
      $(this).removeClass("tip");
      $('span', this).remove();    
    });
  });