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


        </main>
    <?php 
      require_once "./mvc/views/".$data["footer"].".php";
    ?>
  </div>

