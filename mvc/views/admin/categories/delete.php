<?php 
if (isset($_SESSION["email"]) && $_SESSION["role"] == "customer") {
  echo '<script type = "text/javascript">
  window.location.href = "http://localhost:8080/web222/"</script>';
    }

    if(isset($data["id"])){
        $id = $data["id"];
        $sql = "DELETE FROM category WHERE category_id =$id";
        if(($data["categoryModal"]->con)->query($sql)){
            echo "<script type='text/javascript'>alert('xoa category thanh cong');
            window.location.href = 'http://localhost:8080/web222/Category/index';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>alert('xoa category that bai');
            window.location.href = 'http://localhost:8080/web222/Category/index';
            </script>";
        }
    }
?>