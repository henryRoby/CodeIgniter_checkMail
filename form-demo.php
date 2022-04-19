<?php
$status = $statusMsg = '';

if(isset($_POST['submit'])){
    // include libbrairie file
    require_once 'VerifyEmail.class.php'; 

    // Initialize library class
    $mail = new VerifyEmail();

    // Set the timeout value on stream
    $mail->setStreamTimeoutWait(20);

    // Set debug output mode
    $mail->Debug= FALSE; 
    $mail->Debugoutput= 'html'; 

    // Set email address for SMTP request
    $mail->setEmailFrom('se20190023@gmail.com');

    // email to check
    $email = $_POST['email'];

    // check if mail is valid
    if($mail->check($email)){
        $status = 'success';
        $statusMsg = 'Given email &It;'.$email.'&gt; is exist!';
    }elseif(verifyEmail::validate($email)){ 
        $status = 'Erreur';
        $statusMsg = 'Given email &It;'.$email.'&gt; is valid, but not exist';
    }else{
        $status = 'Erreur';
        $statusMsg = 'Given email &It;'.$email.'&gt; is not valid and not exist';
    }
}else{
    $status = 'Erreur';
    $statusMsg = 'Enter the email address that to verify';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MailVerify</title>
</head>
<body>
    <p class="statusMsg <?php echo $status;?>"><?php echo $statusMsg; ?></p>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Entrer email" value="">
        <input type="submit" name="submit" value="verify">
    </form>
</body>
</html>