var table = document.getElementById("customers");
if (table != null) {
    for (var i = 0; i < table.rows.length; i++) {
					table.rows[i].classList.add("tip");
					var str=table.rows[i].innerHTML;
					table.rows[i].cells[0].innerHTML+="<span>"+str+"</span>"
        for (var j = 0; j < table.rows[i].cells.length; j++){

    
		}

    }
}