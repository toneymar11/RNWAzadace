<?php
include 'database/databaseConfig.php';
include 'database/databaseConnection.php';
include 'model/product.php';

$config = include 'database/dbConfig.php';

if(isset($_POST["product_name"])) {
    $databaseConnection = new DatabaseConnection(new DatabaseConfig($config));
    $connection = $databaseConnection->connection();
    $product = new Product($connection);
    $products = $product->where($_POST["product_name"],$_POST["selected"] );

    
    echo $products;
}
?>