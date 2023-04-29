<?php
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    require_once '../phpmailer/PHPMailerAutoload.php';
    require_once '../phpmailer/setting.php';
    $mail=new PHPmailer;
    try{
        $mail->CharSet='UTF-8';
        $mail->Encoding = 'base64';
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->Port = SMTP_PORT;
        $mail->SMTPAuth = 'true';
        $mail->SMTPSecure=MAIL_ENCRYPT;
        $mail->Username=USER_NAME;
        $mail->Password=MAIL_PASSWORD;
    
        $mail->setFrom(EMAIL_FROM,EMAIL_FROM_NAME);
        $mail->addAddress($email);
        
        $mail->isHTML(false);
        $mail->Subject = mb_encode_mimeheader('(自動回复/大土町)非常感謝您的詢盤');
        $body=  '你好！'.PHP_EOL.PHP_EOL.
                '非常感謝您的詢盤。確認後我們會回覆您,請稍後。'.PHP_EOL.PHP_EOL.
                '查詢詳情'.PHP_EOL.
                '名稱: '.$lastname.' '.$firstname.PHP_EOL.
                '電子郵件: '.$email.PHP_EOL.
                '内容: '.PHP_EOL
                .$message.PHP_EOL.PHP_EOL.
                '在此提醒您，請勿以本郵件直接回覆，我們將不會收到您所留下的任何訊息。'.PHP_EOL.
                '若有其他問題，請來信至'.PHP_EOL.
                'ozuchicamp@gmail.com'.PHP_EOL.
                '與我們聯絡。'.PHP_EOL.PHP_EOL.
                '山中温泉大土町'.PHP_EOL.
                'E-mail: ozuchicamp@gmail.com';

        $mail->Body = $body;
        $mail->send();

        $mail->clearAllRecipients();
        $mail->addAddress(ADMIN_EMAIL);
        $mail->Subject=mb_encode_mimeheader('問合せを受け付けました。/大土町ホームページ');
        $body= '大土ホームページ（中）にて下記問い合わせがありました。'.PHP_EOL.PHP_EOL.
                'お名前: '.$lastname.' '.$firstname.PHP_EOL.
                'Email: '.$email.PHP_EOL.
                '問合せ内容: '.PHP_EOL
                .$message;
        $mail->Body = $body;
        $mail->send();

        exit;
    }catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
