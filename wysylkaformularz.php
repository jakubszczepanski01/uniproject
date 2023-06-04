<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
    $email_odbiorcy = 'jakubszczepanski01@gmail.com';
    $header = 'Reply-To:<'.$_POST['email']."> \r\n";
    $header .= "MIME-VERSION: 1.0 \r\n";
    $header .= "Content-Type: text/html; charset = UTF-8";
    $wiadomosc = "<p> Dostałeś wiadomość od:</p>";
    $wiadomosc .="<p> Imie:". $_POST['imie']. "</p>";
    $wiadomosc .="<p> Email:". $_POST['email']. "</p>";
    $wiadomosc .="<p> Wiadomość:". $_POST['message']. "</p>";
    $message = '<!doctype html><html lang="pl"><head><meta charset="utf-8">'.$wiadomosc.'</head><body>';
    $subject = 'Wiadomość kontaktowa ze strony';
    $subject = '=?utf-8?b?'.base64_encode($subject).'?=';

        if(mail($email_odbiorcy, $subject, $message, $header))
        {
            
            die('Wiadomość została wysłana, powrót do strony głównej <a href="index.php">Kliknij tutaj</a>');
            
            

        }
        else
        {
            die('Wiadomość nie została wysłana');

        }

?>
