<?php

    define('DB_SERVER', 'localhost'); //ชื่อ host
    define('DB_USER', 'root'); //ชื่อ database
    define('DB_PASS', ''); //รหัส database
    define('DB_NAME','register_oop'); //ชื่อ databes

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME); //การเชื่อมต่อฐานข้อมูล
            $this->dbcon = $conn;

            if (mysqli_connect_error()) {                                //ใช้ if else เพื่อตรวจสอบการเชื่อต่อ ฐานข้อมูล
                echo "เขื่อมต่อไม่สำเร็จ:" . mysqli_connect_error();
            } 
        }
        

        public function usernameavailable($uname){
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function registeration($fname , $uname, $uemail, $passwoed){
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail, password)
            VALUES('$fname' , '$uname', '$uemail', '$passwoed')");
            return $reg;
        }

        public function signin($uname, $passwoed){
            $signininquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM tblusers WHERE username = 
            '$uname' AND password = '$passwoed'");
            return $signininquery;
        }
    }

?>