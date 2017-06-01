<?php

class Helper {

    /**
     * 
     * @param type $id
     * @param type $table
     */
    static function checkId($table, $field, $val) {
        if (!$val) {
            return false;
        }
        $sql = "SELECT {$field} FROM {$table} WHERE {$field}=:val ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindValue(":val", $val);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    static function sendMail($from, $subject, $content) {
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();
//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
// 1 = Thông báo lỗi ở client
// 2 = Thông báo lỗi cả client và lỗi ở server
        $mail->SMTPDebug = 0;

        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->Host = "smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port = 587; // cổng để gửi mail
        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
        $mail->SMTPAuth = true; //Xác thực SMTP
        $mail->Username = MAIL_USERNAME; // Tên đăng nhập tài khoản Gmail
        $mail->Password = MAIL_PASSWORD; //Mật khẩu của gmail
        $mail->SetFrom(MAIL_USERNAME, MAIL_NAME); // Thông tin người gửi
        $mail->AddReplyTo(MAIL_USERNAME, MAIL_NAME); // Ấn định email sẽ nhận khi người dùng reply lại.
        $mail->AddAddress($from); //Email của người nhận
        $mail->Subject = $subject; //Tiêu đề của thư
        $mail->MsgHTML($content); //Nội dung của bức thư.
// Gửi thư với tập tin html
//        $mail->AltBody = "This is a plain-text message body"; //Nội dung rút gọn hiển thị bên ngoài thư mục thư.
//        $mail->AddAttachment("images/attact-tui.gif"); //Tập tin cần attach
//Tiến hành gửi email và kiểm tra lỗi
        if (!$mail->Send()) {
//            echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
            return FALSE;
        }
        return true;
    }

    /**
     * 
     * @param type $action
     * @param type $param
     * @return type
     */
    static function getPermalink($action = '', $param = "") {
        if (IS_REWRITE) {
            $param = $param != "" ? '?' . $param : '';
            return SITE_ROOT . $action . $param;
        } else {
            $param = $param != "" ? '&' . $param : '';
            return SITE_ROOT . '?url=' . $action . $param;
        }
    }

}
