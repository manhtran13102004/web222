<?php
require_once "./mvc/views/" . $data["header"] . ".php";
require_once "./mvc/modals/PromotionModal.php";

$promotionModel = new PromotionModal();
?>

<div class="page-wrapper">
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd" style="background-color: rgba(86, 178, 128, 15%); height: 300px;"></div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page">Đặt hàng thành công</h2>
                        <div class="first-screen__breadcrumb">
                            <ul class="uk-breadcrumb">
                                <li><a href="http://localhost:8080/web222/home/index">Trang chủ</a></li>
                                <li><a href="http://localhost:8080/web222/home/cart">Giỏ hàng</a></li>
                                <li>Đặt hàng thành công</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="uk-container uk-container-small">
                <div class="uk-margin-large-top">
                    <div class="uk-card uk-card-default uk-card-body" style="text-align: center; padding: 40px;">
                        <h3 style="color: #56B280; margin-bottom: 20px;">Cảm ơn bạn đã đặt hàng!</h3>
                        <p style="font-size: 18px; margin-bottom: 30px;">Đơn hàng của bạn đã được đặt thành công.</p>
                        
                        <div class="order-details" style="text-align: left; max-width: 600px; margin: 0 auto;">
                            <h4 style="color: #333; margin-bottom: 20px;">Thông tin đơn hàng:</h4>
                            <div style="margin-bottom: 15px;">
                                <strong>Mã đơn hàng:</strong> <?php echo $_POST['oid']; ?>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong>Phương thức thanh toán:</strong> 
                                <?php 
                                    $paymentMethod = strtolower($_POST['payment_method']);
                                    $paymentMethodDisplay = [
                                        'cod' => 'Thanh toán khi nhận hàng (COD)',
                                        'momo' => 'Ví MoMo',
                                        'zalopay' => 'Ví ZaloPay',
                                        'shopeepay' => 'Ví ShopeePay'
                                    ];
                                    echo isset($paymentMethodDisplay[$paymentMethod]) ? $paymentMethodDisplay[$paymentMethod] : $paymentMethod;
                                ?>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong>Trạng thái:</strong> 
                                <?php 
                                    if($paymentMethod === 'cod') {
                                        echo '<span style="color: #ff9800;">Thanh toán khi nhận hàng</span>';
                                    } else {
                                        echo '<span style="color: #4CAF50;">Đã thanh toán</span>';
                                    }
                                ?>
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

                        <div class="uk-margin-large-top">
                            <a href="http://localhost:8080/web222/home/catalog" class="uk-button uk-button-primary" style="background-color: #56B280; color: white; padding: 10px 30px; margin-right: 10px;">
                                Tiếp tục mua sắm
                            </a>
                            <a href="http://localhost:8080/web222/home/account" class="uk-button uk-button-default" style="border: 2px solid #56B280; color: #56B280; padding: 10px 30px;">
                                Theo dõi đơn hàng
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

<script>
    // Xóa giỏ hàng sau khi đặt hàng thành công
    localStorage.removeItem('productItem');
    localStorage.removeItem('productNumber');
</script>
