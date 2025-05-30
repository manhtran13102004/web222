<?php
<<<<<<< HEAD
    if (isset($data["oid"])){
        $oid = ($data["oid"]);
        $uid = ($data["uid"]);
        $date = ($data["date"]);
        $price = ($data["price"]);
        $name = ($data["name"]);
        $email = ($data["email"]);
        $phone = ($data["phone"]);
        $address = ($data["address"]);
        $conn=$data["orderModal"]->con;

        // lấy mảng 2 chiều chứa product_id và quantity của từng sản phẩm
        $query = "INSERT INTO orderr (order_id, customer_id, order_date, total_price, address, phone, email, name) VALUES (N'$oid', N'$uid', N'$date', N'$price', N'$address', N'$phone', N'$email', N'$name');";
        // thêm từng sản phẩm vào bảng order_product
        // foreach ($products as $product) {
        //     $query = "INSERT INTO order_product (order_id, product_id, quantity) VALUES (N'$oid', N'$product[id]', N'$product[quantity]');";
        //     $conn->query($query);
        // }
        if($conn->query($query)){
            echo "<script type='text/javascript'>alert('Đặt hàng thành công. Mã đơn hàng của quý khách là #".  $oid  . ". Cảm ơn quý khách rất nhiều.');
            localStorage.clear();
            window.location.href = 'http://localhost:8080/web222/';
          </script>";
        }
        else{
            echo $conn->error;
        }
    }

=======
if (isset($data["oid"])) {
    $oid = $data["oid"];
    $uid = $data["uid"];
    $date = $data["date"];
    $price = $data["price"];
    $name = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $address = $data["address"];

    $products = isset($data["products"]) ? $data["products"] : []; // kiểm tra an toàn
    $conn = $data["orderModal"]->con;

    $query = "INSERT INTO orderr (order_id, customer_id, order_date, total_price, address, phone, email, name)
              VALUES (N'$oid', N'$uid', N'$date', N'$price', N'$address', N'$phone', N'$email', N'$name');";

    if ($conn->query($query)) {
        foreach ($products as $product) {
            // Tự động lấy key đúng từ dữ liệu truyền vào
            $pid = $product["product_id"] ?? $product["id"] ?? null;
            $qty = $product["order_quantity"] ?? $product["quantity"] ?? 1;
            if ($pid !== null) {
                $conn->query("INSERT INTO order_product (order_id, product_id, order_quantity) VALUES (N'$oid', N'$pid', N'$qty');");
            }
        }

        echo "<script type='text/javascript'>
            alert('Đặt hàng thành công. Mã đơn hàng là $oid. Cảm ơn quý khách.');
            localStorage.clear();
            window.location.href = 'http://localhost:8080/web222/';
        </script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
>>>>>>> 69c3407 (nut dat hang)
?>
