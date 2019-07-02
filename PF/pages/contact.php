<?php
if(isset($_POST['identite']) && isset($_POST['email']) && isset ($_POST['msg'])){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = $_POST["email"];
    $to = "remy.caraty@ynov.com";
    $subject = "Email depuis site perso";
    $message = $_POST["identite"].$_POST["msg"];
    $headers = "From:" . $from;
    if (mail($to,$subject,$message, $headers)) { 
        echo "Votre message a bien été envoyé!";
    }
} else {
    echo "Il manque un renseignement!"; 
}
?>