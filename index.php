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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Gastenboek</h1>
        <p>Welkom op ons gastenboek</p>
    </header>
<main>
    <form method="post" action="">
        <p>Laat hier je bericht achter.</p>
        <label for="firstName" >First Name</label>
        <input type="text" name="firstName" 
            value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
        <label for="lastName" >Last Name</label>
        <input type="text" name="lastName" 
            value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
        <label for="message">Message</label>
        <textarea type="text" name="message" 
            value="<?php if (isset($_POST['message'])) echo $_POST['message'];?>"
            rows="20" columns="20" >
            
        </textarea>
        <input type="submit" name="submit">
    </form>

    <section id="messages">
        <?php $m = getMessages();
        foreach ($m as $value){
            echo "<div>";
            foreach ($value as $k=>$v){
                if ($k == 'message') {
                    echo "<p>" . $v . "</p>";
                } else {
                    echo "<span>" . $v . "</span>";
                }
            }
            echo "</div>";
        }
         ?>
    </section>
</main>
</body>
</html>