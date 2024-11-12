<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_post['name']);
    $email = htmlspecialchars($_post['email']);
    $message = htmlspecialchars($_post['message']);

    echo "<h3>terimakasih, $name!</h3>";
    echo "<p>Email, $email</p>";
    echo "<p>Pesan anda, $message</p>";
}
?>
