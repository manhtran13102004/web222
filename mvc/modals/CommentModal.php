<?php 
    class CommentModal extends Database{
<<<<<<< HEAD
        public function getAllComment() {
            $qr = "SELECT * FROM _comment";
            return mysqli_query($this->con, $qr);
        }
    
        public function getComment($pid, $cid) {
            $qr = "SELECT * FROM _comment WHERE product_id = $pid AND customer_id = $cid";
            return mysqli_query($this->con, $qr);
        }
    
        // Phương thức để lấy tất cả comment của một sản phẩm
        public function getCommentsByProductId($pid) {
            $qr = "SELECT * FROM _comment WHERE product_id = ? ORDER BY cmt_time DESC";
            $stmt = $this->con->prepare($qr);
            $stmt->bind_param("i", $pid);
            $stmt->execute();
            return $stmt->get_result();
=======
        public function getAllComment(){
            $qr = "SELECT * FROM _comment";
            return mysqli_query($this->con, $qr);
        }
        public function getComment($pid, $cid){
            $qr = "SELECT * FROM _comment WHERE product_id = $pid AND customer_id = $cid";
            return mysqli_query($this->con,$qr);
>>>>>>> 69c3407 (nut dat hang)
        }

    }

<<<<<<< HEAD
?>
=======
?>
>>>>>>> 69c3407 (nut dat hang)
