<?php
    class DatabaseConfig {
        function __construct($config) {
            $this->config = $config;
        }
        
        public function serverName() {
            return $this->config["serverName"];
        }

        public function userName() {
            return $this->config["userName"];
        }

        public function password() {
            return $this->config["password"];
        }

        public function database() {
            return $this->config["dbName"];
        }
    }
?>