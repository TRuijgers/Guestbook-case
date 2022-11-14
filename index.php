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
    <script src="./scripts/main.js" defer></script>
</head>


<body>
    <main>
        <section id="message-form">
            <h1>Gastenboek</h1>
            <form method="post" action="" class="form-group">
                <p>Laat hier je bericht achter.</p>
                <label for="firstName" class="form-label" >First Name</label>                
                <span class="error-empty"><?php if (isset($firstNameError)) echo $firstNameError;?></span>
                <input type="text" name="firstName" 
                    class="form-control"
                    value="<?php if (isset($_POST['firstName'])) {
                         echo $_POST['firstName'];} ?>">

                <label for="lastName" class="form-label" >Last Name</label>                 
                <span class="error-empty"><?php if (isset($lastNameError)) echo $lastNameError;?></span>
                <input type="text" name="lastName" 
                    class="form-control"
                    value="<?php if (isset($_POST['lastName'])) {
                    echo $_POST['lastName']; }?>">

                <label for="message" class="form-label" >Message</label>                
                <span class="error-empty"><?php if (isset($messageError)) echo $messageError;?></span>
                <textarea name="message" class="form-control">
                    <?php if (isset($_POST['message'])) { 
                        echo $_POST['message']; }?>
                </textarea>

                <button name="submit" class="btn btn-primary" value="Submit">
                    submit
                </button>
            </form>
        </section>

        <section id="messages">
                <?php $messages = Guestbook::getMessages();
                foreach ($messages as $message) {
                    echo "<div>";
                    echo "<span>${message['firstName']}</span>";
                    echo "<span>${message['lastName']}</span>";
                    echo "<span>${message['postDate']}</span>";
                    echo "<button class=\"deleteMessage\">X</button>";
                    echo "<p>${message['message']}</p>"; 
                    echo "</div>";
                }
            ?>
        </section>
    </main>
</body>
</html>