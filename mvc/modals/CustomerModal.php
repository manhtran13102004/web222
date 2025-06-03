<?php 
    class CustomerModal extends Database{
        public function getAllCustomer(){
            $qr = "SELECT * FROM customer";
            return mysqli_query($this->con, $qr);
        }
        public function getCustomer($cid){
            $qr = "SELECT * FROM customer WHERE customer_id = $cid" ;
            return mysqli_query($this->con, $qr);
        }
    }

?>