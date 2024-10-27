<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    if (isset($_POST["email"])) {
        $mail->SMTPDebug = 0;        
        $mail->isSMTP();            
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;     
        $mail->Username = 'soham1825@gmail.com';  
        $mail->Password = 'xgge adzh nfqb kywi';         
        $mail->SMTPSecure = 'tls';   
        $mail->Port = 587;           

        $mail->setFrom($_POST["email"], 'HAPPY BODY PLANS');
        $mail->addAddress('sohamwanganekar05@gmail.com'); 

        $mail->isHTML(true); 
        $mail->Subject = "HAPPY BODY PLANS";
        $mail->FromName = $_POST["name"];
        $mail->Body = $_POST["message"];

        $mail->send();
        echo "<script>alert('Mail sent Successfully..!');</script>";
    } 
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT PAGE</title>
    <link rel="stylesheet" href="./navigation/contact.css">
    <link rel="website icon" type="png" href="./images/oglogo.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
   
       
</head>

<body>
    <div class="contanier">
       
        <div id="logo"><img src="./images/whitelogo.png"></div>
        <a href="./main.php" class="hero"> ⇽ &nbsp; HOME </a>
        <h1>Ping Us Anytime...!</h1>
        <p>Send us your queries and inquiries, so we can better understand how to enhance your experience. <br> Your
            feedback drives us to discover new ways to serve you.</p>
    </div>
    <div class="map">
        <img src="./navigation/images/map.png">
    </div>
    <div class="dum">
        <h2>WE ARE OPEN FOR YOUR EVERY COMMENT</h2>
    </div>
    <div class="row">
        <div class="detail">
            <br>
            <br>
            <br><br><br>
            <h2>Shah & Anchor <br>
                Kutchhi Engineering College</h2>
            <p>Mahavir Education Trust's Chowk, Waman <br>
                Tukaram Patil Marg, Next to Dukes Co. <br>
                Chembur, Mumbai - 400 088.</p>
            <br>

            <b>Contact No.</b>  : 90761 8XXXX <br>
            <b>FaxNo.</b>  : 022-255XXXXX <br>
            <b>Email</b> : soham1825@gmail.com
        </div>
        <div class="frm">
    <form method="post" action="contact.php"> 
        <h3>GET IN TOUCH</h3>
        <input type="text" name="name" id="name" placeholder="Enter Your GoodName" required>
        <input type="email" name="email" id="email" placeholder="Enter your E-mail" required>
        <textarea name="message" id="message" rows="4" placeholder="Type Your Comment here...!"></textarea>
        <button type="submit">SEND</button>
    </form>
</div>

    </div>
    <section class="footer" id="about">
        <h4>ABOUT US</h4>
        <h3>Project Guide : Prof. Vaishali Chavan</h3>
        <h5>- Group Members -</h5>
    <div class="nm">
        <ul class="nm-link">
            <li>Soham Wanganekar</li>
            <li>Deeksha Upadhyay</li>
            <li>Tanish Shah</li>
            <li>Manthan Rathod</li>
        </ul>
    </div>
    <br>
    <br>
        <p>This Website is created Only for the Purpose of Project and Grades...!</p>
    </section>
    <script src="contact.js"></script>
</body>

</html>