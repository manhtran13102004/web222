<?php 
    class CommentModal extends Database{
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
        }

    }

?>
