<?php
class database{
  private $host;
  private $user;
  private $password;
  private $db;
  private $port=5432; // Por defecto es 5432
  private $con=null;
  public function getConnection($host="localhost",$user="root",$password="", $db="bdoscar_clase02"/*,$port=8080*/){ //5432 Postgress
   $this->host=$host;
   $this->user=$user;
   $this->password=$password;
   $this->db=$db;
   //$this->port=$port;
   // $this->con = pg_connect("host=".$this->host." port=".$this->port." dbname=".$this->db." user=".$this->user." password=".$this->password); //pg_connect
   $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->db); 
   if (!$this->con) die("Ocurrio un error al intentar la conexion");
   return $this->con;
 }
 
 public function conectar(){
  return $this->con;
  }
 }
?>
