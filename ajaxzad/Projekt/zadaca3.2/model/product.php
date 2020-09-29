<?php
    class Product {
        function __construct($connection) {
            $this->connection = $connection;
        }

        public function where($product_name, $selected) {
                
            if($selected == 'and'){
                
                if($product_name == ''){

                    $query  = "SELECT * FROM products ";
                }
                else{

                        $query = "SELECT p.ProductName, p.UnitPrice, c.CategoryName
                        FROM products AS p JOIN categories AS c ON p.CategoryID = c.CategoryID
                        WHERE ProductName='$product_name'";
                    /*
                        $query  = "SELECT p.ProductName, p.UnitPrice, c.CategoryName FROM products as p ";
                        $query .= "JOIN categories as c ON p.CategoryID = c.CategoryID";
                        $query .= "WHERE ProductName='$product_name'";
                   */
                }
                return  $this->list(mysqli_query($this->connection, $query));
            }
            else{

                if($product_name == ''){
                    $query  = "SELECT * FROM products ";
                    
                }
                else {
                    $query = "SELECT p.ProductName, p.UnitPrice, c.CategoryName
                     FROM products AS p JOIN categories AS c ON p.CategoryID = c.CategoryID
                     WHERE ProductName LIKe '%$product_name%'";
                   /* $query  = "SELECT p.ProductName, p.UnitPrice, c.CategoryName FROM products as p ";
                    $query .= "JOIN categories as c ON p.CategoryID = c.CategoryID";
                    $query .= "WHERE ProductName LIKE '%$product_name%'";
                    */
                }
                
 
                return  $this->list(mysqli_query($this->connection, $query));
            }

            
        }

        private function list($companies) {
            $companyList = [];

            while($row = mysqli_fetch_array($companies)) {
                $companyList[] = $row;
            }

            return json_encode($companyList);
        }
    }