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

    static function upload($file_upload) {
        if (empty($file_upload)) {
            return array(
                'status' => false,
                'mes' => 'File không hợp lệ!'
            );
        }
        $year = date("Y");
        $month = date("m");
        $uploadPath = SERVER_ROOT . "public/img/upload/";
        $yearPath = $uploadPath . $year;
        $monthPath = $uploadPath . $year . "/" . $month;

        if (file_exists($yearPath)) {
            if (file_exists($monthPath) == false) {
                mkdir($monthPath, 0777, true);
            }
        } else {
            mkdir($yearPath, 0777, true);
        }
        $filePath = $year . "/" . $month . "/" . basename($file_upload["image"]["name"]);
        $target_file = $uploadPath . $filePath;
        $status = 1;
        $mes = '';
        $return = array();
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($file_upload["image"]["tmp_name"]);
        if (!$check) {
            $mes = "Yêu cầu gửi lên 1 định dạng ảnh";
            $status = 0;
        }
        // Check if file already exists
//        if (file_exists($target_file)) {
//            $mes = "Ảnh đã tồn tại";
//            $status = 0;
//        }
        // Check file size
        if ($file_upload["image"]["size"] > IMAGE_SIZE) {
            $mes = "File quá lớn(<5Mb)";
            $status = 0;
        }
        // Allow certain file formats

        $allowed = explode('|', IMAGE_FILE_TYPE);
        if (!in_array($imageFileType, $allowed)) {
            $mes = "Chỉ sử dụng định dạng JPG, JPEG, PNG & GIF.";
            $status = 0;
        }
        // Check if $status is set to 0 by an error
        if ($status != 0) {
            if (move_uploaded_file($file_upload["image"]["tmp_name"], $target_file)) {
                $mes = "" . basename($file_upload["image"]["name"]) . " tải lên thành công!.";
                chmod($target_file, 0777);
            } else {
                $mes = "Xảy ra lỗi trong quá trình upload file (phân quyền, sự cố mạng)";
            }
        }
        $return = array(
            'status' => $status,
            'mes' => $mes,
            'filePath' => $filePath
        );
        return $return;
    }

    static function redirect($link) {
        echo '<script>window.location.replace("' . $link . '");</script>';
    }

    static function changeFormatPost($arrAllField = array()) {
        $newArr = array();
        foreach ($arrAllField as $arrField) {
            $newArr[$arrField['name']] = $arrField['value'];
        }
        return $newArr;
    }

    static function getImageById($id,$size = '&h=150&w=300') {
        if (!$id) {
            return NO_IMAGE;
        }
        $sql = "SELECT image FROM media WHERE id=:id ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        if (!$result) {
            return NO_IMAGE;
        }
        return TIMTHUMB_LINK . $result . $size;;
    }

    static function showImage($url, $size = '&h=150&w=300') {
        if (!$url) {
            return NO_IMAGE;
        }
        return TIMTHUMB_LINK . $url . $size;
    }

//    static function addToCard($productId, $quantity = 1) {
//        $cart = Session::get('cart');
//        if ($cart) {
//            $product = Helper::checkId('product', 'id', $productId);
//            $cart[] = array(
//                'product' => $product,
//                'quantity' => $quantity
//            );
//            Session::set('cart', $cart);
//        }
//    }
    static function getProductById($id) {
        if (!$id) {
            return false;
        }
        $sql = "SELECT * FROM product P INNER JOIN media as M ON P.image_id=M.id WHERE id=:id ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }

}
