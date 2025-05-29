<?php 
    if (isset($_POST['submit'])) {
        if(isset($data["id"])){
            $id = $data["id"];
            $name = $_POST['name'];
            
            $sql = "UPDATE customer SET customer_name=N'$name' WHERE customer_id = N'$id'";
            $sql2 = "UPDATE user SET user_name=N'$name' WHERE user_id = N'$id'";
            if(($data["CustomerModal"]->con)->query($sql) && ($data["CustomerModal"]->con)->query($sql2)){
                echo "<script type='text/javascript'>alert('sua customer thanh cong');
                window.location.href = 'http://localhost:8080/web222/customer/index';
                </script>";
            }
            else{
                echo "<script type='text/javascript'>alert('sua customer that bai');
                window.location.href = 'http://localhost:8080/web222/customer/index';
                </script>";
            }
        }
    }
?>

<h1>Editing Customer</h1>
<div class="card">
    <div class="card-body">
        <form method="POST" action="">
            <div class="row form-group">
                <label for="name" class="col-sm-2 col-form-label input-label">Tên khách hàng</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Thay đổi tên khách hàng" required= "true">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" name="submit" value="Save changes" class="btn btn-primary">
            </div>
        </form>

    </div>
</div>
<a href="http://localhost:8080/web222/Customer/index">Back</a>
