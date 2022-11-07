<?php
require_once('./guestbook/guestbook.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guestbook</title>
</head>
<body>
    <form method="post" action="">
        <p>Laat hier je bericht achter.</p>
        <input type="text" name="firstName">
        <input type="text" name="lastName">
        <input type="text" name="message">
        <input type="submit" name="submit">
    </form>

    <div>
        <?php echo getMessages(); ?>
    </div>
</body>
</html>