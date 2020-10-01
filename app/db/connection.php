<?php

require_once "../config/db.php";

class connection{

    private $con;

    public function __construct(){
        $this->con = new mysqli(HOST, USER, PASS, DB);
        $this->con->set_charset(CHARSET);

        return $this;
    }

    public function close(){
        $this->con->close();
    }

    public function query($sql){
        $rs = $this->con->query($sql);

        if ($rs->num_rows > 0){
            return $rs;
        } else {
            return null;
        }
    }

    public function execute($sql){
        $res = $this->con->query($sql);

        if($res == 1){
            return 1;
        } else {
            return 0;
        }

    }
}