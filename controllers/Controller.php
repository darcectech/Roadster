<?php


class Controller{

    public static function createView($viewName,$withSession=true){
        if ($withSession === true) session_start();
        require_once ("./views/$viewName.php");
    }

}

?>