<?php

require_once __DIR__ . '/../app/Models/Post.php';


$posts = [
    new Post(
        1,
        2,
        'Eccoci',
        '2011-04-05',
        ['estate', 'divertimento', 'mare'],
        '2011-03-02',
        [
            new Media(6, 12, 'zaino.jpg', '2009-01-01')
        ]
    ),
    new Post(
        5,
        6,
        'Buonaserata',
        '2015-11-04',
        ['autunno', 'bar'],
        '2015-11-02',
        [
            new Media(4, 19, 'caffè.mp4', '2014-04-09'),
            new Media(3, 10, 'pianoforte.mov', '2014-09-21')
        ]
    )
];
