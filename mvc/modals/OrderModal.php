<<<<<<< HEAD
<?php 
    class OrderModal extends Database{
        public function getAllOrder(){
            $qr = "SELECT * FROM orderr";
            return mysqli_query($this->con, $qr);
        }
        public function getOrderByID($id){
            $qr = "SELECT * FROM orderr WHERE order_id = $id";
            return mysqli_query($this->con, $qr);
        }
    }

=======
<?php
    class OrderModal extends Database{
        public function getAllOrder(){
            // Sắp xếp theo thời gian mới nhất lên đầu
            $qr = "SELECT * FROM orderr ORDER BY order_date DESC";
            return mysqli_query($this->con, $qr);
        }
        public function getOrderByID($id){
            // Lấy đúng order_id truyền vào
            $qr = "SELECT * FROM orderr WHERE order_id = '$id'";
            return mysqli_query($this->con, $qr);
        }
    }
>>>>>>> 69c3407 (nut dat hang)
?>