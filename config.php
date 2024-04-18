<?php
class connection {
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function dbConfig() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> password = "";
        $this -> dbName = "chefs_corner";
    }
}
?>