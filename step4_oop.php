<?php

require_once __DIR__ . '/db/test_db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1>Step 4 (OOP)</h1>
    <div class="container">
    <em>In un nuovo file, vengono istanziati almeno due oggetti Post e stampati a schermo i valori delle relative proprietà</em>
    <!--Per svolgere questa traccia ho creato manualmente un file che potesse fungere da database ed ho stampato poi i suoi dati qui in pagina-->
        <div class="row">
            <?php //Ciclo all'interno dell'array $posts ed utilizzo i getters per poter leggere le proprietà protette
            foreach($posts as $post) :?>
                <div class="card-step4">
                    <h3><?= $post->get_title()?></h3>
                    <div>
                        <span>Post_id: <?= $post->get_Id()?></span> 
                        <span>User_id: <?= $post->get_user_id()?></span>
                        <span>Data: <?= $post->get_date()?></span>
                        <span>Creato il: <?= $post->get_created_at()?></span>
                    </div>
                    <span>Hashtags:<?php //Ciclo all'interno del sub-array
                    foreach($post->get_tags() as $tag) :?>
                         <strong>#<?= $tag ?></strong>
                    <?php endforeach; ?>
                    </span>
                    <div>
                        <?php //Ciclo all'interno del subarray contenente gli oggetti creati con le classi Media ed utilizzo poi i loro getters per leggerne le proprietà. Nota: ho inserito anche un media la cui estensione non è riconosciuta
                        foreach($post->get_medias() as $media) : ?>
                            <span>Type: <?= $media->get_type();?></span>
                            <?php //Quest'if blocca la visualizzazione delle specifiche del video con estenzione diversa da quelle permesse
                            if($media->get_type() != 'Not supported media') :?>
                                <span>Media_id: <?= $media->get_id() ?></span>
                                <span>User_id: <?= $media->get_user_id() ?></span>
                                <span>Path: <?= $media->get_path() ?></span>
                                <span>Creato il: <?= $media->get_created_at() ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="other_page">
        <i class="fa-solid fa-arrow-left"></i><a href="index.php" class="button">Step 3 (php-mysqli)</a>
        <a href="bonus_step4_oop.php" class="button">Bonus</a><i class="fa-solid fa-arrow-right"></i>
        </div>
    </div>
</body>

</html>