<script type="text/javascript">


jQuery(function(){
	
	
	var v =jQuery("#ff").validate({
		
		submitHandler:function(form){
			
			jQuery(form).ajaxSubmit({
				target:"#reponse"
				});
		}
		});


    
		
   
});


$(document).ready(function() {
	
	
	$('.form-control').keyup( function(){
		
		
		document.getElementById('AjMed').disabled=false;});
		
		
		
		
		
		$('.form-control').change( function(){
		
		
		document.getElementById('AjMed').disabled=false;});
		
		
		
		
		
	
    $('form').submit(function(){
		
		 $(':submit',this).attr('disabled','disabled');
		  $("#cdb").val('');
		 $("#des").val('');
				$("#form").val('');
					$("#fam").val('');
						$("#px").val('');
		 
		 
		 });
		 

			$('.form-control').keyup( function(){
				$("#al").hide(50);
				
				});
	
	
	
	
	
	
	
	
	
	
	
	

}); 
</script>




<h3>L'Ajout de Médicament</h3>

<form class="form-horizontal" id="ff" action="../controller/medicament.php" method="post">
<div id="reponse"></div>
  
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Code Barre<em>*</em></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="cdb" id="cdb"  required="" placeholder="Code Barre">
    </div>
  </div> 
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Designation<em>*</em></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="des" id="des"  required="" placeholder="Designation">
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Form<em>*</em></label>
    <div class="col-xs-4">
      <input type="text" class="form-control "required=""  name="form" id="form" placeholder="Form">
    </div>
  </div>
  
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Famille<em>*</em></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="fam" id="fam" required="" placeholder="Famille" onkeyup="lokup(this.value);">
      <div id="msg"></div>
    </div>
  </div>
  
  
   <div class="form-group">
    <label  for="inputEmail3" class="col-sm-2 control-label">Prix Unitaire<em>*</em></label>
    <div class="col-xs-4">
      <input type="text" class=" form-control" id="px" name="px" required="" placeholder="Prix Unitaire">
    </div>
  </div>
  
  
  
  
  
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" id="AjMed" name="AjMed"  class="btn btn-success" value="Ajouter"  />&ensp; <input type="reset"  class="btn btn-default" onClick="window.location.href='../view/index.php?page=medicament'" value="Annuler" />
    </div>
  </div>
</form>

