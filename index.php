<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact formular</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>
        <label for="email">E-Mail: </label>
        <input type="email" name="email" id="email" required>
        <label for="message">Your message: </label>
        <textarea name="message" id="message" rows="5" required></textarea>
        <br><br>
        <button type="submit">Send message</button>
    </form>
    
    <?php 
        if(isset($_POST["submit"])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if(empty($name) || empty($email) || empty($message)) {
                echo "All fields are required!";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Bad email format!";
            } else {
                $to = "your.email@email.com";
                $subject = "New message from the contact form.";
                $body = "Name: $name\n Email: $email\n\n Message: \n$message";
                $headers = "From: $email";

                if(mail($to, $subject, $body, $headers)) {
                    echo "Message sent successfully!";
                } else {
                    echo "Error sending message.";
                }
            }
        }
    ?>

</body>
</html>