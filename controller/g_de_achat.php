 
    <!--******************************************** Detail Achat *********************************************-->
    
    
    <?php if(isset($_POST['ent'])){ 
    include('../Model/achat.class.php');
	
		foreach(Achat::GetByF($_POST['idd']) as $data){?>
		
		<div class="row">
        <div class="col-xs-2">
		Fournisseur<br />
        <input type="text" disabled="disabled" class="form-control" value="<?php echo $data->nom_f; ?>" /><br />
        </div>
         <div class="col-xs-2">
        Date Achat<br />
        <input type="text" disabled="disabled" class="form-control" value="<?php echo $data->date_a; ?>" />
		</div>
        </div>
		
	<?php }	} ?>
    
    
   <!--********************************************Medicament*****************************************************-->  
	
    <?php if(isset($_POST['tbl'])){?>
    <div class="table-responsive">
     
     	<table class="table table-striped">
        
        <tr id="tt">
       
          <th>Designation</th>
          <th>Quantité</th>
          <th>Prix BL</th>
          <th colspan="2">Action</th>
        </tr>
        <?php 
		include('../Model/d_achat.class.php');
		
		   $nb = count(D_Achat::GetAllD($_POST['id']));
		if($nb>0){
			
			foreach(D_Achat::GetAllD($_POST['id']) as $data){@$rs+= $data->prix_a;
				
			 ?>
        <tr>
        
        <td><?php echo $data->desg; ?></td>
        <td><?php echo $data->qte_a; ?></td>
        <td><?php echo $data->prix_a; ?></td>
        
        
        <td><a href="javascript:delet(<?php  echo $data->id_da; ?>)" class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="supprimer" ></a></td>
      
        
       </tr>   
      
       <?php } ?>
        <tr><td></td>
       <td></td>
       <td>Prix total :</td>
       <td><?php echo number_format($rs,2,","," ").' DH';?>  </td>
       </tr> <?php  }else{  ?>
			<tr>
 <td colspan="5"><center><?php echo "Aucun Donnée"; ?></center></td>
</tr>
     
     
     <?php } }?>
       </table>
     
     </div>  
     <!--*************************************************LA SUPPRESSION BL*******************************-->  
     
	  <?php  if(isset($_POST['iddA'])){
		
	 include('../Model/d_achat.class.php');
	
	$nbrl=count(D_Achat::getById($_POST['idA']));
	if($nbrl>1){
		
		 D_Achat::DeById($_POST['iddA']);
		 
		echo  "<script>location.href='../view/index.php?page=d_achat&&id=".$_POST['idA']."';</script>";
		
	}else{
		
		 include('../Model/achat.class.php');	 
		Achat::DeByIdA($_POST['idA']);
        
	echo  "<script>location.href='../view/index.php?page=achat';</script>";

		}

	} ?>

    <!--*************************************************Ajout Detail BL*******************************-->
    

     <?php if(isset($_POST['paj'])){ ?>
	 <legend>Ajouter Nouveau BL</legend>
     <div class="table-responsive">
	 <table class="table table-striped">
        
        <tr id="tt">
        <th>Code Barre</th>
          <th>Designation</th>
          <th>Form</th>
           <th>Famille</th>
          <th>Prix Unitaire</th>
          <th>Quantité</th>
          <th>Prix</th>
         <th colspan="2"></th>
        </tr>
       <input type="hidden" class="form-control" placeholder="Code Barre" id="idm" > 
 <td><input type="text" class="form-control" placeholder="Code Barre" id="cb" onkeyup="lookup(this.value)" required="">
         <div id="divAll" style="display: none;"><img src="../view/img/upArrow.png"  style="position: relative; top: -12px; left: 30px;" alt="upArrow"/>
         <div id="aff"></div>
         </div>
        </td>
        
        
        <td><input type="text" class="form-control" placeholder="Designation" id="des"></td>
        
    
       
        
        <td><input type="text" class="form-control" placeholder="Form" id="fo"></td>
       <td><input type="text" class="form-control" placeholder="Famille" id="fam"></td>
	    <td><input type="text" class="form-control" placeholder="Prix Unitaire"  id="pxu"></td>
        <td><input type="text" class="form-control" placeholder="Quantité" id="qte" required=""></td>
        <td><input type="text" class="form-control" placeholder="Prix" id="px" required=""></td>
	    <td><button type="button" class="btn btn-success glyphicon glyphicon-plus" onclick="AjouDetBL();"></button></td>
        <td></td>
	 
	 
	
	 
	 
	 </table>
     </div>
	 
	<?php  }?>
    
    
    <?php if(isset($_POST['gid'])){
		 include('../Model/d_achat.class.php');
		 
		 $id_achat=$_POST['gid'];
		 $idm=$_POST['idm'];
		 $qte=$_POST['qte'];
		 $px=$_POST['px'];
		 $result=$qte*$px;
		
		
		D_Achat::AjouDetBL($id_achat,$idm,$qte,$result);
    
    
    echo  "<script>location.href='../view/index.php?page=d_achat&&id=".$_POST['gid']."';</script>";
    
    } ?>
    <!--*****************************************onKayup ***********************************-->
    
    
     <?php if(isset($_POST['vl'])){
		 
		 include('../Model/medicament.class.php');
		 
		 $nb=count(Medicament::GetAll($_POST['vl']));
		 
		 if($nb>0){
			 
			 foreach(Medicament::GetAll($_POST['vl']) as $data){
				 $idm=$data->id_m;
				 $cdb=$data->code_barre;
				 $des=$data->desg;
				 $form=$data->form;
				 $fam=$data->famille;
				 $px=$data->Prix_u;
				 
				 
				echo '<li id="lii" onclick="fill(\''.$idm.'\',\''.$cdb.'\',\''.$des.'\',\''.$form.'\',\''.$fam.'\',\''.$px.'\');">'.$cdb.' '.$des.'</li>'; }
				 
			}else{
				  echo "Aucun Données";
			 }
			 
			 
		 }
		 
		 
		 
		 
		 
	
	
    
     ?>
    
     
     
     
     
     