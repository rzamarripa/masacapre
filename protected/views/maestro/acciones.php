<?php
	$this->pageCaption='';
	$this->pageTitle=Yii::app()->name;
	
	$usuarioActual = Usuario::model()->find('usuario=:x',array(':x'=>Yii::app()->user->name));	
?>
<!--
<?php 
	if($usuarioActual->tipoUsuario->nombre == "Administrador"){ ?>
	<div class="well">
		<?php echo CHtml::button('Complete su registro', array('submit' => array('update','id'=>$usuarioActual->institucion_aid), 										'class'=>'btn btn-large btn-warning', 'style'=>'width:100%'));  ?>
	</div>
<?php } else { ?>
	<div class="alert alert-info">
	  <p style="font-size=24pt;"><b>Gracias!  </b>Puedes actualizar tu información cuando gustes.    
	  <?php echo CHtml::button('Actualice su registro', array('submit' => array('update','id'=>$usuarioActual->institucion_aid), 'class'=>'btn btn-small', 'style'=>''));  ?>
	</div>
<?php } ?>
-->
<div class="row">
	<div style="width:100%; text-align:center">
		<div class="span4">
			<ul class="thumbnails">
			<li class="span4">
				<div class="thumbnail">				
				<img src="<?php echo Yii::app()->baseUrl . '/images/informe.png'; ?>" alt="iap"/>
					<div class="caption">
						<div style="height:80px;">
							<p style="text-align:left">Acciones realizadas por la institución en el ejercicio inmediato anterior.</p>
						</div>
						<br/><br/>
						<p style="text-align:left;">
							<?php
						    	$hechoIngreso = IngresoPorDonativo::model()->find('institucion_aid=:inst',
						    	array(':inst'=>$usuarioActual->institucion->id));
						    	echo CHtml::button('Planeaciones', 
							    		array('submit' => 'actualizaringreso','class'=>'btn btn-large btn-primary', 'style'=>'width:100%')); 
						    ?>
						</p>
					</div>
				</div>
			</li>
			<ul>
		</div>
		<div class="span4">
			<ul class="thumbnails">
			<li class="span4">
				<div class="thumbnail">				
				<img src="<?php echo Yii::app()->baseUrl . '/images/programa.png'; ?>" alt="iap"/>
					<div class="caption">
						<div style="height:80px;">
							<p style="text-align:left">Actividades que se llevarán a cabo para concretar los fines de la institución.</p>
						</div>
						<br/><br/>						
						<p>
							<?php 
							try {
							$hechoPrograma = ProgramaDeTrabajo::model()->find('institucion_id=:inst and  ejercicio_fiscal_id=:ejer',
						    	array(':inst'=>$usuarioActual->institucion->id, ':ejer'=>$ejercicioFiscal->id))->programas;
						    	} catch (Exception $e) {}
							if($esEditable){
								if($hechoPrograma){
									echo CHtml::button('Modificar', array('submit' => 
									array('institucion/programa'),'class'=>'btn btn-large btn-primary', 'style'=>'width:100%'));
								}
								else{
									echo CHtml::button('Crear', array('submit' => 
									array('institucion/programa'),'class'=>'btn btn-large btn-primary', 'style'=>'width:100%'));
								} 
							} 
							else{
								if($hechoPrograma){
									echo CHtml::button('Realizado muchas gracias', 
							    		array('','class'=>'btn btn-large btn-success disabled', 'style'=>'width:100%'));
								}
								else{
									echo CHtml::button('No Realizado', 
							    		array('','class'=>'btn btn-large disabled', 'style'=>'width:100%'));
								}
							}
							
							?>
						</p>
					</div>
				</div>
			</li>
			<ul>
		</div>	
		<div class="span4">
			<ul class="thumbnails">
			<li class="span4">
				<div class="thumbnail">				
				<img src="<?php echo Yii::app()->baseUrl . '/images/presupuesto.png'; ?>" alt="iap"/>
					<div class="caption">
						<div style="height:80px;">
							<p style="text-align:left">Es la estimación de ingresos y egresos que necesita para llevar a cabo su programa de trabajo.</p>
						</div>
						<br/><br/>
						<p>
							<?php 
						    	$hechoPresupuesto = Presupuesto::model()->find('institucion_aid=:inst',
						    	array(':inst'=>$usuarioActual->institucion->id));
						    	if(isset($hechoPresupuesto))
						    	{
							    	if($esEditable)
							    		echo CHtml::button('Modificar', array('submit' => array('presupuesto/update','id'=>$hechoPresupuesto->id, 'nombre'=>$usuarioActual->institucion->nombre ),'class'=>'btn btn-large btn-primary', 'style'=>'width:100%'));
							    	else
							    		echo CHtml::button('Realizado muchas gracias', 
							    		array('','class'=>'btn btn-large btn-success disabled', 'style'=>'width:100%'));     	    	
						    	}
						    	else
						    	{
							    	if($esEditable)
							    		echo CHtml::button('Crear', array('submit' => array('presupuesto/create','institucion_aid'=>$usuarioActual->institucion->id),'class'=>'btn btn-large btn-primary', 'style'=>'width:100%'));
							    	else
							    		echo CHtml::button('No Realizado', 
							    		array('','class'=>'btn btn-large disabled', 'style'=>'width:100%'));     	    	
						    	}
						    ?>
						</p>
					</div>
				</div>
			</li>
			<ul>
		</div>
	</div>
</div>
