<?php 
    class Sensor{
        public $link='';
        function __construct(){
        $this->connect();
        }
        
        function connect(){
        $this->link = mysqli_connect('ec2-18-214-134-226.compute-1.amazonaws.com','qjxtfcpyolovht','dbc417634f8ce8ba2abc874571c9cfe1e03d494693e23ac499188553a802b9c2') or die('Cannot connect to the DB');
        mysqli_select_db($this->link,'d1ab2u185tq6et') or die('Cannot select the DB');
        }
    }

    $a = new Sensor();
    
?>