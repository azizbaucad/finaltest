<?php 
require("connexion.php");
class Medicament{	 

      public $id_m;
	  public $cdb;
	  public $desg;
	  public $form;
	  public $famille;
	  public $Prix_u;  
	  
	  public function __construct($id,$cdb,$des,$fo,$fa,$p){
		  $this->id_m=$id;
		  $this->cdb=$cdb;
		  $this->desg=$des;
		  $this->form=$fo;
		  $this->famille=$fa;
		  $this->Prix_u=$p;
		  
	  }
	  
	  
	  

	public static function afficherGlobal($re)
		{
          global $db;
		  $req =$db->prepare("SELECT * FROM `medicament` WHERE  desg LIKE '$re%'");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
		
		
			public static function afficherPage($re,$page,$limit)
		{
          global $db;
		  $req =$db->prepare("SELECT * FROM `medicament` WHERE  desg LIKE '$re%' LIMIT $page,$limit ");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public static function delet($cb)
		{
          global $db;
		  $req =$db->prepare("DELETE FROM `medicament` WHERE id_m='$cb'");
		  $req->execute();
		  
		
		
		}
			public static function GetAll($cd)
		{
          global $db;
		  $req =$db->prepare("SELECT * FROM `medicament` WHERE  code_barre LIKE '$cd%'");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
		
		
		
		  public  function Add(){
		  global $db;
		
     
$req=$db->prepare("INSERT INTO `medicament`(`code_barre`, `desg`, `form`,`famille`, `Prix_u`) VALUES (:cdb,:desg,:form,:fam,:Prix)");           
		
		@$ok=$req->execute(Array('cdb'=>$this->cdb,
								  'desg'=>$this->desg,
								  'form'=>$this->form,
								  'fam'=>$this->famille,
								  'Prix'=>$this->Prix_u
								
		));
		$this->id_m=$db->lastInsertId();
		
		return @$ok;
		
		
		}
		
		
		
		
		
		public static function getAllById($re)
		{
          global $db;
		  $req =$db->prepare("SELECT * FROM `medicament` WHERE id_m='$re'");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
		
	
		  public  function Edit(){
		  global $db;
		
     
$req=$db->prepare("UPDATE `medicament` SET `code_barre`=:cdb, `desg`=:desg,`form`=:form,`famille`=:fam,`Prix_u`=:Prix WHERE id_m=:id_m");           
		
		@$ok=$req->execute(Array(  'id_m'=>$this->id_m,
		                           'cdb'=>$this->cdb,
								  'desg'=>$this->desg,
								  'form'=>$this->form,
								  'fam'=>$this->famille,
								  'Prix'=>$this->Prix_u
								 
		));
		
		
		return @$ok;
		
		
		}	
		
		
			public static function NbrMed()
		{
          global $db;
		  $req =$db->prepare("SELECT SUM(desg) FROM `medicament` GROUP BY id_m");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
		public static function GetAl()
		{
          global $db;
		  $req =$db->prepare("SELECT * FROM `medicament`");
		  $req->execute();
		  
		   return $req->fetchAll(PDO::FETCH_OBJ);
		
		}
		
}
	
	?>