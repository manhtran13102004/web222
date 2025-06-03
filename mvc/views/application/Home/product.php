<?php

if (isset($_POST['submit'])) {
    $productId = $data['pid'];
    $name = $_POST['name'];
    $comment = $_POST['feedback'];
    
    // Kiểm tra session và lấy customer ID
    if (!isset($_SESSION['id'])) {
        echo '<script>alert("Vui lòng đăng nhập để đánh giá sản phẩm!")</script>';
        exit();
    }
    $customer = $_SESSION['id'];

    date_default_timezone_set("Asia/Bangkok");
    $datetime = date("Y-m-d H:i:s");

    if (empty($name) || empty($comment)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';
    } else {
        // Kiểm tra xem khách hàng đã đánh giá sản phẩm này chưa
        $commentModal = $data["commentModal"];
        $checkSql = "SELECT COUNT(*) as count FROM _comment WHERE product_id = ? AND customer_id = ?";
        $checkStmt = $commentModal->con->prepare($checkSql);
        $checkStmt->bind_param("ii", $productId, $customer);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "<script>alert('Bạn đã đánh giá sản phẩm này!');</script>";
        } else {
            $sql = "INSERT INTO _comment (product_id, customer_id, cmt_time, cmt) VALUES (?, ?, ?, ?)";
            $stmt = $commentModal->con->prepare($sql);
            $stmt->bind_param("iiss", $productId, $customer, $datetime, $comment);
            if ($stmt->execute()) {
                echo "<script>
                    alert('Thêm đánh giá thành công!');
                    setTimeout(function() {
                        window.location.href = window.location.href;
                    }, 100);
                </script>";
            } else {
                echo "<script>alert('Thêm đánh giá thất bại: " . addslashes($commentModal->con->error) . "');</script>";
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}
?>

<div class="page-wrapper">
    <?php
    require_once "./mvc/views/" . $data["header"] . ".php";
    ?>

    <main class="page-main">
        <?php
        while ($row = mysqli_fetch_assoc($data["product"])) {
            $productId = $row["product_id"];
        ?>

            <div class="section-first-screen">
                <div class="first-screen__bg hide-in-sd" style="background-color: rgba(86, 178, 128, 15%); height: 300px;">
                </div>
                <div class="first-screen__content hide-in-sd" style="height: 300px;">
                    <div class="uk-container" style="padding: 32px 0">
                        <div class="first-screen__box page-info">
                            <p style="color: #008848; font-size: 50px; text-align: center">
                                <?php
                                switch ($row['category_id']) {
                                    case 1:
                                        echo "Thực phẩm";
                                        break;
                                    case 2:
                                        echo "Nước ngọt";
                                        break;
                                    case 3:
                                        echo "Bánh kẹo";
                                        break;
                                    case 4:
                                        echo "Trái cây";
                                        break;
                                }
                                ?>
                            </p>
                            <!-- <div class="first-screen__breadcrumb">
                            <ul class="uk-breadcrumb">
                                <li><a href="http://localhost:8080/web222/home/index">Trang chủ</a></li>
                                <li> <a href="http://localhost:8080/web222/home/catalog">Sản phẩm</a></li>
                                <li> <span><?php echo $row["product_name"] ?></span></li>
                            </ul>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="uk-margin-large-top uk-container">
                    <div class="product-full-card">
                        <div class="uk-grid uk-grid-large uk-child-width-1-2@m uk-flex-middle" data-uk-grid>
                            <div>
                                <div class="product-full-card__gallery">
                                    <div class="product-full-card__gallery-box">
                                        <div class="uk-flex uk-flex-center uk-flex-middle">
                                            <div class="adjust-height" style="height: 500px;">
                                                <img src="../../../web222/public/assets/img/<?php echo $row["avatar"] ?>?t=123" id="product-picture" alt="<?php echo $row["avatar"] ?>?t=123" style="height: 100%; object-fit: cover; margin: 0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-full-card__content" style="background-color: rgb(245, 245, 250);">
                                    <div class="product-full-card__not-active">
                                        <div class="product-full-card__title">
                                            <?php echo $row["product_name"] ?>
                                            <li class="uk-text-meta">Còn lại <?php echo $row["quantity"] ?></li>
                                            <!-- <ul class="uk-subnav uk-subnav-divider"> -->
                                            <!-- </ul> -->
                                        </div>
                                        <div class="product-full-card__price">
                                            <span class="value" id="price-value" style="font-size:30px">
                                                <?php echo number_format($row["price"]) ?>đ
                                            </span>
                                        </div>
                                        <!-- <div class="product-full-card__desc"><?php echo $row["intro"] ?></div> -->
                                    </div>
                                </div>
                                <div class="product-full-card__info">
                                    <span style="font-size:18px"><b>Danh mục sản phẩm:</b>
                                        <?php
                                        switch ($row['category_id']) {
                                            case 1:
                                                echo "Thực phẩm";
                                                break;
                                            case 2:
                                                echo "Nước ngọt";
                                                break;
                                            case 3:
                                                echo "Bánh kẹo";
                                                break;
                                            case 4:
                                                echo "Trái cây";
                                                break;
                                        }
                                        ?>
                                    </span>
                                    <p id="product-tag" style="display:none">
                                        <?php
                                        echo $row['product_id']
                                        ?>
                                    </p>
                                    <p id="product-quantity" style="display:none">
                                        <?php
                                        echo $row['quantity']
                                        ?>
                                    </p>
                                    <br>
                                    <span style="font-size:18px"><b>Tình trạng:</b> Còn hàng</span>

                                    <br><br>

                                    <div class="product-full-card__btns">
                                        <span style="font-size:18px;"><b>Số lượng:</b>
                                            <span class="counter" style="margin-left: 24px; height: 40px">
                                                <span class="minus">-</span>
                                                <input type="text" value="1" id="counter-value" />
                                                <span class="plus">+</span>
                                            </span>
                                        </span>
                                    </div>
                                    <br>
                                    <div class="product-full-card__btns">
                                        <a class="uk-button" href="#!" onclick="AddToCart()" style="height: 57px;">
                                            <!-- <script>console.log(document.getElementById("counter-value").value);</script> -->
                                            Thêm vào giỏ hàng
                                            <span data-uk-icon="cart"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-full-card__share"><span style="font-size: 18px"><b>Chia sẻ:</b></span>
                                    <ul>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="background-color: rgb(245, 245, 250)">
                            <i class="bi bi-clock"></i> Giao hàng nhanh đến 30 phút trong khu vực nội thành</li>
                            <br>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
                                <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                            </svg> Đổi trả ngay nếu sản phẩm không đảm bảo</li>
                        </div>
                        <div class="">
                            <div class="detail-description bg-green-op">
                                <h2>Mô tả sản phẩm</h2>
                                <?php echo $row["intro"] ?>
                            </div>

                            <div class="detail-description">
    <h2>Đánh giá sản phẩm</h2>
    
    <?php
    // Truy vấn danh sách comment từ database
    $productId = $data['pid']; // Lấy product_id từ dữ liệu
    $commentModal = $data["commentModal"];
    $sql = "SELECT cmt_time, cmt, customer_id FROM _comment WHERE product_id = ? ORDER BY cmt_time DESC";
    $stmt = $commentModal->con->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $comments = $stmt->get_result();

    if ($comments && $comments->num_rows > 0) {
    ?>
        <ul class="uk-comment-list">
            <?php
            while ($comment = $comments->fetch_assoc()) {
                // Lấy thông tin comment
                $comment_time = $comment['cmt_time'];
                $comment_text = $comment['cmt'];
                $customer_id = $comment['customer_id'];
                
                // Giả sử tên khách hàng dựa trên customer_id (thay bằng truy vấn nếu có bảng customer)
                $customer_name = "Khách hàng #" . $customer_id; // Thay bằng tên thật nếu có bảng customer
            ?>
                <li>
                    <article class="uk-comment">
                        <header class="uk-comment-header">
                            <div class="uk-grid-small uk-grid-divider" data-uk-grid>
                                <div class="uk-width-auto@s">
                                    <img class="uk-comment-avatar" src="../../../web222/public/assets/img/pages/home/fp1.png" alt="">
                                </div>
                                <div class="uk-width-expand@s">
                                    <div class="uk-flex uk-flex-middle uk-margin-small-bottom">
                                        <h4 class="uk-comment-title uk-margin-remove"><?php echo htmlspecialchars($customer_name); ?></h4>
                                        <span class="uk-text-meta uk-margin-small-left"><?php echo date("F j, Y", strtotime($comment_time)); ?></span>
                                    </div>
                                    <div class="uk-comment-body">
                                        <p><?php echo htmlspecialchars($comment_text); ?></p>
                                    </div>
                                </div>
                            </div>
                        </header>
                    </article>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    } else {
        echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
    }
    $stmt->close();
    ?>

<div class="block-form uk-margin-medium-top">
    <div class="section-title">
        <div class="uk-h2">Để lại đánh giá của bạn</div>
    </div>
    <div class="section-content">
        <form id="comment-form" method="POST">
            <input type="hidden" name="pid" value="<?php echo $data['pid']; ?>">
            <div class="uk-grid uk-grid-small uk-child-width-1-2@s" data-uk-grid>
                <div><input class="uk-input uk-form-large" type="text" name="name" placeholder="Tên *" required></div>
                <div class="uk-width-1-1"><textarea class="uk-textarea uk-form-large" name="feedback" placeholder="Đánh giá *" required></textarea></div>
                <div><button class="uk-button uk-button-large" name="submit" type="submit">Gửi đánh giá</button></div>
            </div>
        </form>
    </div>
</div>

        <?php
        }
        ?>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

<script type="text/javascript">
    let selectedItem = {
        img_src: "",
        name: "",
        tag: "", //
        price: 0,
        quantity: 0
    }



    function AddToCart() {
        let productNumber = localStorage.getItem('productNumber');
        productNumber = parseInt(productNumber);

        selectedItem.name = document.getElementsByClassName('product-full-card__title')[0].innerHTML;
        selectedItem.price = parseFloat(document.getElementById('price-value').innerHTML.replace(/[^\d]/g, ''));
        selectedItem.quantity = parseInt(document.getElementById('counter-value').value);
        selectedItem.tag = JSON.parse(document.getElementById('product-tag').innerHTML);
        
        // Get available quantity from hidden input
        const availableQuantity = parseInt(document.getElementById('product-quantity').innerHTML);
        
        if (parseInt(document.getElementById('counter-value').value) < 1) {
            alert('Vui lòng thêm ít nhất 1 sản phẩm.');
            return;
        }
        
        // Check if requested quantity exceeds available quantity
        if (selectedItem.quantity > availableQuantity) {
            alert('Cửa hàng không đủ số lượng sản phẩm');
            return;
        }
        img = document.getElementById("product-picture"); // img to data url
        var imgCanvas = document.createElement("canvas"),
            imgContext = imgCanvas.getContext("2d");
        imgCanvas.width = img.width;
        imgCanvas.height = img.height;
        imgContext.drawImage(img, 0, 0, img.width, img.height);

        var imgAsDataURL = imgCanvas.toDataURL("");

        selectedItem.img_src = imgAsDataURL; // store image to selectedItem

        let productItem = localStorage.getItem('productItem');


        productItem = JSON.parse(productItem);
        if (productItem != null) {
            if (productItem[selectedItem.tag] === undefined) {
                productItem = {
                    ...productItem,
                    [selectedItem.tag]: selectedItem
                }
                localStorage.setItem('productNumber', productNumber + 1);
            } else {
                productItem[selectedItem.tag].quantity += selectedItem.quantity;
            }
        } else {
            productItem = {
                [selectedItem.tag]: selectedItem
            };
            localStorage.setItem('productNumber', 1);
        }

        localStorage.setItem('productItem', JSON.stringify(productItem));

        // alert("Đã thêm vào giỏ hàng"); // Replace with custom modal
        showAddToCartSuccessModal();
    }

    // New function to show the custom success modal
    function showAddToCartSuccessModal() {
        UIkit.modal('#add-to-cart-modal').show();
    }

    // New function to navigate to the cart page
    function goToCart() {
        window.location.href = 'http://localhost:8080/web222/home/cart';
    }

    /*=================CART PAGE ================*/
    function MinusBtn(tag) {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        productItem[tag].quantity--;
        localStorage.setItem('productItem', JSON.stringify(productItem));
        if (productItem[tag].quantity === 0) {
            CloseBtn(tag);
        } else DisplayCart();
    }

    function PlusBtn(tag) {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        productItem[tag].quantity++;
        localStorage.setItem('productItem', JSON.stringify(productItem));
        DisplayCart();
    }

    function CloseBtn(tag) {
        let product_name = document.getElementsByClassName('product__' + tag)[0];
        product_name.remove();

        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);

        delete productItem[tag]; // delete item

        localStorage.setItem('productItem', JSON.stringify(productItem));

        let productNumber = localStorage.getItem('productNumber'); // update total number of product
        productNumber = parseInt(productNumber);
        localStorage.setItem('productNumber', productNumber - 1);
        if (productNumber - 1 === 0) {
            console.log('x');
            ChangeUI();
        } else DisplayCart();
    }

    function DisplayCart() {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        let container = document.getElementsByClassName('page-cart__list')[0];
        let total = 0;

        Object.values(productItem).map(item => {
            let myProduct = document.getElementsByClassName('product__' + item.tag)[0];
            if (myProduct === undefined) {
                container.innerHTML += '' +
                    '<div class="product product__' + item.tag + '">' +
                    '<h5 class="product__title">' + '<img class="product__img" src="' + item.img_src + '">' + item
                    .name + '</h5>' +
                    '<h5 class="product__price">' + item.price + '</h5>' +
                    '<h5 class="product__quantity">' +
                    '<span class="counter" style = "font-style: normal;"><span class="minus" onclick="MinusBtn(\'' +
                    item.tag + '\')">-</span><input type="text" value="' + item.quantity +
                    '" /><span onclick="PlusBtn(\'' + item.tag + '\')" class="plus">+</span></span>' + '</h5>' +
                    '<h5 class="product__total">' + item.price * item.quantity + '<a onclick="CloseBtn(\'' + item
                    .tag +
                    '\')" class = "product__close"> <img src="https://img.icons8.com/ios-glyphs/30/ffffff/macos-close.png"/> </a>' +
                    '</h5>' +
                    '</div>';
            } else {
                let childrens = document.getElementsByClassName('product__' + item.tag)[0].childNodes;
                childrens[2].innerHTML =
                    '<span class="counter" style = "font-style: normal;"><span class="minus" onclick="MinusBtn(\'' +
                    item.tag + '\')">-</span><input type="text" value="' + item.quantity +
                    '" /><span onclick="PlusBtn(\'' + item.tag + '\')" class="plus">+</span></span>';
                childrens[3].innerHTML = item.price * item.quantity + '<a onclick="CloseBtn(\'' + item.tag +
                    '\')" class = "product__close"> <img src="https://img.icons8.com/ios-glyphs/30/ffffff/macos-close.png"/> </a>';
            }

            total += parseFloat(item.price * item.quantity);
        });

        var totalEle = document.getElementsByClassName('page-cart__title')[0];
        totalEle.innerHTML = 'Total:  ' + total;
    }

    function ChangeUI() {
        let productNumber = localStorage.getItem('productNumber');
        productNumber = parseInt(productNumber);

        if (productNumber > 0) {
            var btn = document.getElementById('page-cart__control-btn');
            btn.href = '<%= payment_index_path %>';
            btn.innerHTML = 'PAYMENT';
            document.getElementsByClassName('page-cart__img')[0].style.display = 'none';
            var total = document.getElementsByClassName('page-cart__title')[0];
            total.style.textAlign = 'right';
            total.style.marginRight = '50px';
            document.getElementsByClassName('page-cart__list')[0].style.display = 'block';
            DisplayCart();
        } else {
            var btn = document.getElementById('page-cart__control-btn');
            btn.href = '<%= pages_path %>';
            btn.innerHTML = 'RETURN TO SHOP';
            document.getElementsByClassName('page-cart__img')[0].style.display = 'block';
            var total = document.getElementsByClassName('page-cart__title')[0];
            total.innerHTML = 'Your cart is currently empty.';
            total.style.textAlign = 'center';
            total.style.marginRight = '0px';
            document.getElementsByClassName('page-cart__list')[0].style.display = 'none';
            var slotName = document.getElementsByClassName('slotname');
            slotName[0].style.display = 'none';
            slotName[1].style.display = 'none';
        }
    }

    ChangeUI();
</script>

<style>
    #banner {
        background-image: url('<?php echo $background; ?>');
    }
</style>

<!-- UIkit Modal for Add to Cart Success -->
<div id="add-to-cart-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Thông báo</h2>
        <p>Đã thêm vào giỏ hàng</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">OK</button>
            <button class="uk-button uk-button-primary" type="button" onclick="goToCart()">Đi đến giỏ hàng</button>
        </p>
    </div>
</div>

</body>
</html>
