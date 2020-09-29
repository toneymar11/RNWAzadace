function handleData(data) {

  let rows = JSON.parse(data);

  if(rows.length > 0) {
      
    $("#messages").empty().append("<table id='customers'> </table>");
    
    let table = $("#customers");

    let tableHead = "<tr>"
    tableHead += "<td>First Name</td>"
    tableHead += "<td>Last Name</td>"
    tableHead += "<td>Birth Date</td>"
    tableHead += "<td>Hire Date</td>"
    tableHead += "<td>Gender</td>"
    tableHead += "</tr>"

    table.append(tableHead)

    for(let row of rows) {
      let tableRow = "<tr class='alt'>"
      tableRow += "<td>" + row.first_name + "</td>"
      tableRow += "<td>" + row.last_name + "</td>"
      tableRow += "<td>" + row.birth_date + "</td>"
      tableRow += "<td>" + row.hire_date + "</td>"
      tableRow += "<td>" + row.gender + "</td>"
      tableRow += "</tr>"

      table.append(tableRow)

    }
  }
  else{
    $("#messages").empty().append("<div> Nema podataka u tablici </div>");
  }
}

$(document).ready(function () {
  $("#search").click(function() {
     let first = $("#first").val();
     let last = $("#last").val();
     var selected = $("input[name='action']:checked").val();



     if(!first && !last) {
         $("#err").text('Morate popuniti jedno polje');
 
     }

     else{
         $("#err").text('');
         $.post("./employees.php", {first : first, last : last, selected : selected}, handleData)
     }
 })
});