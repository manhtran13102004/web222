<?php 
    class PromotionModal extends Database{
        public function getAllPromotion(){
            $qr = "SELECT promotion_id, promotion_code, discount_percent, discount_amount, 
                          start_date, end_date, min_order_amount, max_discount, description, status 
                   FROM promotion";
            return mysqli_query($this->con, $qr);
        }

        public function getPromotionByID($id){
            $qr = "SELECT promotion_id, promotion_code, discount_percent, discount_amount, 
                          start_date, end_date, min_order_amount, max_discount, description, status 
                   FROM promotion WHERE promotion_id = $id";
            return mysqli_query($this->con, $qr);
        }

        public function getPromotionByCode($code){
            $qr = "SELECT promotion_id, promotion_code, discount_percent, discount_amount, 
                          start_date, end_date, min_order_amount, max_discount, description, status 
                   FROM promotion WHERE promotion_code = '$code'";
            return mysqli_query($this->con, $qr);
        }

        public function checkPromotionValid($code){
            $qr = "SELECT promotion_id FROM promotion 
                   WHERE promotion_code = '$code' 
                   AND status = 'active' 
                   AND start_date <= NOW() 
                   AND end_date >= NOW()";
            $result = mysqli_query($this->con, $qr);
            return mysqli_num_rows($result) > 0;
        }

        public function getPromotionDiscount($code){
            $qr = "SELECT discount_percent, discount_amount, min_order_amount, max_discount 
                   FROM promotion 
                   WHERE promotion_code = '$code' 
                   AND status = 'active' 
                   AND start_date <= NOW() 
                   AND end_date >= NOW()";
            $result = mysqli_query($this->con, $qr);
            if($row = mysqli_fetch_assoc($result)){
                return [
                    'discount_percent' => $row['discount_percent'],
                    'discount_amount' => $row['discount_amount'],
                    'min_order_amount' => $row['min_order_amount'],
                    'max_discount' => $row['max_discount']
                ];
            }
            return [
                'discount_percent' => 0,
                'discount_amount' => 0,
                'min_order_amount' => 0,
                'max_discount' => 0
            ];
        }
    }
?> 
<!-- CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_code` varchar(50) NOT NULL,
  `discount_percent` int(11) DEFAULT 0,
  `discount_amount` int(11) DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `min_order_amount` int(11) DEFAULT 0,
  `max_discount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`promotion_id`),
  UNIQUE KEY `promotion_code` (`promotion_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -->