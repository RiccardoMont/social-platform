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
var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- TOGLIERE IL COMMENTO PER ABILITARE LO SCHEMA DI DRAWIO
        <img src="./schema.png" alt=""> -->
    <div class="container-">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) :
                ['nome' => $nome, 'likes_no' => $likes] = $row; ?>
                <div>
                    <h3>Nome utente: </h3>
                    <p><?= $nome ?></p>
                    <h4>Numero di likes: </h4>
                    <p><?= $likes ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>




</body>
</html>