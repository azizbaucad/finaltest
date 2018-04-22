<?php 


require("connexion.php");

class Achat{
	
	public $id_a;
	public $id_f;
	public $date_a;
	
	
	
	public function __construct($id,$idf,$dte){
		$this->id_a=$id;
		$this->id_f=$idf;
		$this->date_a=$dte;
	}
	
	//*****************************************Fonction pour afficher les Achat***************************************
	
	public static function GetAll($re){
		global $db;
		$req=$db->prepare("SELECT * FROM achat a,fournisseur f WHERE f.id_f = a.id_f AND f.nom_f LIKE '$re%' ");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	public static function GetAllPag($re,$page,$limit){
		global $db;
		$req=$db->prepare("SELECT * FROM achat a,fournisseur f WHERE f.id_f = a.id_f AND f.nom_f LIKE '$re%'  LIMIT $page,$limit ");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
		
	}
	//*********************************Fonction pour afficher les fournisseur sur selected**********************************
	
	
	
	public static function GetByF($idd){
		global $db;
		$req=$db->prepare("SELECT * FROM achat a,fournisseur f WHERE f.id_f = a.id_f AND a.id_a='$idd' ");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	
	
	
	//*********************************Fonction pour l'Ajoute Achat****************************************************
	
	
		
		public static function ADDAchat($fo,$dt){
			global $db; 
		  $req =$db->prepare("INSERT INTO `achat`(`id_a`, `id_f`, `date_a`) VALUES ('','$fo','$dt')");
		  $req->execute();
		  $ok=$db->lastInsertId();
			 return $ok;
		}
	
	
	
	
	
	//*********************************Fonction pour la suppresion**********************************
	
	
	
	
	
	public static function DeByIdA($id){
			global $db; 
			try{
				$db->beginTransaction();
		        $req =$db->prepare("DELETE FROM achat WHERE id_a='$id'");
		        $sql =$db->prepare("DELETE FROM d_achat WHERE id_a='$id'");
		        $sql->execute();
				$req->execute();
		        $db->commit();
		  
			}catch(Exeception $e){
				$db->rollBack();
			}
		}
		
		
		//*********************************Fonction pour Calculer la somme d'achat*********************************
	
	

public static function NbrBl(){
		global $db;
		$req=$db->prepare("SELECT SUM(id_a) FROM achat GROUP BY id_a ");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	
}






?>