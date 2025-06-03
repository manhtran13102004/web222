<?php 
    if(isset($data["id"])){
        $id = $data["id"];
        $sql = "DELETE FROM promotion WHERE promotion_id =$id";
        if(($data["promotionModal"]->con)->query($sql)){
            echo "<script type='text/javascript'>alert('xoa promotion thanh cong');
            window.location.href = 'http://localhost:8080/web222/Promotion/index';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>alert('xoa promotion that bai');
            window.location.href = 'http://localhost:8080/web222/Promotion/index';
            </script>";
        }
    }
?>