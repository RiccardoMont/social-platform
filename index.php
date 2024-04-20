<?php

/*db connection*/
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'milestone_4');
/*crea un'istanza della connessione*/
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

/*controllo la connessione al db*/
if ($connection && $connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    die;
}

//var_dump($connection);
$sql = "SELECT `users`.`username` AS `nome`, COUNT(*) AS `likes_no`
FROM `likes`
JOIN `posts` ON `likes`.`post_id` = `posts`.`id`
JOIN `users` ON `posts`.`user_id` =  `users`.`id`
GROUP BY `users`.`username`
ORDER BY `likes_no` DESC;";

$result = $connection->query($sql);
$connection->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- TOGLIERE IL COMMENTO PER ABILITARE LO SCHEMA DI DRAWIO
        <img src="./schema.png" alt=""> -->
    <h1>Most liked!</h1>
    <div class="container">
        <div class="row">
            <?php
            //Variabili di supporto per poter "rankare" manualmente gli utenti
            $i = 1;
            //Definisco la variabile j=i adesso in modo che le persone in prima posizione abbiano un indice di riferimento dato che non entreranno nel condizionale successivo
            $j = $i;

            //Ciclo per fetchare i risultati della mia query
            while ($row = $result->fetch_assoc()) :
                ['nome' => $nome, 'likes_no' => $likes] = $row;

                //Condizionale che mi permette di assegnare la posizione in maniera graduale od anche in caso di spareggio
                if ($ranker > $row['likes_no']) {
                    $j = $i;
                    $i++;
                } else {
                    $i++;
                }

                //Variabile di supporto che mette che viene riassegnata di volta in volta a termine del ciclo con il nuovo numero di likes. La inserisco alla fine in modo da poter paragonare i Likes della persona nella posizione precedente a quella della persona subito successiva
                $ranker = $row['likes_no'];
            ?>
            
                <div class="card 
                <?php 
                //In base alla posizione raggiunta dall'utente in classifica, gli sarà abbinata una specifica classe che modificherà il background della sua card
                if($j === 1) {echo 'pink-diamond';} 
                elseif($j < 5) {echo 'platinum';}
                elseif($j < 10) {echo 'golden';}
                elseif($j < 20) {echo 'silver';}
                else {echo 'bronze';}
                ?>">
                    <span class="shiny_bar2"></span>
                    <span class="shiny_bar1"></span>
                    <div class="panel-number">
                        <span class="name"><?= $nome ?></span>
                        <span class="ranking"><?= $j ?>°</span>
                        <div>
                            <span class="likes"><?= $likes ?></span>
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="other_page">
        <i class="fa-solid fa-arrow-left"></i><a href="bonus_step4_oop.php" class="button">Bonus</a>
        <a href="step4_oop.php" class="button">Step 4 (OOP)</a><i class="fa-solid fa-arrow-right"></i>
        </div>
    </div>
</body>

</html>