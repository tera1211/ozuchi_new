<?php
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    require_once 'phpmailer/PHPMailerAutoload.php';
    require_once 'phpmailer/setting.php';
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
        $mail->Subject = mb_encode_mimeheader('(自動返信)大土町へのお問合せありがとうございます。');
        $body=  $firstname.'　様'.PHP_EOL.PHP_EOL.
                '大土町へのお問合せありがとうございます。'.PHP_EOL.
                '確認の上お返事いたしますので、少々お待ちください。'.PHP_EOL.PHP_EOL.
                'お問合せ内容詳細'.PHP_EOL.
                'お名前: '.$firstname.PHP_EOL.
                'フリガナ: '.$lastname.PHP_EOL.
                'E-mail: '.$email.PHP_EOL.
                'メッセージ: '.PHP_EOL
                .$message.PHP_EOL.PHP_EOL.
                '尚、こちらのメールにご返信頂いても管理人には届きません。'.PHP_EOL.
                '追加でのご質問等ある場合は、'.PHP_EOL.
                'ozuchicamp@gmail.com'.PHP_EOL. 
                'までメールを頂きますようお願いいたします。'.PHP_EOL.PHP_EOL.
                '山中温泉大土町'.PHP_EOL.
                'E-mail: ozuchicamp@gmail.com';
        $mail->Body = $body;
        $mail->send();

        $mail->clearAllRecipients();
        $mail->addAddress(ADMIN_EMAIL);
        $mail->Subject=mb_encode_mimeheader('問合せを受け付けました。/大土町ホームページ');
        $body= 'お名前: '.$firstname.PHP_EOL.
                'フリガナ: '.$lastname.PHP_EOL.
                'E-mail: '.$email.PHP_EOL.
                'メッセージ: '.PHP_EOL
                .$message;
        $mail->Body = $body;
        $mail->send();

        exit;
    }catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
