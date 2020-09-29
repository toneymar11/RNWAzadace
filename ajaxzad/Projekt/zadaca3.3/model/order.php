<?php
    class Order {
        function __construct($connection) {
            $this->connection = $connection;
        }

        public function where($from_date, $to_date) {
                

            $query = "  
            SELECT * FROM orders  
            WHERE OrderDate BETWEEN '$from_date' AND '$to_date' ";  
                
 
            return  $this->list(mysqli_query($this->connection, $query));
            

            
        }
       

        private function list($companies) {
            $companyList = [];

            while($row = mysqli_fetch_array($companies)) {
                $companyList[] = $row;
            }

            return json_encode($companyList);
        }
    }