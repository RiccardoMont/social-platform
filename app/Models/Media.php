<?php

class Media {

    

    function __construct(protected int $id, protected int $user_id, protected string $type, protected string $path, protected string $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->path = $path;
        $this->created_at = $created_at;
    }


    /*GETTERS*/
    public function get_id()
    {
        return $this->id;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_path()
    {
        return $this->path;
    }

    public function get_created_at()
    {
        return $this->created_at;
    }


}



$prova = new Media(21, 12, 'video', 'scascvavva', '2019-01-03');
//var_dump($prova);