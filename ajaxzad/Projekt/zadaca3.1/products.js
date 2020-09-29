function handleData(data) {

    let rows = JSON.parse(data);
  
    if(rows.length > 0) {
      
      $("#messages").empty().append("<table id='customers'> </table>");
      
      let table = $("#customers");
  
      let tableHead = "<tr>"
      tableHead += "<td>Product Name</td>"
      tableHead += "<td>Unit Price</td>"
      tableHead += "<td>Product Category</td>"
      tableHead += "</tr>"
  
      table.append(tableHead)
  
      for(let row of rows) {
        let tableRow = "<tr class='alt'>"
        tableRow += "<td>" + row.ProductName + "</td>"
        tableRow += "<td>" + row.UnitPrice + "</td>"
        tableRow += "<td>" + row.CategoryName + "</td>"
        
       /* tableRow += "<td><input type='hidden' name='id_autor' id='id_autor' value="+ row.id +"> <button class='details' type='submit'>Details</button></td>"
        */tableRow += "</tr>"
  
        table.append(tableRow)
  
      }
    }
    else{
      $("#messages").empty().append("<div> Nema podataka u tablici </div>");
    }
  }
  
  function loadXMLDoc(product_name, selected ) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "products.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        handleData(this.responseText);
      }
    };
    xhttp.send("product_name=" + product_name + "&selected=" + selected);
  }
  
  var search = document.getElementById("search");
  var product_name = document.getElementById("product_name");
  
  
  
  search.onclick = function() {
  
    if (product_name.value === ""){
      document.getElementById("err").textContent="Morate popuniti jedno polje";
      console.log('Morate popuniti polje');
      
    }
    else{
      document.getElementById("err").textContent="";
  var orand = document.getElementsByName("action");
  var selected = Array.from(orand).find(orand => orand.checked);
    //console.log(selected.value)
    loadXMLDoc(product_name.value, selected.value);
  }

    
}

