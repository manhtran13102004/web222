<?php
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

?>
