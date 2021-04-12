<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$phone = $_POST["phone"];

$EmailTo = "emailaddress@test.com";
$Subject = "Новое сообщение с сайта";
 

$Body .= "Имя: ";
$Body .= $name;
$Body .= "\n";
 
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "Телефон: ";
$Body .= $phone;
$Body .= "\n";
 

$Body .= "Сообщение: ";
$Body .= $message;
$Body .= "\n";
 

$success = mail($EmailTo, $Subject, $Body, "From:".$email);
 

if ($success){
   echo "success";
}else{
    echo "invalid";
}
 
?>