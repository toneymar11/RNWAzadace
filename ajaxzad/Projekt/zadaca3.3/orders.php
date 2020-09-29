<?php
include 'database/databaseConfig.php';
include 'database/databaseConnection.php';
include 'model/order.php';

$config = include 'database/dbConfig.php';

if(isset($_POST["from_date"]) && isset($_POST["to_date"])) {
    $databaseConnection = new DatabaseConnection(new DatabaseConfig($config));
    $connection = $databaseConnection->connection();
    $order = new Order($connection);
    $orders = $order->where($_POST["from_date"],$_POST["to_date"] );

    
    echo $orders;
}

  
?>