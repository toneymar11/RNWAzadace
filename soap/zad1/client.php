<?php

  if (isset($_POST["id"])) {
    $id = $_POST['id'];

  try{
  ini_set('soap.wsdl_cache_enabled',0);
  ini_set('soap.wsdl_cache_ttl',0);

    $sClient = new SoapClient('http://localhost/soap/zad1/wsdl/product.wsdl',
              array('cache_wsdl'=>WSDL_CACHE_NONE,'trace' => 1)
              );
    $response = $sClient->listProducts($id);
    //var_dump($sClient->__getLastRequest()); //Ako treba ispisat SOAP req objekt, za resp _getLastResponse
    $sClient->__getLastRequest();

  }catch(SoapFault $e){
    var_dump($e);
    echo $e;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="products.css">
  <style>
    #id {
        width: 100%;
        padding: 10px 10px;
        margin: 3px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    #last{
        width: 100%;
        padding: 10px 10px;
        margin: 3px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;

    }
    #search{
      width: 100%;
        background-color: #3b5998;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    #err{
      color: red;
    }
  </style>
</head>
<body>

    <div style="width: 20%;">

    <p>Upisite SupplierID: </p>  
    <form id="form" action="./client.php" method="post">
    <input type="text" id="id" name="id" placeholder="SupplierID">  
    <div id="err"></div>

    <button id="search" type="submit">Pretraži</button>
    </form>
    </div>

    <table id='products'> 
    <tr>
    <td>Supplier Company name</td>
    <td>Supplier Adress</td>
    <td>Supplier City</td>
    <td>Product Name</td>
    <td>Product Catergory Name</td>
    
    </tr>
    <?php
		                for($j=0;$j<sizeof($response);$j++) {
                          echo "<tr class='alt'>
                                <td>".$response[$j][0]."</td>
                                <td>".$response[$j][1]."</td>
                                <td>".$response[$j][2]."</td>
                                <td>".$response[$j][3]."</td>
                                <td>".$response[$j][4]."</td>
                                </tr>";
                                }
                            if($j==0){
                                echo "<tr class='alt' style='text-align:center;'><td colspan='5' rowspan='2'>Nema podataka u tablici</td></tr>";
                            }
                            ?>
    </p>   
  
</table>
</body>
</script> 
</html>


