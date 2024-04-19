<?php

class Media {
    //Dichiaro la variabile type per poterle assegnare un valore in seguito tramite le indicazioni con i condizionali
    protected string $type;

    function __construct(protected int $id, protected int $user_id, protected string $path, protected string $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->path = $path;
        $this->created_at = $created_at;
        
        //Tramite questo condizionale analizzo le ultime tre lettere della stringa del path capendone così l'estensione
        if(substr($path, -3) == 'jpg'){
            $this->type = 'photo';
        }
        elseif(substr($path, -3) == 'mp4'){
            $this->type = 'video';
        }
        else{
            $this->type = 'Not supported media';
        }

        

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

