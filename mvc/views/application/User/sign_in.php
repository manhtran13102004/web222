<?php
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    echo '<script type = "text/javascript">
            window.location.href = "http://localhost:8080/web222/category/index"</script>';
}

if (isset($_SESSION["email"]) && $_SESSION["role"] == "customer") {
         echo '<script type = "text/javascript">
        window.location.href = "http://localhost:8080/web222/"</script>';
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = mysqli_query($data["userModal"]->con, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    $row = mysqli_fetch_array($select);
    if (is_array($row)) {
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["role"] = $row['role'];
        $_SESSION["id"] = $row['user_id'];
        $_SESSION["name"] = $row['user_name'];
        $_SESSION["phone"] = $row['phone'];

        if (isset($_SESSION["email"])) {
            if ($row['role'] == "admin") {
                echo '<script type = "text/javascript">
                window.location.href = "http://localhost:8080/web222/dashboard/index"</script>';
            }
            // elseif (isset($_SESSION["payment"])){
            //     unset($_SESSION["payment"]);
            //     echo '<script type = "text/javascript">
            //     window.location.href = "http://localhost:8080/web222/Home/payment/"</script>';
            // }
            else {
                echo '<script type = "text/javascript">
                window.location.href = "http://localhost:8080/web222/"</script>';
            }
        }
    } else {
        echo '<script type = "text/javascript">
            alert("Email hoặc mặt khẩu không đúng"); 
            window.location.href = "http://localhost:8080/web222/User/sign_in"</script>';
    }
}
?>
<style>
    body {
        height: 100vh;
        width: 100vw;
        background: center / cover no-repeat url("../../../web222/public/assets/img/background.png");
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Login Form */
    .modal-backdrop {
        display: none;
    }

    .signup-form {
        margin-bottom: 40px;
    }

    .signup-form,
    .login-form {
        width: 500px;
        box-shadow: 0px 0 30px 5px rgb(0 0 0 / 30%);
        padding: 12px 36px;
        border-radius: 4px;
        background-color: #fff;
    }

    .signup-form label,
    .login-form label {
        color: black;
        float: left;
    }

    .form-logo {
        /* padding: 0 200px; */
        height: 50px;
        width: 270px;
        margin: 84px auto;
    }

    .form-logo img {
        width: 100%;
    }

    .form-style {
        margin: -96px 25px 24px 10px;
    }



    .form-style .login-btn {
        background-color: #56B280;
        color: white;
        width: 100%;
    }


    .form-style input {
        width: 100%;
        height: 45px;
        margin-bottom: 8px;
    }

    .form-style button {
        margin-top: 12px;
    }


    .forgot {
        margin-top: 12px;
        text-align: right;
    }

    .forgotPass {
        background: none;
        border: none;
        text-decoration: underline;
        color: #56B280;
    }



    .google-btn {
        background-color: white;
        width: 100%;
        color: black;
        box-shadow: 0px 0px 2px rgb(0 0 0 / 25%);
        height: 45px;
        padding: 4px 32px;
    }

    .google-btn img {
        padding-bottom: 1px;
        width: 9%;
    }

    .google-btn span {
        line-height: 37px;
    }

    .google-btn .img-container {
        width: 50px;
        margin: 0;
    }

    .forgotPass {
        margin-top: 12px;
    }

    .forgotPass:hover {
        color: #56B280;
    }
</style>
<!-- Page Content -->
<div class="login-form">
    <form method="post" name="login" class="form-style">
        <div class="form-logo">
            <a href="http://localhost:8080/web222/home/index">
                <img src="../../../web222/public/assets/img/Logo.png" alt="logo">
            </a>

        </div>
        <label for="email"><b>Email</b></label> <br>
        <input type="email" name="email" placeholder="Nhập Email" id="email" class="form-control" required> <br>

        <label for="password"><b>Mật khẩu</b></label> <br>
        <input type="password" name="password" placeholder="Nhập mật khẩu" id="password" class="form-control" required> <br>

        <input type="submit" name="submit" value="Đăng nhập" class="btn login-btn btn-bg">

        <div class="forgot">
            <a href="http://localhost:8080/web222/user/sign_up" class="forgotPass" style="float: left;">
                Đăng ký
            </a>

            <button class="forgotPass" onclick="alert('Mật khẩu mới đã được gửi vào email của bạn!');">
                Quên mật khẩu
            </button>
        </div>
    </form>
</div>