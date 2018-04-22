<?php 


require("connexion.php");

class D_Achat{
	
	
	public $id_da;
	public $id_a;
	public $id_m;
	public $qte_a;
	public $prix_a;
	
	
	
	
	
	public  function __construct($id,$ida,$idm,$qt,$px){
		$this->id_da=$id;
		$this->id_a=$id;
		$this->id_m=$idm;
		$this->qte_a=$qt;
		$this->prix_a=$px;
	}
	
    //****************************Fonction pour afficher les detaille achat avec la Pagination****************************

     public static function GetAllD($id){
		global $db;
		$req=$db->prepare("SELECT * FROM d_achat da, medicament m WHERE m.id_m = da.id_m AND da.id_a='$id' ");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	    //****************************Fonction pour afficher les detaille achat*********************************************

	
	  public static function getById($id){
		global $db;
		$req=$db->prepare("SELECT * FROM `d_achat` WHERE id_a='$id'");
		$req->execute();
	    
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	    //****************************Fonction pour l'insertion des detaille Achat*********************************************
	
	
		public static function AjouDetBL($id,$idm,$qte,$px){
		global $db;
		$req=$db->prepare("INSERT INTO `d_achat`(`id_da`, `id_a`, `id_m`, `qte_a`, `prix_a`) VALUES ('','$id','$idm','$qte','$px')");
		$req->execute();
	    
	  }
	
	
		//****************************Fonction pour la suppression des detaille Achat************************************

	public static function DeById($id){
			global $db; 
		  $req =$db->prepare("DELETE FROM d_achat WHERE id_da='$id'");
		  $req->execute();
		}
	
	
	
	

}


























?>