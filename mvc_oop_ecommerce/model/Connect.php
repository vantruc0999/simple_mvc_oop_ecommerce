<?php
class Connect{
    public function connect(){
        $conn = mysqli_connect("localhost", "root", "", "simple_crud", 3366);
        mysqli_set_charset($conn, 'utf8');
        return $conn;
    }

    public function select($sql){
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    public function execute($sql){
        $conn = $this->connect();
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
}