<?php
    class Employee {
        function __construct($connection) {
            $this->connection = $connection;
        }

        public function where($first, $last, $selected) {
            if($selected == 'and'){
                
                if($first == ''){

                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE last_name='$last'";

                }
                else if($last == ''){
                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE first_name='$first'";

                }
                else{
                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE first_name='$first'";
                    $query .= "OR last_name='$last'";
                }
                return  $this->list(mysqli_query($this->connection, $query));
            }
            else{

                if($first == ''){
                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE last_name LIKE '%$last%'";
                }
                else if($last == ''){
                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE first_name LIKE '%$first%'";
                }
                else {
                    $query  = "SELECT * FROM employees ";
                    $query .= "WHERE last_name LIKE '%$last%'";
                    $query .= "OR first_name LIKE '%$first%'";
                }
                
 
                return  $this->list(mysqli_query($this->connection, $query));
            }

            
        }

        private function list($companies) {
            $companyList = [];

            while($row = mysqli_fetch_assoc($companies)) {
                $companyList[] = $row;
            }

            return json_encode($companyList);
        }
    }