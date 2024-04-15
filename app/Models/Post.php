<?php

require_once __DIR__ . '/Media.php';


class Post
{

    //L'ultimo parametro che si occupa dei media, essendo un array, mi permette di poter inserire più di un elemento
    function __construct(protected int $id, protected int $user_id, protected string $title, protected string $date, protected array $tags, protected string $created_at, protected array $medias)
    {

        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->date = $date;
        $this->tags = $tags;
        $this->created_at = $created_at;
        if(!empty($medias)){
        $this->medias = $medias;
        }
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

