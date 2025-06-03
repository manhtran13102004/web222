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
                <h2 class="first-screen-page">Thanh toán</h2>
                
                <div class="first-screen__breadcrumb">
                    <ul class="uk-breadcrumb">
                        <li><a href="http://localhost:8080/web222/home/index">Trang chủ</a></li>
                        <li> <a href="http://localhost:8080/web222/home/cart">Giỏ hàng</a></li>
                        <li> <a href="">Thanh toán</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
  
      <div class="user-id">
        <?php echo $_SESSION["id"];?>
      </div>
        <div class = "page-content">
            <div class="uk-container uk-container-small">
                <div class="uk-grid" uk-grid>
                    <!-- Cột trái: Phương thức thanh toán -->
                    <div class="uk-width-1-2@m">
                        <div class="uk-card uk-card-default uk-card-body" style="padding: 30px;">
                            <h3 style="color: #56B280; margin-bottom: 20px;">Chọn phương thức thanh toán</h3>
                            
                            <?php if(!isset($_POST['source']) || $_POST['source'] !== 'account'): ?>
                            <div class="uk-margin">
                                <a class="uk-button uk-button-primary uk-button-large uk-width-1-1" href="#" id="cod-payment" onclick="getOrder()" style="background-color: #56B280;">COD</a>
                            </div>

                            <p class="uk-text-center uk-margin">Hoặc thanh toán qua:</p>
                            <?php endif; ?>

                            <div class="uk-child-width-1-1 uk-grid-small" uk-grid>
                                <div>
                                    <a style="text-decoration: none; class="uk-card uk-card-default uk-card-body uk-card-small uk-text-left uk-width-1-1 payment-option" href="#" id="momo-payment" onclick="processMomoPayment()">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <!-- Placeholder for Momo Logo -->
                                                <img src="../../../web222/public/assets/img/Momo.png" alt="MoMo" style="height: 24px;">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h4 class="uk-card-title uk-margin-remove-bottom">Ví MoMo</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a style="text-decoration: none; class="uk-card uk-card-default uk-card-body uk-card-small uk-text-left uk-width-1-1 payment-option" href="#" id="zalopay-payment" onclick="processZaloPayPayment()">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <!-- Placeholder for ZaloPay Logo -->
                                                <img src="../../../web222/public/assets/img/ZaloPay.jpeg" alt="ZaloPay" style="height: 24px;">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h4 class="uk-card-title uk-margin-remove-bottom">Ví ZaloPay</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a style="text-decoration: none; class="uk-card uk-card-default uk-card-body uk-card-small uk-text-left uk-width-1-1 payment-option" href="#" id="shopeepay-payment" onclick="processShopeePayPayment()">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <!-- Placeholder for ShopeePay Logo -->
                                                <img src="../../../web222/public/assets/img/ShopeePay.png" alt="ShopeePay" style="height: 24px;">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h4 class="uk-card-title uk-margin-remove-bottom">Ví ShopeePay</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
                                        $orderDate = new DateTime($_POST['date']);
                                        echo $orderDate->format('d/m/Y');
                                    ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Ngày dự kiến giao hàng:</strong> 
                                    <?php 
                                        $orderDate = new DateTime($_POST['date']);
                                        $orderDate->modify('+7 days');
                                        echo $orderDate->format('d/m/Y');
                                    ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Tổng tiền:</strong> <?php echo number_format($_POST['price'], 0, ',', '.'); ?>đ
                                </div>
                                <?php 
                                if(!empty($_POST['promotion'])) {
                                    $promotionModel = new PromotionModal();
                                    $promotionResult = $promotionModel->getPromotionByCode($_POST['promotion']);
                                    if($promotion = mysqli_fetch_assoc($promotionResult)) {
                                        if($promotionModel->checkPromotionValid($_POST['promotion'])) {
                                            $discountInfo = $promotionModel->getPromotionDiscount($_POST['promotion']);
                                            $originalPrice = $_POST['price'];
                                            $discountedPrice = $originalPrice;
                                            
                                            // Tính giảm giá theo phần trăm
                                            if($discountInfo['discount_percent'] > 0) {
                                                $discountAmount = $originalPrice * ($discountInfo['discount_percent'] / 100);
                                                // Kiểm tra giới hạn giảm giá tối đa
                                                if($discountInfo['max_discount'] > 0) {
                                                    $discountAmount = min($discountAmount, $discountInfo['max_discount']);
                                                }
                                                $discountedPrice = $originalPrice - $discountAmount;
                                            }
                                            // Tính giảm giá theo số tiền cố định
                                            else if($discountInfo['discount_amount'] > 0) {
                                                $discountedPrice = $originalPrice - $discountInfo['discount_amount'];
                                            }
                                            
                                            // Đảm bảo giá không âm
                                            $discountedPrice = max(0, $discountedPrice);
                                ?>
                                <div style="margin-bottom: 15px;">
                                    <strong>Tổng tiền sau khi áp mã:</strong> 
                                    <span style="color: #56B280; font-weight: bold;">
                                        <?php echo number_format($discountedPrice, 0, ',', '.'); ?>đ
                                    </span>
                                    <?php if($discountInfo['discount_percent'] > 0): ?>
                                        <span style="color: #ff0000; margin-left: 10px;">
                                            (Giảm <?php echo $discountInfo['discount_percent']; ?>%)
                                        </span>
                                    <?php elseif($discountInfo['discount_amount'] > 0): ?>
                                        <span style="color: #ff0000; margin-left: 10px;">
                                            (Giảm <?php echo number_format($discountInfo['discount_amount'], 0, ',', '.'); ?>đ)
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php 
                                        }
                                    }
                                }
                                ?>
                                <div style="margin-bottom: 15px;">
                                    <strong>Số điện thoại:</strong> <?php echo $_POST['phone']; ?>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <strong>Địa chỉ nhận hàng:</strong> <?php echo $_POST['address']; ?>
                                </div>
                                <?php 
                                if(!empty($_POST['promotion'])) {
                                    $promotionModel = new PromotionModal();
                                    $promotionResult = $promotionModel->getPromotionByCode($_POST['promotion']);
                                    if($promotion = mysqli_fetch_assoc($promotionResult)) {
                                        if($promotionModel->checkPromotionValid($_POST['promotion'])) {
                                ?>
                                            <div style="margin-bottom: 15px;">
                                                <strong>Mã giảm giá:</strong> <?php echo $_POST['promotion']; ?>
                                                <span style="color: #56B280; margin-left: 10px;">(Đã áp dụng)</span>
                                            </div>
                                <?php 
                                        } else {
                                ?>
                                            <div style="margin-bottom: 15px;">
                                                <strong>Mã giảm giá:</strong> <?php echo $_POST['promotion']; ?>
                                                <span style="color: #ff0000; margin-left: 10px;">(Đã hết hiệu lực)</span>
                                            </div>
                                <?php 
                                        }
                                    } else {
                                ?>
                                        <div style="margin-bottom: 15px;">
                                            <strong>Mã giảm giá:</strong> <?php echo $_POST['promotion']; ?>
                                            <span style="color: #ff0000; margin-left: 10px;">(Không tồn tại)</span>
                                        </div>
                                <?php 
                                    }
                                }
                                ?>
                                <?php if(!empty($_POST['note'])): ?>
                                <div style="margin-bottom: 15px;">
                                    <strong>Ghi chú:</strong> <?php echo $_POST['note']; ?>
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