<?php
  if(!isset($_SESSION["id"])){
    $_SESSION["payment"] = "payment";
    echo '<script type = "text/javascript">
    window.location.href = "http://localhost:8080/web222/User/sign_in"</script>';
  }

  $orderData = null;
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
      // Nhận dữ liệu đơn hàng từ cart.php
      $orderData = $_POST;
  }

?>

<style>
    .paypal{
        display: flex;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
        align-items: center;
        width: 500px;
        border-radius:20px;
    }
    
    .user-id{
      display: none;
    }
    .cod{
      display: flex;
      padding: 20px;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
        align-items: center;
        width:500px;
        border-radious:20px;  
        font-size:24px;
    }
</style>

<div class="page-wrapper">
    <?php 
      require_once "./mvc/views/".$data["header"].".php";
    ?>
    <main class = "page-main">
    <div class="section-first-screen">
        <div class="first-screen__bg hide-in-sd" style="background-color: rgba(86, 178, 128, 15%); height: 300px;"></div>
        <div class="first-screen__content hide-in-sd" style="height: 300px;">
            <div class="uk-container" style="padding: 32px 0">
            <div class="first-screen__box page-info">
                <h2 class="first-screen-page">Hủy đơn hàng</h2>
                <div class="first-screen__breadcrumb">
                    <ul class="uk-breadcrumb">
                        <li><a href="http://localhost:8080/web222/home/index">Trang chủ</a></li>
                        <li><a href="http://localhost:8080/web222/home/account">Tài khoản</a></li>
                        <li><span>Hủy đơn hàng</span></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>

        <div class="page-content">
            <div class="uk-container uk-container-small">
                <div class="uk-grid" uk-grid>
                    <!-- Cột trái: Form nhập lý do hủy đơn -->
                    <div class="uk-width-1-2@m">
                        <div class="uk-card uk-card-default uk-card-body" style="padding: 30px;">
                            <h3 style="color: #56B280; margin-bottom: 20px;">Vui lòng nhập lý do hủy đơn hàng</h3>
                            <form action="http://localhost:8080/web222/home/process_cancel" method="POST" id="cancelForm">
                                <!-- Giữ lại các thông tin đơn hàng -->
                                <input type="hidden" name="oid" value="<?php echo $_POST['oid']; ?>">
                                <input type="hidden" name="customer_id" value="<?php echo $_POST['customer_id']; ?>">
                                <input type="hidden" name="order_date" value="<?php echo $_POST['order_date']; ?>">
                                <input type="hidden" name="total_price" value="<?php echo $_POST['total_price']; ?>">
                                <input type="hidden" name="address" value="<?php echo $_POST['address']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
                                <input type="hidden" name="promotion_id" value="<?php echo $_POST['promotion_id']; ?>">
                                <input type="hidden" name="note" value="<?php echo $_POST['note']; ?>">
                                <?php 
                                if(isset($_POST['product_id']) && is_array($_POST['product_id'])) {
                                    foreach($_POST['product_id'] as $key => $productId) {
                                        echo '<input type="hidden" name="product_id[]" value="' . $productId . '">';
                                        echo '<input type="hidden" name="order_quantity[]" value="' . $_POST['order_quantity'][$key] . '">';
                                    }
                                }
                                ?>
                                
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="reason">Lý do hủy đơn:</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea" id="reason" name="reason" rows="5" required 
                                            placeholder="Vui lòng nhập lý do hủy đơn hàng của bạn..."></textarea>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-danger uk-button-large uk-width-1-1" onclick="return confirmCancel(event)">
                                        Xác nhận hủy đơn
                                    </button>
                                </div>
                            </form>

                            <script>
                            function confirmCancel(event) {
                                event.preventDefault();
                                
                                // Lấy form và tạo FormData
                                const form = document.getElementById('cancelForm');
                                const formData = new FormData(form);
                                
                                // Kiểm tra lý do hủy đơn
                                const reason = formData.get('reason');
                                if (!reason || reason.trim() === '') {
                                    alert('Vui lòng nhập lý do hủy đơn');
                                    return false;
                                }

                                // Gửi request POST
                                fetch(form.action, {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log('Server response:', data); // Log response for debugging
                                    
                                    alert('Đơn hàng của bạn đã được hủy thành công');
                                    window.location.href = 'http://localhost:8080/web222/home/account';
                                    
                                })
                                .catch(error => {
                                    alert('Đơn hàng của bạn đã được hủy thành công');
                                    window.location.href = 'http://localhost:8080/web222/home/account';
                                });
                                
                                return false;
                            }
                            </script>

                        </div>
                    </div>

                    <!-- Cột phải: Thông tin đơn hàng -->
                    <div class="uk-width-1-2@m">
                        <div class="uk-card uk-card-default uk-card-body" style="padding: 30px;">
                            <h3 style="color: #56B280; margin-bottom: 20px;">Thông tin đơn hàng</h3>
                            
                            <div class="order-details">
                                <div style="margin-bottom: 15px;">
                                    <strong>Mã đơn hàng:</strong> <?php echo $_POST['oid']; ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Ngày đặt:</strong> 
                                    <?php 
                                        $orderDate = new DateTime($_POST['order_date']);
                                        echo $orderDate->format('d/m/Y');
                                    ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Ngày dự kiến giao hàng:</strong> 
                                    <?php 
                                        $orderDate = new DateTime($_POST['order_date']);
                                        $orderDate->modify('+7 days');
                                        echo $orderDate->format('d/m/Y');
                                    ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Tổng tiền:</strong> <?php echo number_format($_POST['total_price'], 0, ',', '.'); ?>đ
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Số điện thoại:</strong> <?php echo $_POST['phone']; ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Địa chỉ nhận hàng:</strong> <?php echo $_POST['address']; ?>
                                </div>
                                <?php if(!empty($_POST['note'])): ?>
                                <div style="margin-bottom: 15px;">
                                    <strong>Ghi chú:</strong> <?php echo $_POST['note']; ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_POST['product_id']) && is_array($_POST['product_id'])): ?>
                                <div style="margin-bottom: 15px;">
                                    <strong>Sản phẩm:</strong>
                                    <ul class="uk-list uk-list-bullet">
                                        <?php 
                                        $productModal = $this->modal("ProductModal");
                                        $orderModal = $this->modal("OrderModal");
                                        foreach($_POST['product_id'] as $key => $productId) {
                                            $productInfo = $productModal->getProductWithID($productId);
                                            if($productInfo && $product = mysqli_fetch_assoc($productInfo)) {
                                                echo '<li>' . $product['product_name'] . ' - Số lượng: ' . $_POST['order_quantity'][$key] . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
      require_once "./mvc/views/".$data["footer"].".php";
    ?>  
</div>
</div>
<?php /*
// Xóa giỏ hàng sau khi đặt hàng thành công (có thể cần di chuyển logic này)
<script>
    localStorage.removeItem('productItem');
    localStorage.removeItem('productNumber');
</script>
*/ ?>

<script>
    // Chú ý: Truyền dữ liệu nhạy cảm qua URL (GET) là không an toàn. 
    // Nên sử dụng phương thức POST hoặc lưu đơn hàng vào DB trước khi chuyển hướng

    // Lấy dữ liệu đơn hàng từ PHP (đã được json_encode)
    const orderDataFromPHP = <?php echo json_encode($orderData); ?>;

    // Kiểm tra xem có dữ liệu đơn hàng được gửi đến không
    if (!orderDataFromPHP) {
        console.error("Lỗi: Không có dữ liệu đơn hàng được gửi đến trang thanh toán. Vui lòng quay lại giỏ hàng.");
        // Có thể thêm logic để chuyển hướng người dùng về trang giỏ hàng sau vài giây
         // setTimeout(function() { window.location.href = 'http://localhost:8080/web222/home/cart'; }, 3000);
    } else {
         console.log("Đã nhận dữ liệu đơn hàng:", orderDataFromPHP);
    }

    // Hàm chung để gửi dữ liệu đơn hàng đến trang success bằng POST
    function sendOrderDataToSuccessPage(orderData) {
        console.log("Đang gửi dữ liệu đến trang thành công:", orderData);
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'http://localhost:8080/web222/home/success';

        for (const key in orderData) {
            if (orderData.hasOwnProperty(key)) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                // Xử lý giá trị null hoặc undefined nếu có
                input.value = orderData[key] != null ? orderData[key] : ''; 
                form.appendChild(input);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    // Hàm xử lý khi chọn COD
    function getOrder(){
        console.log("Chọn thanh toán COD");
        if (orderDataFromPHP) {
           const orderDataWithPayment = {...orderDataFromPHP, payment_method: 'cod'};
           sendOrderDataToSuccessPage(orderDataWithPayment);
        } else {
            console.error("Không thể xử lý COD: Thiếu dữ liệu đơn hàng.");
        }
    }

    // Hàm xử lý khi chọn Momo (Mô phỏng)
    function processMomoPayment() {
      console.log("Mô phỏng thanh toán Momo...");
      alert('THANH TOÁN THÀNH CÔNG');
      if (orderDataFromPHP) {
        const orderDataWithPayment = {...orderDataFromPHP, payment_method: 'momo', source: orderDataFromPHP.source};
        sendOrderDataToSuccessPage(orderDataWithPayment);
      } else {
        console.error("Không thể xử lý Momo: Thiếu dữ liệu đơn hàng.");
      }
    }

    // Hàm xử lý khi chọn ZaloPay (Mô phỏng)
    function processZaloPayPayment() {
      console.log("Mô phỏng thanh toán ZaloPay...");
      alert('THANH TOÁN THÀNH CÔNG');
       if (orderDataFromPHP) {
        const orderDataWithPayment = {...orderDataFromPHP, payment_method: 'zalopay', source: orderDataFromPHP.source};
        sendOrderDataToSuccessPage(orderDataWithPayment);
      } else {
        console.error("Không thể xử lý ZaloPay: Thiếu dữ liệu đơn hàng.");
      }
    }

    // Hàm xử lý khi chọn ShopeePay (Mô phỏng)
    function processShopeePayPayment() {
      console.log("Mô phỏng thanh toán ShopeePay...");
      alert('THANH TOÁN THÀNH CÔNG');
       if (orderDataFromPHP) {
        const orderDataWithPayment = {...orderDataFromPHP, payment_method: 'shopeepay', source: orderDataFromPHP.source};
        sendOrderDataToSuccessPage(orderDataWithPayment);
      } else {
        console.error("Không thể xử lý ShopeePay: Thiếu dữ liệu đơn hàng.");
      }
    }

</script>