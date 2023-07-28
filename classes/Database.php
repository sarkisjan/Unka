<?php

    class Database {
        private $servername;
        private $username;
        private $password;
        private $dbname;
        protected $tbname;

        protected function connect() {
            $this->servername = "localhost";
            $this->username ="root";
            $this->password = "";
            $this->dbname = "appoitments";
            $this->tbname = "appoitmenttable";

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            return $conn;
        }
    }
?>