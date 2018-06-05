<?php

class Route{

    public static $validRoutes = [];

    public static function set($route,$function){

        self::$validRoutes[] = $route;

        $url = $_GET['url'];

        $matches = [];

        $firstChar = substr( $route, 0, 1);


        if ( $firstChar === '/' ){
            if ( preg_match($route,$url,$matches) ){
                $function->__invoke( $matches );
            }
        }
        else{
            if ( $route === $url ){
                $function->__invoke( [$url] );
            }
        }

    }

}