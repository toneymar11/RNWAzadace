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
  
  $(document).ready(function () {
    $("#search").click(function() {
       let product_name = $("#product_name").val();
       var selected = $("input[name='action']:checked").val();

       if(!product_name) {
           $("#err").text('Morate popuniti polje');
   
       }
  
       else{
           $("#err").text('');
           $.post("./products.php", {product_name : product_name, selected : selected}, handleData)
       }
   })
  });

