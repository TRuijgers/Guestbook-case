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
        <label for="firstName" >First Name</label>
        <input type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
        <label for="lastName" >Last Name</label>
        <input type="text" name="lastName" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
        <label for="message" >Message</label>
        <input type="text" name="message" value="<?php if (isset($_POST['message'])) echo $_POST['message'];?>">
        <input type="submit" name="submit">
    </form>

    <div>
        <?php echo getMessages(); ?>
    </div>
</body>
</html>