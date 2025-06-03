<?php

    class home extends Controller{
        function index(){
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/index", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getAllProduct()]);
            
        }

        function catalog(){
            //load Modal
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/catalog", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getAllProduct()]);
            // echo $layout;
        }
        
        function category($id){
            //load Modal
            $layout = $this->view("layouts/application", ["page"=>"application/home/category", "id" => $id]);
            // echo $layout;
        }
        
        function search(){
            //load Modal
            if (isset($_POST['searchinput'])) {
                $product = $this->modal("ProductModal");
                $name = $_POST['searchinput'];
                $layout = $this->view("layouts/application", ["page"=>"application/home/search", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getProductWithName($name), "name" => $name]);
                // echo $layout;
            }
            else{
                echo '<script type="text/javascript">
        window.location.href = "http://localhost:8080/web222/ff"</script>';

            }
        }

        function product($id){
            //load modal with ID
            $product = $this->modal("ProductModal"); 
            $comment = $this->modal("CommentModal");
           // Lấy sản phẩm và comment
            $productData = $product->getProductWithID($id);
            $comments = $comment->getCommentsByProductId($id);
            $layout = $this->view("layouts/application", [
            "page" => "application/home/product",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "product" => $productData,
            "comments" => $comments,
            "commentModal" => $comment,
            "pid" => $id
             ]);
        }

        function contact(){
            $layout = $this->view("layouts/application", ["page"=>"application/home/contact", "header"=>"shared/header", "footer"=>"shared/footer"]);
            // echo $layout;
        }

        function cart(){
            $layout = $this->view("layouts/application", ["page"=>"application/home/cart", "header"=>"shared/header", "footer"=>"shared/footer"]);
            // echo $layout;
        }
        
        function account(){
            $user = $this->modal("userModal");
            $orderr = $this->modal("OrderModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/account", "header"=>"shared/header", "footer"=>"shared/footer", "userModal"=>$user, "oderModal"=>$orderr]);
            // echo $layout;
        }


        function cancel_order(){
            $orderr = $this->modal("OrderModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/cancel_order", "header"=>"shared/header", "footer"=>"shared/footer", "oderModal"=>$orderr]);

        }

        function process_cancel() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $orderId = $_POST['oid'];
                $reason = $_POST['reason'];
                
                $orderModel = $this->modal('OrderModal');
                $result = $orderModel->updateOrderStatus($orderId, 'cancelled');
                
                header('Content-Type: application/json');
                if ($result === true) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'error' => is_array($result) ? $result['error'] : 'Có lỗi xảy ra khi hủy đơn hàng'
                    ]);
                }
                exit;
            }
        }

        function payment(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy thông tin đơn hàng từ POST request
                $order = $this->modal("OrderModal");
                $orderID = $_POST['oid'];
                $userID = $_POST['uid'];
                $date = $_POST['date'];
                $totalPrice = $_POST['price'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $promotionCode = $_POST['promotion'];
                $note = $_POST['note'];

                // Kiểm tra và lấy promotion_id
                $promotionModel = $this->modal('PromotionModal');
                $promotionId = null;
                $discountedTotal = $totalPrice;
                $discountPercent = 0;
                $discountAmount = 0;

                if (!empty($promotionCode)) {
                    // Kiểm tra mã giảm giá có hợp lệ không
                    if ($promotionModel->checkPromotionValid($promotionCode)) {
                        $promotionResult = $promotionModel->getPromotionByCode($promotionCode);
                        if ($promotion = mysqli_fetch_assoc($promotionResult)) {
                            $promotionId = $promotion['promotion_id'];
                            $discountPercent = $promotion['discount_percent'];
                            $discountAmount = $promotion['discount_amount'];
                            
                            // Tính tổng tiền sau khi áp mã
                            if ($discountPercent > 0) {
                                $discountedTotal = $totalPrice * (1 - $discountPercent / 100);
                            }
                            if ($discountAmount > 0) {
                                $discountedTotal = max(0, $totalPrice - $discountAmount);
                            }
                        }
                    }
                }

                $layout = $this->view("layouts/application", ["page"=>"application/home/payment", "header"=>"shared/header", "footer"=>"shared/footer", "orderModal"=>$order]);
            }


            // echo $layout;
        }

        function success() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kiểm tra nếu request đến từ trang account
                if(isset($_POST['source']) && $_POST['source'] === 'account') {
                    $orderID = $_POST['oid'];
                    $orderModel = $this->modal('OrderModal');
                    
                    // Cập nhật trạng thái đơn hàng thành paid
                    $orderModel->updateOrderStatus($orderID, 'paid');
                    
                    // Load view success
                    $layout = $this->view("layouts/application", [
                        "page" => "application/home/success", 
                        "header" => "shared/header", 
                        "footer" => "shared/footer"
                    ]);
                    return;
                }

                // Lấy thông tin đơn hàng từ POST request
                $orderID = $_POST['oid'];
                $userID = $_POST['uid'];
                $date = $_POST['date'];
                $totalPrice = $_POST['price'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $promotionCode = $_POST['promotion'];
                $note = $_POST['note'];
                $status = 'pending';
                if ($_POST['payment_method'] != 'cod') {
                    $status = 'paid';
                }

                // Kiểm tra và lấy promotion_id
                $promotionModel = $this->modal('PromotionModal');
                $promotionId = null;
                $discountedTotal = $totalPrice;
                $discountPercent = 0;
                $discountAmount = 0;

                if (!empty($promotionCode)) {
                    // Kiểm tra mã giảm giá có hợp lệ không
                    if ($promotionModel->checkPromotionValid($promotionCode)) {
                        $promotionResult = $promotionModel->getPromotionByCode($promotionCode);
                        if ($promotion = mysqli_fetch_assoc($promotionResult)) {
                            $promotionId = $promotion['promotion_id'];
                            $discountPercent = $promotion['discount_percent'];
                            $discountAmount = $promotion['discount_amount'];
                            
                            // Tính tổng tiền sau khi áp mã
                            if ($discountPercent > 0) {
                                $discountedTotal = $totalPrice * (1 - $discountPercent / 100);
                            }
                            if ($discountAmount > 0) {
                                $discountedTotal = max(0, $totalPrice - $discountAmount);
                            }
                        }
                    }
                }

                // Insert vào bảng orders
                $orderModel = $this->modal('OrderModal');
                $orderData = [
                    'order_id' => $orderID,
                    'user_id' => $userID,
                    'order_date' => $date,
                    'total_price' => $discountedTotal, // Sử dụng giá sau khi áp mã
                    'phone' => $phone,
                    'address' => $address,
                    'promotion_id' => $promotionId,
                    'note' => $note,
                    'status' => $status
                ];
                
                $orderResult = $orderModel->insertOrder($orderData);

                if (is_array($orderResult) && !$orderResult['success']) {
                    echo "<div style='text-align: center; margin-top: 50px;'>";
                    echo "<h2 style='color: #ff0000;'>Có lỗi xảy ra khi tạo đơn hàng</h2>";
                    echo "<p>Chi tiết lỗi: " . $orderResult['error'] . "</p>";
                    echo "<p>Vui lòng kiểm tra lại thông tin và thử lại.</p>";
                    echo "<a href='http://localhost:8080/web222/home/cart' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #56B280; color: white; text-decoration: none; border-radius: 5px;'>Quay lại giỏ hàng</a>";
                    echo "</div>";
                    return;
                }

                if ($orderResult) {
                    // Lấy thông tin sản phẩm từ localStorage (được gửi qua POST)
                    if (!isset($_POST['products']) || empty($_POST['products'])) {
                        echo "<div style='text-align: center; margin-top: 50px;'>";
                        echo "<h2 style='color: #ff0000;'>Có lỗi xảy ra khi đặt hàng</h2>";
                        echo "<p>Không tìm thấy thông tin sản phẩm trong giỏ hàng.</p>";
                        echo "<a href='http://localhost:8080/web222/home/cart' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #56B280; color: white; text-decoration: none; border-radius: 5px;'>Quay lại giỏ hàng</a>";
                        echo "</div>";
                        return;
                    }

                    $products = json_decode($_POST['products'], true);
                    if (json_last_error() !== JSON_ERROR_NONE || !is_array($products)) {
                        echo "<div style='text-align: center; margin-top: 50px;'>";
                        echo "<h2 style='color: #ff0000;'>Có lỗi xảy ra khi đặt hàng</h2>";
                        echo "<p>Dữ liệu sản phẩm không hợp lệ.</p>";
                        echo "<a href='http://localhost:8080/web222/home/cart' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #56B280; color: white; text-decoration: none; border-radius: 5px;'>Quay lại giỏ hàng</a>";
                        echo "</div>";
                        return;
                    }
                    
                    // Insert vào bảng order_product
                    $orderProductModel = $this->modal('OrderModal');
                    $productInsertSuccess = true;
                    $errorMessage = "";

                    foreach ($products as $product) {
                        if (!isset($product['tag']) || !isset($product['quantity'])) {
                            $productInsertSuccess = false;
                            $errorMessage = "Dữ liệu sản phẩm không đầy đủ";
                            break;
                        }

                        $orderProductData = [
                            'order_id' => $orderID,
                            'product_id' => $product['tag'],
                            'quantity' => $product['quantity']
                        ];
                        $result = $orderProductModel->insertOrderProduct($orderProductData);
                        
                        if (is_array($result) && !$result['success']) {
                            $productInsertSuccess = false;
                            $errorMessage = "Lỗi khi thêm sản phẩm ID: " . $product['tag'] . "<br>Chi tiết: " . $result['error'];
                            break;
                        }
                    }

                    if ($productInsertSuccess) {
                        // Update product quantities in database
                        $productModel = $this->modal('ProductModal');
                        foreach ($products as $product) {
                            // Get current product quantity
                            $currentQuantity = $productModel->getProductQuantity($product['tag']);
                            if ($currentQuantity !== false) {
                                // Calculate new quantity
                                $newQuantity = $currentQuantity - $product['quantity'];
                                // Update product quantity
                                $productModel->updateProductQuantity($product['tag'], $newQuantity);
                                // Update sold quantity
                                $productModel->updateSoldQuantity($product['tag'], $product['quantity']);
                            }
                        }

                        // Load view success với thông tin giảm giá
                        $layout = $this->view("layouts/application", [
                            "page" => "application/home/success", 
                            "header" => "shared/header", 
                            "footer" => "shared/footer", 
                            "orderModal" => $orderModel,
                            "originalPrice" => $totalPrice,
                            "discountedTotal" => $discountedTotal,
                            "discountPercent" => $discountPercent,
                            "discountAmount" => $discountAmount
                        ]);
                    } else {
                        // Xóa đơn hàng đã tạo nếu thêm sản phẩm thất bại
                        $orderModel->deleteOrder($orderID);
                        echo "<div style='text-align: center; margin-top: 50px;'>";
                        echo "<h2 style='color: #ff0000;'>Có lỗi xảy ra khi đặt hàng</h2>";
                        echo "<p>Chi tiết lỗi: " . $errorMessage . "</p>";
                        echo "<p>Vui lòng thử lại sau hoặc liên hệ hỗ trợ.</p>";
                        echo "<a href='http://localhost:8080/web222/home/cart' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #56B280; color: white; text-decoration: none; border-radius: 5px;'>Quay lại giỏ hàng</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<div style='text-align: center; margin-top: 50px;'>";
                    echo "<h2 style='color: #ff0000;'>Có lỗi xảy ra khi tạo đơn hàng</h2>";
                    echo "<p>Vui lòng kiểm tra lại thông tin và thử lại.</p>";
                    echo "<a href='http://localhost:8080/web222/home/cart' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #56B280; color: white; text-decoration: none; border-radius: 5px;'>Quay lại giỏ hàng</a>";
                    echo "</div>";
                }
            } else {
                // Nếu không phải POST request, chuyển hướng về trang chủ
                header('Location: http://localhost:8080/web222/home/index');
            }
        }
        }

    
?>
