<!--START HEADER TOPBAR AND NAVBAR -->
<?php 

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["banner_btn"]))
{
    if(empty($_POST["name"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
        $name = clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if(empty($_POST["email"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    if(empty($_POST["subject"]))
    {
        $error .= '<p><label class="text-danger">Subject is required</label></p>';
    }
    else
    {
        $subject = clean_text($_POST["subject"]);
    }
    if(empty($_POST["message"]))
    {
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
        $message = clean_text($_POST["message"]);
    }
    if($error == '')
    {
        require 'class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';                                //Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'test123test123test1234567@gmail.com';                    //Sets SMTP username
        $mail->Password = '###################';                  //Sets SMTP password
        $mail->SMTPSecure = 'ssl';                          //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = $_POST["email"];                  //Sets the From email address for the message
        $mail->FromName = "Getmegrades";               //Sets the From name of the message
        $mail->AddAddress($_POST["email"], $_POST["name"]);       //Adds a "To" address
        $mail->AddCC($_POST["email"], $_POST["name"]);  //Adds a "Cc" address
        $mail->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                            //Sets message type to HTML             
        $mail->Subject = $_POST["subject"];             //Sets the Subject of the message
        $mail->Body = $_POST["message"];                //An HTML or plain text message body
        if($mail->Send())                               //Send an Email. Return true on success or false on error
        {
            $error = '<label class="text-success">Thank you for contacting us</label>';
        }
        else
        {
            $error = '<label class="text-danger">There is an Error</label>';
        }
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}

include 'index.php';
?>
<!--END HEADER TOPBAR AND NAVBAR -->

</body>

</html>