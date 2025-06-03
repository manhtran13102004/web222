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
        public function insertOrder($data) {
            $sql = "INSERT INTO orderr (order_id, customer_id, order_date, total_price, phone, address, promotion_id, note, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            try {
                $stmt = $this->con->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Lỗi prepare statement: " . $this->con->error);
                }
                
                $stmt->bind_param("iisisisss", 
                    $data['order_id'],
                    $data['user_id'],
                    $data['order_date'],
                    $data['total_price'],
                    $data['phone'],
                    $data['address'],
                    $data['promotion_id'],
                    $data['note'],
                    $data['status']
                );
                
                $result = $stmt->execute();
                if (!$result) {
                    throw new Exception("Lỗi execute: " . $stmt->error);
                }
                
                $stmt->close();
                return $result;
            } catch (Exception $e) {
                error_log("Lỗi insertOrder: " . $e->getMessage());
                return ["success" => false, "error" => $e->getMessage()];
            }
        }

        public function insertOrderProduct($data) {
            $sql = "INSERT INTO order_product (order_id, product_id, order_quantity) 
                    VALUES (?, ?, ?)";
            
            try {
                $stmt = $this->con->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Lỗi prepare statement: " . $this->con->error);
                }
                
                $stmt->bind_param("sii", 
                    $data['order_id'],
                    $data['product_id'],
                    $data['quantity']
                );
                
                $result = $stmt->execute();
                if (!$result) {
                    throw new Exception("Lỗi execute: " . $stmt->error);
                }
                
                $stmt->close();
                return $result;
            } catch (Exception $e) {
                error_log("Lỗi insertOrderProduct: " . $e->getMessage());
                return ["success" => false, "error" => $e->getMessage()];
            }
        }


        public function getOrderProducts($orderId) {
            $sql = "SELECT op.order_id, op.product_id, op.order_quantity, p.product_name
                    FROM order_product op 
                    JOIN product p ON op.product_id = p.product_id 
                    WHERE op.order_id = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result;
        }

        public function deleteOrder($orderId) {
            // Xóa các sản phẩm trong đơn hàng trước
            $sql1 = "DELETE FROM order_product WHERE order_id = ?";
            $stmt1 = $this->con->prepare($sql1);
            $stmt1->bind_param("s", $orderId);
            $stmt1->execute();
            $stmt1->close();

            // Sau đó xóa đơn hàng
            $sql2 = "DELETE FROM orderr WHERE order_id = ?";
            $stmt2 = $this->con->prepare($sql2);
            $stmt2->bind_param("s", $orderId);
            $result = $stmt2->execute();
            $stmt2->close();
            return $result;
        }

        public function getOrderHistoryByCustomerId($customerId) {
            // Truy vấn lấy thông tin đơn hàng
            $sql = "SELECT o.*, p.promotion_code
                    FROM orderr o 
                    LEFT JOIN promotion p ON o.promotion_id = p.promotion_id
                    WHERE o.customer_id = ?
                    ORDER BY o.order_date DESC";
            
            $stmt = $this->con->prepare($sql);
            if (!$stmt) {
                 error_log("Lỗi prepare statement getOrderHistoryByCustomerId (orders): " . $this->con->error);
                 return false;
            }
            $stmt->bind_param("i", $customerId);
            $stmt->execute();
            $ordersResult = $stmt->get_result();
            $stmt->close();

            $orderHistory = [];
            while ($order = $ordersResult->fetch_assoc()) {
                // Đối với mỗi đơn hàng, lấy danh sách sản phẩm chi tiết
                $orderId = $order['order_id'];
                $productsResult = $this->getOrderProducts($orderId); // Sử dụng hàm đã có
                
                $productsList = [];
                if ($productsResult && $productsResult->num_rows > 0) {
                    while ($product = $productsResult->fetch_assoc()) {
                        $productsList[] = $product;
                    }
                }
                
                // Thêm danh sách sản phẩm vào dữ liệu đơn hàng
                $order['products_list'] = $productsList;
                $orderHistory[] = $order;
            }
            
            return $orderHistory;
        }

        public function updateOrderStatus($orderId, $status) {
            // Validate status
            $validStatuses = ['pending', 'paid', 'cancelled'];
            if (!in_array($status, $validStatuses)) {
                error_log("Invalid status: " . $status);
                return [
                    'success' => false,
                    'error' => 'Invalid status value'
                ];
            }

            $sql = "UPDATE orderr SET status = ? WHERE order_id = ?";
            try {
                $stmt = $this->con->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Prepare statement failed: " . $this->con->error);
                }

                $stmt->bind_param("si", $status, $orderId);
                
                if (!$stmt->execute()) {
                    throw new Exception("Execute failed: " . $stmt->error);
                }

                $stmt->close();
                return true;
            } catch (Exception $e) {
                error_log("Error in updateOrderStatus: " . $e->getMessage());
                return [
                    'success' => false,
                    'error' => $e->getMessage()
                ];
            }
        }
    }

?>