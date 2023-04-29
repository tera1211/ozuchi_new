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
        $mail->Subject = '(Auto-reply)Thank you for contacting Ozuchi village';
        $body=  'Dear '.$firstname.PHP_EOL.PHP_EOL.
                'Thank you very much for contacting Ozuchi village.'.PHP_EOL.
                'We will get back to you soon.'.PHP_EOL.PHP_EOL.
                'Your inquiry detail'.PHP_EOL.
                'Name: '.$firstname.' '.$lastname.PHP_EOL.
                'E-mail: '.$email.PHP_EOL.
                'Message: '.PHP_EOL
                .$message.PHP_EOL.PHP_EOL. 
                'The sending address of this e-mail is only for sending purpose.'.PHP_EOL.
                'Please contact'.PHP_EOL.
                'ozuchicamp@gmail.com'.PHP_EOL.
                'for additional inquiries.'.PHP_EOL.PHP_EOL.
                'Thank you and best regards,'.PHP_EOL.
                'Ozuchi Village'.PHP_EOL.
                'E-mail: ozuchicamp@gmail.com';

        $mail->Body = $body;
        $mail->send();

        $mail->clearAllRecipients();
        $mail->addAddress(ADMIN_EMAIL);
        $mail->Subject=mb_encode_mimeheader('問合せを受け付けました。/大土町ホームページ');
        $body= '大土ホームページ（英）にて下記問い合わせがありました。'.PHP_EOL.PHP_EOL.
                'Name: '.$firstname.' '.$lastname.PHP_EOL.
                'E-mail: '.$email.PHP_EOL.
                'Message: '.PHP_EOL
                .$message;
        $mail->Body = $body;
        $mail->send();

        exit;
    }catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
