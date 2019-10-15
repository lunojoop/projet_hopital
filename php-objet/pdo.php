<?php
    
    class Database 
    {   
        private $db_name;
        private $db_user;
        private $db_pass;
        private $db_host;
        private $pdo;
        public function __construct($db_name='hopital', $db_user='root', $db_pass='diop', $db_host='localhost')
        {   
            $this->db_name=$db_name;
            $this->db_user=$db_user;
            $this->db_pass=$db_pass;
            $this->db_host=$db_host;
        }
        public function getPDO()
        {
            $pdo=new PDO('mysql:dbname=hopital;host=localhost','root','diop');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo=$pdo;
            return $pdo;
        }
    }
?>