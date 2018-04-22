<?php 

	if(isset($_POST['recherch']))
		
       { 
	   
	   		include('../Model/medicament.class.php');	
	   
	  $list_class="pagination pagination-sm";
	  $limit=5;
	  $links=3;
	  if(@$_POST['page']==""){@$pages =1;}else{@$pages = $_POST['page'];}
	  
	  if($pages == 0 || $pages==1){$page=0;}else{$page= ($pages*$limit)-$limit;}
	  $result = Medicament::afficherPage($_POST['recherch'],$page,$limit);
	  $resultat =Medicament::afficherGlobal($_POST['recherch']);
	  $total=count($resultat);
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	  ?>
   <div class="table-responsive">
		<table class="table table-striped">
        
        <tr id="tt">
         <th>code Barre</th>
          <th>Designation</th>
          <th>Form</th>
           <th>Famille</th>
          <th>Prix Unitaire</th>
          <th colspan="2">Action</th>
        </tr>
        <?php 
		
	
		$nb =count($result);
		if($nb>0){
			
			foreach($result as $data){
			
		
		 ?>
        <tr>
        <td><?php echo $data->code_barre; ?></td>
        <td><?php echo $data->desg; ?></td>
        <td><?php echo $data->form; ?></td>
         <td><?php echo $data->famille; ?></td>
        <td><?php echo $data->Prix_u; ?></td>
        <td>
        <ul class="list-inline">
        <li><a href="javascript:edit(<?php  echo $data->id_m; ?>)" class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier" ></a></li>
        <li><a href="javascript:delet(<?php  echo $data->id_m; ?>)" class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" ></a></li>
        </ul>
        </td>
        
       </tr> 
         
       <?php }  }else{  ?>
			<tr>
 <td colspan="5"><center><?php echo "Aucun Donnée"; ?></center></td>
</tr>
			<?php } ?>
       </table>
       
       <?php
	   
    $last       = ceil( $total / $limit );
	$start      = ( ( $pages - $links ) > 0 ) ? $pages - $links : 1;
    $end        = ( ( $pages + $links ) < $last ) ? $pages + $links : $last;
	$html       = '<ul class="' . $list_class . '">';
	
	if($pages <= 1  ){
	$clas      = ( $pages == 1 ) ? "disabled" : "";
	
	
	$html       .= '<li  class="' . @$clas . '"><a onclick="return false;" href="">&laquo;</a></li>';
	
	}else{
	
    $html       .= '<li><a href="javascript:pagination(' . ( $pages - 1 ). ');">&laquo;</a></li>';
	}
    if ( $start > 1 ) {
        $html   .= '<li><a  onclick="pagination(' . 1 . ');return false;" href="">1</a></li>';
        $html   .= '<li class="'.@$clas.'"><span>...</span></li>';
    }
	
	
    for ( $i = $start ; $i <= $end; $i++ ) {
		
        $class  = ( $pages == $i ) ? "active success" : "";
        $html   .= '<li class="' . $class . '"><a href="javascript:pagination(' . $i . ');">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="'.@$clas.'"><span>...</span></li>';
        $html   .= '<li><a onclick="pagination(' . $last . ');return false;"  href="">' . $last . '</a></li>';
    }
	if($pages >= ceil( $total / $limit )){
	$clas      = ( $pages == $last ) ? "disabled" : "";
	$html       .= '<li class="' . @$clas . '"><a onclick="return false;"  href="">&raquo;</a></li>';
	}else{
	$html       .= '<li><a  href="javascript:pagination(' . ( $pages + 1 ). ');">&raquo;</a></li>';
	}
    $html       .= '</ul>';
	echo $html;
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	    } 
       
       ?>
   
 </div>
		
	<!--***********************************Supp**********************************************-->			
		
		
		
		<?php
	
        if(isset($_POST['supp'])){
			
			
			include('../Model/medicament.class.php');
			
			Medicament::delet($_POST['supp']);
			
			echo "<script>location.href='../view/index.php?page=medicament';</script>";
		
		}
		
		
		
//******************************Affiche la formulaire qui include*************************-->	
		
		
		
		
		  if(isset($_POST['ff'])){
			
			
	
	 include('../include/formMed.php');

	}
	
		
   //******************************L ajout de Medicament*************************-->	


	 if(isset($_POST['AjMed'])){
	
	include_once '../Model/medicament.class.php';
	
	$mdt = new Medicament(0,$_POST['cdb'],$_POST['des'],$_POST['form'],$_POST['fam'],$_POST['px']);
	
	@$ok=$mdt->Add();
	
     echo '<div id="al">Bien Ajouter</div>';
	
	}
	



            //******************************Poste*************************-->	



  if(isset($_POST['aff'])){
	
	 include('../include/ModiMed.php');

	}
	


//*****************************************Modification *********************************************


 if(isset($_POST['ModMed'])){
	
	include_once '../Model/medicament.class.php';
	
	$mod = new Medicament($_POST['id_m'],$_POST['cdb'],$_POST['des'],$_POST['form'],$_POST['fam'],$_POST['px']);
	
	@$ok=$mod->Edit();
	
     echo '<div id="al">Bien Modifier</div>';
		echo "<script>location.href='../view/index.php?page=medicament';</script>";

	}










      
	 
	 ?>






















