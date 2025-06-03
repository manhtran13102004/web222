<?php 
    class ProductModal extends Database{
        public function getAllProduct(){
            $qr = "SELECT * FROM product";
            return mysqli_query($this->con, $qr);
        }

        public function getProductWithID($id){
            $qr = "SELECT * FROM product WHERE product_id = $id";
            return mysqli_query($this->con, $qr);
        }

        public function getProductWithName($name){
            $qr = "SELECT * FROM product WHERE product_name LIKE '%$name%'";
            return mysqli_query($this->con, $qr);
        }

        public function getProductPrice($id) {
            $qr = "SELECT price FROM product WHERE product_id = $id";
            $result = mysqli_query($this->con, $qr);
            $row = mysqli_fetch_assoc($result);
            return $row['price'];
        }

        public function getProductQuantity($id) {
            $qr = "SELECT quantity FROM product WHERE product_id = ?";
            $stmt = $this->con->prepare($qr);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                return $row['quantity'];
            }
            return false;
        }

        public function updateProductQuantity($id, $newQuantity) {
            $qr = "UPDATE product SET quantity = ? WHERE product_id = ?";
            $stmt = $this->con->prepare($qr);
            $stmt->bind_param("ii", $newQuantity, $id);
            return $stmt->execute();
        }

        public function updateSoldQuantity($id, $soldQuantity) {
            $qr = "UPDATE product SET sold_quantity = sold_quantity + ? WHERE product_id = ?";
            $stmt = $this->con->prepare($qr);
            $stmt->bind_param("ii", $soldQuantity, $id);
            return $stmt->execute();
        }
    }

?>