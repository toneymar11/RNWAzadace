<?php
include "config.php";

$userid = $_POST['userid'];

$sql = "SELECT * FROM orders FULL JOIN customers WHERE OrderID='$userid' GROUP by OrderID;";
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
 $CustomerID = $row['CustomerID'];
 $CompanyName = $row['CompanyName'];
 $Phone = $row['Phone'];
 $ShipAddress = $row['ShipAddress'];
 $ShipRegion = $row['ShipRegion'];
 $ShipCountry = $row['ShipCountry'];
 
 $response .= "<tr>";
 $response .= "<td>CustomerID : </td><td>".$CustomerID."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>CompanyName : </td><td>".$CompanyName."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Phone : </td><td>".$Phone."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>ShipAddress : </td><td>".$ShipAddress."</td>";
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>ShipRegion : </td><td>".$ShipRegion."</td>"; 
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>ShipCountry : </td><td>".$ShipCountry."</td>"; 
 $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;
?>