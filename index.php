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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./css/styles.css" rel="stylesheet">
    
    <script src="./scripts/main.js" defer></script>
</head>

<body>
<main>
    <h1>Gastenboek</h1>
    <section id="message-form">
        <form method="post" action="">
            <p>Laat hier je bericht achter.</p>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="firstName" >Voornaam</label>                
                    <span class="error-empty">
                        <?php if (isset($firstNameError)) echo $firstNameError;?>
                    </span>
                    <input class="form-control" type="text" name="firstName" 
                        value="<?php echo $_POST['firstName'] ?? ''; ?>" 
                        autofocus required>
                </div>
                <div class="col">
                    <label class="form-label" for="lastName" >Achternaam</label>                 
                    <span class="error-empty">
                        <?php if (isset($lastNameError)) echo $lastNameError;?>
                    </span>
                    <input class="form-control" type="text" name="lastName" 
                        value="<?php echo $_POST['lastName'] ?? ''; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label" for="message">Bericht</label>                
                    <span class="error-empty">
                        <?php if (isset($messageError)) echo $messageError;?>
                    </span>
                    <textarea id="message" class="form-control" rows="4" cols="34" name="message" required><?php echo $_POST['message'] ?? '';?></textarea>
                </div>
            
                <div class="col-auto">
                    <button class="btn btn-sm" type="button" 
                        id="emojiBoxBtn">
                        <span>&#128512;</span>
                    </button>
                    <div id="emojiBox">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Verzenden">
        </form>
    </section>
        
    <section id="messages">
        <section id="pagination" class="page navigation d-flex justify-content-center" >
            <ul class="pagination">
            <?php
                $limit = 10;
                $start = isset($_GET['page']) && $_GET['page'] > 1 ? 
                    $_GET['page'] * $limit - $limit : 1;
                $page = $_GET['page'] ?? 1;

                $totalPages = ceil(count(Guestbook::getMessages()) / $limit);
                if ($page > 1) {
                    echo '<li class="page-item" 
                        id="previous"><a class="page-link" 
                        href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span></a></li>';
                }
                for($i = 0; $i < $totalPages; $i++) {
                    $num = $i + 1;
                    echo '<li class="page-item">
                        <a class="page-link" href="' . "?page=${num}\">
                            ${num}</a></li>";
                }
                if ($page < $totalPages){
                    echo '<li class="page-item" 
                        id="next"><a class="page-link" 
                        href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span></a></li>';
                }
            ?>
            </ul>
        </section>
        <div>
        <?php $messages = Guestbook::getMessages();
            foreach (array_slice($messages, $start - 1, $limit) as $message) {
                $message['message'] = html_entity_decode($message['message']);
                echo '<div><button class="deleteMessage">X</button><p>' .
                    "<span>${message['firstName']}</span>
                    <span>${message['lastName']}</span>" . 
                    "<span>${message['postDate']}</span></p>"
                    . "<p>${message['message']}</p></div>";
            }
        ?>
        </div>
    </section>
</main>

<script>
window.addEventListener('load', () => {
    const prevBtn = document.getElementById('previous');
    const nextBtn = document.getElementById('next');
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            let page = <?php echo $page; ?> + 1;
            window.location.href = `?page=${page}`;
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            let page = <?php echo $page; ?> - 1 ;
            window.location.href = `?page=${page}`;
        });
    }
});
</script>
</body>
</html>