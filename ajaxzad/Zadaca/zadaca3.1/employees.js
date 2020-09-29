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
  
  function loadXMLDoc(first, last, selected ) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "employees.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        handleData(this.responseText);
      }
    };
    xhttp.send("first=" + first + "&last=" + last + "&selected=" + selected);
  }
  
  var search = document.getElementById("search");
  var first = document.getElementById("first");
  var last = document.getElementById("last");
  
  
  search.onclick = function() {
  
    if (first.value === "" && last.value === ""){
      document.getElementById("err").textContent="Morate popuniti jedno polje";
      console.log('Morate popuniti jedno polje');
      
    }
    else{
      document.getElementById("err").textContent="";
  var orand = document.getElementsByName("action");
  var selected = Array.from(orand).find(orand => orand.checked);
    //console.log(selected.value)
    loadXMLDoc(first.value, last.value, selected.value);
  }

    
}
