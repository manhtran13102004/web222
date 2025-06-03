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
    $name =  $_POST['name'];
    $phone =  $_POST['phone'];

    $key = "";
    for ($i = 0; $i < strlen($email); $i++) {
        if ($email[$i] ==  "@") {
            break;
        } else {
            $key .= (string)(ord($email[$i]) - 48);
        }
    }

    $id = (int)$key % 100000000;
    $user = "INSERT INTO user (user_id, user_name, email, phone, password, role) VALUES (N'$id', N'$name', N'$email',N'$phone', N'$password', 1 )";

    if (($data["userModal"]->con)->query($user)) {
        echo "<script type='text/javascript'>
            alert('Tạo tài khoản thành công!');
            window.location.href = 'http://localhost:8080/web222/user/sign_in';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Tạo tài khoản thất bại!');
            window.location.href = 'http://localhost:8080/web222/user/sign_in';
        </script>";
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
        margin: -96px auto 12px;
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

    .footer-wrapper {
        margin-top: 12px;
    }

</style>
<div class="signup-form">
    <form name="signup" class="form-style" method="POST" action="">
        <div class="form-logo">
            <a href="http://localhost:8080/web222/user/sign_in">
                <img src="../../../web222/public/assets/img/Logo.png" alt="logo">
            </a>
        </div>

        <label for="name"><b>Họ và tên</b></label> <br>
        <input type="text" name="name" placeholder="Nhập họ và tên" id="name" class="form-control" required> <br>

        <label for="email"><b>Email</b></label> <br>
        <input type="email" name="email" placeholder="Nhập Email" id="email" class="form-control" required><br>

        <label for="phone"><b>Số điện thoại</b></label> <br>
        <input type="tel" name="phone" placeholder="Nhập số điện thoại" id="phone" class="form-control" required> <br>

        <label for="psw"><b>Mật khẩu</b></label> <br>
        <input type="password" name="password" placeholder="Nhập mật khẩu" id="password" class="form-control" required> <br>

        <input type="submit" name="submit" value="Đăng ký tài khoản" class="btn login-btn btn-bg">

        <div class="footer-wrapper">
            <span>Đã có tài khoản?</span>
            <a href="http://localhost:8080/web222/user/sign_in" class="forgotPass">
                Đăng nhập
            </a>
        </div>
    </form>
</div>