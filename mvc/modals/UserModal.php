<?php 
    class UserModal extends Database{
        public function getAllUser(){
            $qr = "SELECT * FROM user";
            return mysqli_query($this->con, $qr);
        }

        public function getUserWithID($id){
            $qr = "SELECT * FROM user WHERE user_id = $id";
            return mysqli_query($this->con, $qr);
        }
    }
?>