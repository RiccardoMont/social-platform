<?php

include_once __DIR__ . '/Media.php';


class Post
{

    function __construct(protected int $id, protected int $user_id, protected string $title, protected string $date, protected array $tags, protected string $created_at, protected array $medias)
    {

        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->date = $date;
        $this->tags = $tags;
        $this->created_at = $created_at;
        $this->medias = $medias;
    }


    /*GETTERS*/
    public function get_Id()
    {
        return $this->id;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }
    
    public function get_title()
    {
        return $this->title;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_tags()
    {
        return $this->tags;
    }

    public function get_created_at()
    {
        return $this->created_at;
    }

    public function get_medias()
    {
        return $this->medias;
    }
}


$provaPost = new Post(1, 2, 'eccoci', '2011-04-05', ['estate', 'divertimento', 'mare'], '2011-03-02', [new Media(2, 5, 'foto', 'cartelletta', '2010-08-08'), new Media(6, 12, 'video', 'zaino', '2009-01-01')]);
//var_dump($provaPost);

var_dump($provaPost->get_title());
var_dump($provaPost->get_medias());
var_dump($provaPost->get_medias()[1]->get_id());
