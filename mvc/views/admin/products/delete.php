<?php 
    if(isset($data["id"])){
        $id = $data["id"];
        $sql = "DELETE FROM product WHERE product_id =$id";
        if(($data["productModal"]->con)->query($sql)){
            echo "<script type='text/javascript'>alert('xoa product thanh cong');
            window.location.href = 'http://localhost:8080/web222/Product/index';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>alert('xoa product that bai');
            window.location.href = 'http://localhost:8080/web222/Product/index';
            </script>";
        }
    }
?>