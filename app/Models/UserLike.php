<?php

//Creo una classe in base ai dati che ho selezionato con la mia query
class UserLike {

    function __construct(protected string $name, protected int $likes_no)
    {
        $this->name = $name;
        $this->likes_no = $likes_no;
    }


    //Getters
    public function get_Name()
    {
        return $this->name;
    }

    public function get_Likes_no()
    {
        return $this->likes_no;
    }

}

