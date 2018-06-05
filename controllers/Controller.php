<?php


class Controller{
    
    public static function gotoView($url,$withSession=true){
        if ($withSession === true) session_start();
        require_once($url);
    }

    public static function createView($viewName,$withSession=true){
        if ($withSession === true) session_start();
        require_once ("./views/$viewName.php");
    }

    public static function createTemplateView($viewName,$callback,$param,$withSession=true){
        if ($withSession === true) session_start();
        echo $callback->__invoke( file_get_contents("./views/$viewName.php"), $param );
    }

    public static function loadScript($fileName,$ext='js'){
        header("Content-type: text/javascript; charset: UTF-8");
        include "./resource/$fileName.$ext";
    }

    public static function loadScriptMap($fileName){
        header("Content-type: text/plain; charset: UTF-8");
        include "./resource/$fileName.js.map";
    }

}

?>