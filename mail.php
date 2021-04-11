<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        $mail_to = "thedon2200@gmail.com";

        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($message)) {
            http_response_code(400);
            echo '<p class="alert alert-warning">Please complete the form and try again.</p>';
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'];

           
            $content = "Имя: $name\n";
            $content .= "Почта: $email\n\n";
            $content .= "Телефон: $phone\n";
            $content .= "Сообщение:\n$message\n";

          
            $headers = "От: $name <$email>";

          
            $success = mail($mail_to, $subject, $content, $headers);
            if ($success) {
               
                http_response_code(200);
                echo '<p class="alert alert-success">Thank You! Your message has been sent.</p>';
            } else {
               
                http_response_code(500);
                echo '<p class="alert alert-warning">Oops! Something went wrong, we couldnt send your message.</p>';
            }
        

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
    }

?>
