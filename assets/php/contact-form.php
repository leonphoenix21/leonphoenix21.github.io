<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'noelmutiadev@gmail.com'; // <-- Enter your E-Mail address here.
    $subject = $_POST['subject'];

    $body = "From: $name <br> E-Mail: $email <br> Message: <br> $message";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From:' . $email. "\r\n";
    $headers .= 'Cc:' . $email. "\r\n";

    if (!mail($to, "New Message from Website: $subject", $body, $headers)) {
        error_log("Mail failed: " . print_r(error_get_last(), true)); // Log error details
        echo json_encode(['status' => 'error', 'message' => 'Message could not be sent.']);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
    }
    
?>