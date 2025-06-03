<?php
    if(!isset($_SESSION["id"])){
        $_SESSION["account"] = "account";
        echo '<script type = "text/javascript">
        window.location.href = "http://localhost:8080/web222/user/sign_in"</script>';
    }


    if (isset($_POST['submit'])) {
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $oldpwd = $_POST['oldpwd'];
        $newpwd = $_POST['newpwd'];

        if($_SESSION['password'] != $oldpwd){
            echo "<script>alert('Bạn đã nhập sai mật khẩu');</script>";
        }
        else if ($name == null && $email == null && $phone == null && $newpwd == null){
            echo "<script>alert('Vui lòng nhập thông tin cần thay đổi.');</script>";
        }
        else {
            $conn = $data["userModal"]->con;
            $check = true;
            if ($name != null) {
                if(!$conn->query("UPDATE user SET user_name=N'$name'WHERE user_id=N'$id'")) $check=false;
                if(!$conn->query("UPDATE customer SET customer_name=N'$name'WHERE customer_id=N'$id'")) $check=false;
            }
            if ($email != null) {
                if(!$conn->query("UPDATE user SET email=N'$email'WHERE user_id=N'$id'")) $check=false;
            }
            if ($phone != null) {
                if(!$conn->query("UPDATE user SET phone=N'$phone'WHERE user_id=N'$id'")) $check=false;
            }
            if ($newpwd != null) {
                if(!$conn->query("UPDATE user SET password=N'$newpwd'WHERE user_id=N'$id'")) $check=false;
            }

    
            if($check){
                echo "<script>alert('Cập nhật thông tin thành công.');</script>";       
                echo '<script type = "text/javascript">
                window.location.href = "http://localhost:8080/web222/user/log_out"</script>'; 
                
            }
        }
    }
?>

<style>
    .form_title {
        font-weight: bold;
        margin-right: 24px;
        font-size: 20px;
    }

</style>
<div class="page-wrapper">
    <?php 
      require_once "./mvc/views/".$data["header"].".php";
    ?>
<main class="page-main">
    <div class="section-first-screen">
        <div class="first-screen__bg hide-in-sd" style="background-color: rgba(86, 178, 128, 15%); height: 300px;"></div>
        <div class="first-screen__content hide-in-sd" style="height: 300px;">
            <div class="uk-container" style="padding: 32px 0">
            <div class="first-screen__box page-info">
                <h2 class="first-screen-page">Quản lý tài khoản</h2>
                <div class="first-screen__breadcrumb">
                    <ul class="uk-breadcrumb">
                        <li><a href="http://localhost:8080/web222/home/index">Trang chủ</a></li>
                        <li> <a href="http://localhost:8080/web222/home/account">Quản lý tài khoản</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>

        <div class="uk-container">
            <div class="row gx-4">
                <div class="col-md-6">
                    <div class="block-form uk-margin-medium-top">
                        <div class="section-title">
                          <div class="uk-h2">Chỉnh sửa thông tin cá nhân</div>
                        </div>
                        <div class="section-content">
                            <form action="" method='POST'>
                                <span><b class="form_title">User ID: </b> <?php echo $_SESSION['id']?></span>  <br><br>
                                <label class="form_title" for="name">Tên khách hàng:</label>
                                <div><input class="uk-input uk-form-large" name='name' type="text" id='name' placeholder="<?php echo $_SESSION['name']?>" ></div><br>
                                
                                <label class="form_title" for="email">Email:</label>
                                <div><input class="uk-input uk-form-large" name='email' type="email" placeholder="<?php echo $_SESSION['email']?>"></div><br>
                                
                                <label class="form_title" for="phone">Số điện thoại:</label>
                                <div><input class="uk-input uk-form-large" name='phone' type="number" placeholder="<?php echo $_SESSION['phone']?>"></div> <br>
      
                                <label class="form_title" for="phone">Nhập lại mật khẩu cũ:</label>
                                <div><input class="uk-input uk-form-large" name='oldpwd' type="password" required></div> <br>
      
                                <label class="form_title" for="phone">Mật khẩu mới:</label>
                                <div><input class="uk-input uk-form-large" name='newpwd' type="password" placeholder=""></div> <br>

                                </div>
                                <div><input class="uk-button uk-button-large" type="submit" name='submit' value="Lưu thay đổi"></div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Lịch sử đơn hàng -->
                </div><div class="uk-container">
                <div class="block-form uk-margin-medium-top">
                    <div class="section-title">
                        <div class="uk-h2">Lịch sử đơn hàng</div>
                    </div>
                    <div class="section-content">
                        <div class="uk-margin">
                            <?php
                            $orderModal = $this->modal("OrderModal");
                            $orderHistory = $orderModal->getOrderHistoryByCustomerId($_SESSION['id']);
                            
                            if(is_array($orderHistory) && !empty($orderHistory)) {
                                foreach($orderHistory as $order) {
                                    $orderDate = new DateTime($order['order_date']);
                                    $expectedDate = new DateTime($order['order_date']);
                                    $expectedDate->modify('+7 days');
                            ?>
                                <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <h4 class="uk-card-title">Đơn hàng #<?php echo $order['order_id']; ?></h4>
                                            <p class="uk-text-meta">Ngày đặt: <?php echo $orderDate->format('d/m/Y'); ?></p>
                                            <p class="uk-text-meta">Dự kiến giao: <?php echo $expectedDate->format('d/m/Y'); ?></p>
                                            <p><strong>Sản phẩm:</strong> 
                                                <?php if (!empty($order['products_list'])): ?>
                                                    <?php 
                                                        $productLinks = [];
                                                        foreach ($order['products_list'] as $product) {
                                                            $productLinks[] = '<a href="http://localhost:8080/web222/home/product/' . $product['product_id'] . '">' . htmlspecialchars($product['order_quantity']) . ' ' . htmlspecialchars($product['product_name']) . '</a>';
                                                        }
                                                        echo implode(', ', $productLinks);
                                                    ?>
                                                <?php else: ?>
                                                    Không có sản phẩm nào.
                                                <?php endif; ?>
                                            </p>
                                            <p><strong>Tổng tiền:</strong> <?php echo number_format($order['total_price'], 0, ',', '.'); ?>đ</p>
                                            <?php if($order['promotion_code']): ?>
                                                <p><strong>Mã giảm giá:</strong> <?php echo $order['promotion_code']; ?></p>
                                            <?php endif; ?>
                                            <p><strong>Trạng thái:</strong> 
                                                <?php 
                                                switch($order['status']) {
                                                    case 'pending':
                                                        echo '<span class="uk-label uk-label-warning">Thanh toán khi nhận hàng</span>';
                                                        ?>
                                                        <div class="uk-margin-small-top">
                                                            <form action="http://localhost:8080/web222/home/payment" method="POST" style="display: inline;">
                                                                <input type="hidden" name="oid" value="<?php echo $order['order_id']; ?>">
                                                                <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                                                                <input type="hidden" name="date" value="<?php echo $order['order_date']; ?>">
                                                                <input type="hidden" name="price" value="<?php echo $order['total_price']; ?>">
                                                                <input type="hidden" name="promotion" value="<?php echo $order['promotion_code']; ?>">
                                                                <input type="hidden" name="phone" value="<?php echo $order['phone']; ?>">
                                                                <input type="hidden" name="address" value="<?php echo $order['address']; ?>">
                                                                <input type="hidden" name="note" value="<?php echo $order['note']; ?>">
                                                                <input type="hidden" name="source" value="account">
                                                                <button type="submit" class="uk-button uk-button-primary uk-button-small">Thanh toán ngay</button>
                                                            </form>
                                                            <form action="http://localhost:8080/web222/home/cancel_order" method="POST" style="display: inline;">
                                                                <input type="hidden" name="oid" value="<?php echo $order['order_id']; ?>">
                                                                <input type="hidden" name="customer_id" value="<?php echo $_SESSION['id']; ?>">
                                                                <input type="hidden" name="order_date" value="<?php echo $order['order_date']; ?>">
                                                                <input type="hidden" name="total_price" value="<?php echo $order['total_price']; ?>">
                                                                <input type="hidden" name="address" value="<?php echo $order['address']; ?>">
                                                                <input type="hidden" name="phone" value="<?php echo $order['phone']; ?>">
                                                                <input type="hidden" name="promotion_id" value="<?php echo $order['promotion_id']; ?>">
                                                                <input type="hidden" name="note" value="<?php echo $order['note']; ?>">
                                                                <?php 
                                                                // Lấy thông tin sản phẩm từ order_product
                                                                $orderProducts = $orderModal->getOrderProducts($order['order_id']);
                                                                if($orderProducts) {
                                                                    foreach($orderProducts as $product) {
                                                                        echo '<input type="hidden" name="product_id[]" value="' . $product['product_id'] . '">';
                                                                        echo '<input type="hidden" name="order_quantity[]" value="' . $product['order_quantity'] . '">';
                                                                    }
                                                                }
                                                                ?>
                                                                <button type="submit" class="uk-button uk-button-danger uk-button-small">Hủy đơn</button>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        break;
                                                    case 'paid':
                                                        echo '<span class="uk-label uk-label-success">Đã thanh toán</span>';
                                                        break;
                                                    case 'cancelled':
                                                        echo '<span class="uk-label uk-label-danger">Đã hủy</span>';
                                                        break;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            } else {
                                echo '<p class="uk-text-muted">Bạn chưa có đơn hàng nào.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            
        
                  </div>


        </main>
    <?php 
      require_once "./mvc/views/".$data["footer"].".php";
    ?>
  </div>

