<?php

require_once __DIR__ . '/../app/Models/UserLike.php';

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

//query
$sql = "SELECT `users`.`username` AS `nome`, COUNT(*) AS `likes_no`
FROM `likes`
JOIN `posts` ON `likes`.`post_id` = `posts`.`id`
JOIN `users` ON `posts`.`user_id` =  `users`.`id`
GROUP BY `users`.`username`
ORDER BY `likes_no` DESC;";

$result = $connection->query($sql);

//Creo un array di supporto dove ciclerò in pagina
$users = [];

//Ciclo nella risposta e creo n numero di oggetti pari al numero di risultati
foreach($result as $user){

    $single_user = new UserLike($user['nome'], $user['likes_no']);
    
    //Inserisco gli oggetti all'interno dell'array di supporto 
    array_push($users, $single_user);

}

$connection->close();
