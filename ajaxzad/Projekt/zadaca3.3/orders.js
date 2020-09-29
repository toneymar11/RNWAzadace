function handleData(data) {

    let rows = JSON.parse(data);
  
    if(rows.length > 0) {
      
      $("#messages").empty().append("<table id='customers'> </table>");
      
      let table = $("#customers");
  
      let tableHead = "<tr>"
      tableHead += "<td>OrderID</td>"
      tableHead += "<td>OrderDate</td>"
      tableHead += "<td>ShipName</td>"
      tableHead += "</tr>"
  
      table.append(tableHead)
  
      for(let row of rows) {
        let tableRow = "<tr class='alt'>"
        tableRow += "<td>" + row.OrderID + "</td>";
        tableRow += "<td>" + row.OrderDate + "</td>"
        tableRow += "<td>" + row.ShipName + "</td>"
      
        
        tableRow += "<td><button id='" + row.OrderID + "' class='userinfo' onclick='javascript:myFunction(this.id)'>Details</button></td>"
        tableRow += "</tr>"
  
        table.append(tableRow);
  
      }
    }
    else{
      $("#messages").empty().append("<div> Nema podataka u tablici </div>");
    }
  }
 
  $(document).ready(function(){  
    $.datepicker.setDefaults({  
         dateFormat: 'yy-mm-dd'   
    });  
    $(function(){  
         $("#from_date").datepicker();  
         $("#to_date").datepicker();  
    });  
    $('#search').click(function(){  
         var from_date = $('#from_date').val();  
         var to_date = $('#to_date').val();  
         if(from_date != '' && to_date != '')  
         {  
          $("#err").text('');
          $.post("./orders.php", {from_date : from_date, to_date : to_date}, handleData);
         }  
         else  
         {  
              alert("Please Select Date");  
         }  
    });       
});  

