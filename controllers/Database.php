<?php

class Database extends SQLite3 {
    function __construct($name) {
        $this->open("$name.db");
    }

    function finish(){
        $this->close();
    }

    function filter($input){
        return sqlite_escape_string($input);
    }

    function runQuery($sql_cmd){
        $sql_cmd = $this->filter($sql_cmd);
        return $this->query($sql_cmd)->fetchArray(SQLITE3_ASSOC);
    }

    function run($sql_cmd){
        $sql_cmd = $this->filter($sql_cmd);
        return $this->exec($sql_cmd);
    }

    function each($sql_cmd,$function){
        while ( $row = $this->runQuery($sql_cmd) ){
            $function->__invoke($row);
        }
    }
}

?>