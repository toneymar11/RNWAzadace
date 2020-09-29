<?php
    class DatabaseConnection {
        function __construct($databaseConfig) {
            $this->databaseConfig = $databaseConfig;
        }

        public function connection() {
            $serverName = $this->databaseConfig->serverName();
            $userName = $this->databaseConfig->userName();
            $password = $this->databaseConfig->password();
            $dbName = $this->databaseConfig->database();
            
            $connection = mysqli_connect($serverName, $userName, $password, $dbName);

            if(mysqli_connect_errno()) {
                die("Couldn't connect to database");
            }

           return $connection;
        }

    }


