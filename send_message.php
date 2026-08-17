<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

include "includes/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // =========================
    // 1. SAVE MESSAGE TO DATABASE
    // =========================

    $sql = "INSERT INTO messages (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if (!mysqli_query($conn, $sql)) {

        die("Database Error: " . mysqli_error($conn));

    }


    // =========================
    // 2. SEND EMAIL NOTIFICATION
    // =========================

    $mail = new PHPMailer(true);

    try {

        // Gmail SMTP
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'contact.techelitesolutions@gmail.com';

        // PUT YOUR 16-CHARACTER APP PASSWORD HERE
        $mail->Password = 'lzrr syki sfso deuh';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;


        // Sender
        $mail->setFrom(
            'contact.techelitesolutions@gmail.com',
            'TechElite Solutions Website'
        );

        // Receiver
        $mail->addAddress(
            'contact.techelitesolutions@gmail.com'
        );


        // Reply directly to visitor
        $mail->addReplyTo(
            $email,
            $name
        );


        // Email content
        $mail->isHTML(true);

        $mail->Subject = 'New Contact Message: ' . $subject;

        $mail->Body = "
            <h2>New Contact Message</h2>

            <p><strong>Name:</strong> {$name}</p>

            <p><strong>Email:</strong> {$email}</p>

            <p><strong>Subject:</strong> {$subject}</p>

            <p><strong>Message:</strong></p>

            <p>{$message}</p>

            <hr>

            <p>
                <strong>TechElite Solutions</strong><br>
                Website Contact Form
            </p>
        ";

        $mail->AltBody =
            "New Contact Message\n\n" .
            "Name: {$name}\n" .
            "Email: {$email}\n" .
            "Subject: {$subject}\n\n" .
            "Message:\n{$message}";


        $mail->send();


        // =========================
        // 3. SUCCESS
        // =========================

        echo "<script>

            alert('Message sent successfully!');

            window.location='index.php#contact';

        </script>";


    } catch (Exception $e) {

        echo "
            <h2>Message saved successfully.</h2>

            <p>
                However, the email notification could not be sent.
            </p>

            <p>
                Please contact the administrator.
            </p>
        ";

    }

}

?>