<?php 
    if(isset($data["id"])){
        $id = $data["id"];
        $sql = "DELETE FROM customer WHERE customer_id = $id";
        $sql2 = "DELETE FROM user WHERE user_id = $id";
        if(($data["CustomerModal"]->con)->query($sql) && ($data["UserModal"]->con)->query($sql2)){
            echo "<script type='text/javascript'>alert('xoa customer thanh cong');
            window.location.href = 'http://localhost:8080/web222/customer/index';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>alert('xoa customer that bai');
            window.location.href = 'http://localhost:8080/web222/customer/index';
            </script>";
        }
    }
?>