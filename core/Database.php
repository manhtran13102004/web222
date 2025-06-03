<?php 
    class Database{
        public $con;
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "web222";

        function __construct(){
            $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }

        public function query($sql) {
            $result = mysqli_query($this->con, $sql);
            return new QueryResult($result);
        }
    }

    class QueryResult {
        private $result;

        public function __construct($result) {
            $this->result = $result;
        }

        public function fetch() {
            return mysqli_fetch_assoc($this->result);
        }

        public function fetchAll() {
            $data = array();
            while($row = mysqli_fetch_assoc($this->result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
?>