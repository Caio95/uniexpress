<?php

Class Database {
    public static function connection(){
        return new PDO('mysql:host=localhost;port=3306;dbname=uniexpress;charset=UTF8', 'root', '');
    }
}

?>