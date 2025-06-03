<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'manhtran13102004@gmail.com'; // Thay bằng địa chỉ Gmail của bạn
        $mail->Password = 'xnpi fuze tkgt zeul'; // Thay bằng mật khẩu ứng dụng 16 ký tự
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('25A4041896@hvnh.edu.vn');
        $mail->addReplyTo($email, $name);

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Liên hệ từ website COOPFOOD: $subject";
        $mail->Body = "
            <h2>Bạn đã nhận được tin nhắn mới từ form liên hệ website COOPFOOD</h2>
            <p><strong>Họ tên:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Chủ đề:</strong> $subject</p>
            <p><strong>Nội dung tin nhắn:</strong></p>
            <p>$message</p>
        ";

        $mail->send();
        echo "<script>alert('Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại sau.');</script>";
    }
}
?>

<div class="page-wrapper">
    <?php 
      require_once "./mvc/views/".$data["header"].".php";
    ?>
<main class="page-main">
    <div class="section-first-screen">
        <div class="first-screen__content hide-in-sd" style="background-color: rgba(86, 178, 128, 15%);">
            <div class="uk-container py-4">
            <div class="first-screen__box page-info">
                <h2 class="first-screen-page text-center text-uppercase">Liên hệ</h2>
                <div class="row mt-5 justify-content-center">
                    <div class="col-8 col-md-3 mx-3 mb-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="p-5 rounded-circle lh-1 mb-4" style="background: rgba(86, 178, 128, 15%);">
                                <i class="bi bi-telephone-fill fs-1"></i>
                            </div>
                            <h3 class="mb-3 text-uppercase">Số điện thoại</h3>
                            <p class="text-break">0123456789</p>
                        </div>
                    </div>
                    <div class="col-8 col-md-3 mx-3 mb-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="p-5 rounded-circle lh-1 mb-4" style="background: rgba(86, 178, 128, 15%);">
                                <i class="bi bi-envelope-fill fs-1"></i>
                            </div>
                            <h3 class="mb-3 text-uppercase">Email</h3>
                            <p class="text-break">25A4041896@hvnh.edu.vn</p>
                        </div>
                    </div>
                    <div class="col-8 col-md-3 mx-3 mb-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="p-5 rounded-circle lh-1 mb-4" style="background: rgba(86, 178, 128, 15%);">
                                <i class="bi bi-geo-alt-fill fs-1"></i>
                            </div>
                            <h3 class="mb-3 text-uppercase">Địa chỉ</h3>
                            <p class="text-break">Đường ABC, Phường XYZ, Quận 123, TP.HCM</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            <div class="section-contacts-form">
                <div class="uk-section uk-container">
                    <div class="uk-grid justify-content-center" data-uk-grid>
                        <div class="uk-width-2-3@m">
                            <div class="section-title">
                                <h2 class="uk-h3 text-center fw-bold text-uppercase">Liên hệ nhanh với chúng tôi</h2>
                            </div>
                            <div class="section-content">
                                <form method="POST" action="">
                                    <div class="uk-grid uk-grid-medium uk-child-width-1-2@s" data-uk-grid>
                                        <div><input class="uk-input" type="text" name="name" placeholder="Họ và tên" required></div>
                                        <div><input class="uk-input" type="email" name="email" placeholder="Email" required></div>
                                        <div><input class="uk-input" type="tel" name="phone" placeholder="Số điện thoại" required></div>
                                        <div><input class="uk-input" type="text" name="subject" placeholder="Chủ đề" required></div>
                                        <div class="uk-width-1-1">
                                            <textarea class="uk-textarea" name="message" placeholder="Nội dung tin nhắn" required></textarea>
                                        </div>
                                        <div class="text-end" style="width: 100%;">
                                            <input class="uk-button" type="submit" value="Gửi tin nhắn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-map"> <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15673.343070416093!2d106.63211957096952!3d10.862046249563123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1637211851170!5m2!1svi!2s" width="600" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy"></iframe></div>
        </main>
    <?php 
      require_once "./mvc/views/".$data["footer"].".php";
    ?>
  </div>

