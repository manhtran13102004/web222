<?php 
    class CategoryModal extends Database{
        public function getAllCategory(){
            $qr = "SELECT * FROM category";
            return mysqli_query($this->con, $qr);
        }

        public function getCategoryWithID($id){
            $qr = "SELECT category_name FROM category WHERE category_id = $id";
            return mysqli_query($this->con, $qr);
        }

    }

?>