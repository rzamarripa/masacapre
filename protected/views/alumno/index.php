<link href='http://fonts.googleapis.com/css?family=Margarine' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Mouse+Memoirs' rel='stylesheet' type='text/css'>

<?php
	$this->pageCaption='Alumno';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='Listar alumno';
	$this->breadcrumbs=array(
		'Alumno',
	);
	
	$this->menu=array(
		array('label'=>'Crear Alumno', 'url'=>array('create')),
		array('label'=>'Administrar Alumno', 'url'=>array('admin')),
	);
	
	$alumnos = Alumno::model()->findAll();
?>

<?php
	$c = 0;
	foreach($alumnos as $alumno)
	{
		if($c == 0)	
			echo '<div class="row">';
		$c++;	
?>
		
		<div class="span3">
			<ul class="thumbnails">
				<li class="span3">
					<div class="thumbnail" style="height:380px;">	
									
					<?php
						if($alumno->foto != "")
							$foto = $alumno->foto;
							
						else
							$foto = 'sin_imagen.jpg';

						echo '<img style="
										border-style:solid;
										border-width:3px;
										border-color:#442B1C;
										height:200px; 
										width:180px; 
										-webkit-border-radius: 3px 3px; 
										-moz-border-radius: 3px 3px;"
									src="' . 
										Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . 
											DIRECTORY_SEPARATOR . $alumno->foto . '" alt="' . $alumno->nombre . '"/>'; 
					?>
						
						<div class="caption">
							<div style="height:80px;">
								<p style="text-align:left;">
									<b>Matrícula: </b><?php echo $alumno->matricula; ?><br/>
									<b>Nombre: </b><?php echo CHtml::link(CHtml::encode($alumno->nombre), array('view', 'id'=>$alumno->id)); ?><br/>
								</p>
							</div>
							
							<p style="text-align:left;">
								<?php
							    	echo CHtml::button($alumno->matricula, 
								    		array('submit' => 'view/' . $alumno->id,'class'=>'btn btn-large btn-success', 'style'=>"width:100%; font-family: 'Merienda', cursive; font-size:15pt;")); 
							    ?>
							</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
		
<?php
		if($c==4){
			echo "</div>";
			$c=0;
		}		
	}	
?>
