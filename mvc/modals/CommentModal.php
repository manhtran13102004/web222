<?php 
    class CommentModal extends Database{
        public function getAllComment(){
            $qr = "SELECT * FROM _comment";
            return mysqli_query($this->con, $qr);
        }
        public function getComment($pid, $cid){
            $qr = "SELECT * FROM _comment WHERE product_id = $pid AND customer_id = $cid";
            return mysqli_query($this->con,$qr);
        }

    }

?>