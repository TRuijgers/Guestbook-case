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
    <main>
        <section id="message-form">
            <h1>Gastenboek</h1>
            <form method="post" action="">
                <p>Laat hier je bericht achter.</p>
                <label for="firstName" >First Name</label>                
                <span class="error-empty"><?php if (isset($firstNameError)) echo $firstNameError;?></span>
                <input type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">

                <label for="lastName" >Last Name</label>                 
                <span class="error-empty"><?php if (isset($lastNameError)) echo $lastNameError;?></span>
                <input type="text" name="lastName" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">

                <label for="message" >Message</label>                
                <span class="error-empty"><?php if (isset($messageError)) echo $messageError;?></span>
                <textarea name="message" value="<?php if (isset($_POST['message'])) echo $_POST['message'];?>"></textarea>

                <input type="submit" name="submit">
            </form>
        </section>
        <section id="messages">
            <?php $m = Guestbook::getMessages();
                foreach ($m as $value) {
                    echo "<div>";
                    foreach ($value as $k=>$v){
                        if ($k != 'message'){
                            echo "<span>${v}</span>";
                        } else {
                            echo "<p>${v}</p>";
                        }
                    }
                    echo "</div>";
                }
            ?>
        </section>
    </main>
</body>
</html>