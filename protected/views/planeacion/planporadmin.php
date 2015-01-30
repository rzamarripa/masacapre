<?php
$this->pageCaption='Planeaciones';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	'Mis Planeaciones',
);
?>

<?php
//Materias por maestro
$connection = Yii::app()->db;
$queryPlaneacionesLiberadas = 'select p.id, maes.nombre as maestroNombre, mat.nombre as materiaNombre, p.consecutivo, p.semestre,  p.estrategia, 
							p.tema, p.bloque, p.sesiones, tiempo_estimado, e.id as estatus, e.nombre as nombreestatus 
							from Planeacion as p
							inner join Estatus as e on e.id = p.estatus_did
							inner join Maestro as maes on maes.id = p.maestro_aid
							inner join Materia as mat on mat.id = p.materia_aid
							where p.estatus_did = 3 || p.estatus_did = 4
							order by p.consecutivo ASC;';
//echo $queryPlaneacionPorMateria;
$commandPlaneacionesLiberadas = $connection->createCommand($queryPlaneacionesLiberadas);
$planeacionesLiberadas = $commandPlaneacionesLiberadas->queryAll();

$connection = Yii::app()->db;
$queryArchivosLiberados = 'select p.id, p.nombre as nombreArchivo, p.nombre as nombreArchivo, maes.nombre as maestroNombre, mat.nombre as materiaNombre, e.id as estatus, e.nombre as nombreestatus 
							from Archivo as p
							inner join Estatus as e on e.id = p.estatus_did
							inner join Maestro as maes on maes.id = p.maestro_did
							inner join Materia as mat on mat.id = p.materia_did
							where p.estatus_did = 3 || p.estatus_did = 4
							order by id ASC;';
//echo $queryPlaneacionPorMateria;
$commandArchivosLiberados = $connection->createCommand($queryArchivosLiberados);
$archivosLiberados = $commandArchivosLiberados->queryAll();
?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab01" data-toggle="tab">Planeaciones</a></li>
		<li><a href="#tab02" data-toggle="tab"><i class="icon-file"></i> Mis Archivos</a></li>	
	</ul>
	<div class="tab-content">
    	<div class="tab-pane active" id="tab01">
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Revisado</a></li>
					<li><a href="#tab2" data-toggle="tab">En Plataforma</a></li>
				</ul>
				<div class="tab-content">
			    	<div class="tab-pane active" id="tab1">
			    		<?php if(count($planeacionesLiberadas[0])!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td><b>Materia</b></td>
										<td><b>Maestro</b></td>
										<td style="width:30px;"><b>Consecutivo</b></td>
										<td><b>Semestre</b></td>
										<td><b>Estrategia</b></td>										
										<td><b>Sesiones</b></td>
										<td><b>Tiempo Estimado</b></td>
										<td><b>Estatus</b></td>
									</tr>
									<?php foreach ($planeacionesLiberadas as $valor) { 
											if($valor['nombreestatus'] == 'Revisado') { ?>
										<tr>
											<td style="width:20px;">
												<div class="btn-group">
													<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
														<span class="caret"/>
													</button>
													<ul class="dropdown-menu">							
														<li>
															<?php echo CHtml::link('<i class="icon-upload"></i> Subido a Plataforma', "#", array('submit'=> array('planeacion/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>4, 'tipoUsuario' => 4), 'confirm' => 'Estás seguro que quiere pasar esta planeación a En Plataforma?')); ?> 
														</li>
														<li>
															<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
															array('planeacion/view', 'id'=>$valor['id'])); ?>
														</li>									
													</ul>
												</div>
											</td>
											<td><?php echo $valor['materiaNombre']; ?></td>
											<td><?php echo $valor['maestroNombre']; ?></td>
											<td><?php echo $valor['consecutivo']; ?></td>
											<td><?php echo $valor['semestre']; ?></td>
											<td><?php echo $valor['estrategia']; ?></td>
											<td><?php echo $valor['sesiones']; ?></td>
											<td><?php echo $valor['tiempo_estimado']; ?></td>
											<td><?php echo '<span style="width:20px;" class="label label-info">' . 
											$valor['nombreestatus'] . '</span>'; ?></td>					</tr>
									<?php }}	?>			
								</table>
								<?php } 
							else{
								echo '<h6>No hay planeaciones todavía, inicie ' . CHtml::link('creando la primera', 
								array('create', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
							}
							?>
								
						</div>
						<div class="tab-pane" id="tab2">
							<?php if(count($planeacionesLiberadas)!=0) { ?>
							<table class="table table-bordered table-striped">
								<tr>
									<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
									<td><b>Materia</b></td>
									<td><b>Maestro</b></td>
									<td style="width:30px;"><b>Consecutivo</b></td>
									<td><b>Semestre</b></td>
									<td><b>Estrategia</b></td>										
									<td><b>Sesiones</b></td>
									<td><b>Tiempo Estimado</b></td>
									<td><b>Estatus</b></td>
								</tr>
								<?php foreach ($planeacionesLiberadas as $valor) { 
										if($valor['nombreestatus'] == 'En plataforma') { ?>
									<tr>
										<td style="width:20px;">
											<div class="btn-group">
												<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
													<span class="caret"/>
												</button>
												<ul class="dropdown-menu">							
													<li>
														<?php echo CHtml::link('<i class="icon-arrow-left"></i> No la he subido', "#", array('submit'=> array('planeacion/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>3, 'tipoUsuario' => 4), 'confirm' => 'Estás seguro que quiere pasar esta planeación a Revisada?')); ?> 									</li>
													<li>
														<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
														array('planeacion/view', 'id'=>$valor['id'])); ?>
													</li>
												</ul>
											</div>
										</td>
										<td><?php echo $valor['materiaNombre']; ?></td>
										<td><?php echo $valor['maestroNombre']; ?></td>
										<td><?php echo $valor['consecutivo']; ?></td>
										<td><?php echo $valor['semestre']; ?></td>
										<td><?php echo $valor['estrategia']; ?></td>
										<td><?php echo $valor['sesiones']; ?></td>
										<td><?php echo $valor['tiempo_estimado']; ?></td>
										<td><?php echo '<span style="width:20px;" class="label label-info">' . 
										$valor['nombreestatus'] . '</span>'; ?></td>
									</tr>
								<?php }}	?>			
							</table>
							<?php } 
								else{
									echo '<h6>No hay planeaciones todavía, inicie ' . CHtml::link('creando la primera', 
									array('create', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
								}
							?>
					</div>
				</div>
			</div>
    	</div>
    	<div class="tab-pane" id="tab02">
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab021" data-toggle="tab">Revisado</a></li>
					<li><a href="#tab022" data-toggle="tab">En Plataforma</a></li>
				</ul>
				<div class="tab-content">
			    	<div class="tab-pane active" id="tab021">
			    		<?php if(count($archivosLiberados[0])!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td><b>Archivo</b></td>
										<td><b>Materia</b></td>
										<td><b>Maestro</b></td>										
										<td><b>Estatus</b></td>
									</tr>
									<?php foreach ($archivosLiberados as $valor) { 
											if($valor['nombreestatus'] == 'Revisado') { ?>
										<tr>
											<td style="width:20px;">
												<div class="btn-group">
													<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
														<span class="caret"/>
													</button>
													<ul class="dropdown-menu">							
														<li>
															<?php echo CHtml::link('<i class="icon-upload"></i> Subido a Plataforma', "#", 
															array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>4, 'tipoUsuario' => 4), 
															'confirm' => 'Estás seguro que quiere pasar este Archivo a En Plataforma?')); ?> 
														</li>	
														<li>
															<?php
																$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombreArchivo"];
																echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
															?>										
														</li>																					
													</ul>
												</div>
											</td>
											<td><?php echo $valor['nombreArchivo']; ?></td>
											<td><?php echo $valor['materiaNombre']; ?></td>
											<td><?php echo $valor['maestroNombre']; ?></td>
											<td><?php echo '<span style="width:20px;" class="label label-info">' . 
											$valor['nombreestatus'] . '</span>'; ?></td>					</tr>
									<?php }}	?>			
								</table>
								<?php } 
							else{
								echo '<h6>No hay planeaciones todavía, inicie ' . CHtml::link('creando la primera', 
								array('create', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
							}
							?>
							EDUW3389
			    	</div>			    	
			    	<div class="tab-pane" id="tab022">
			    		<?php if(count($archivosLiberados[0])!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td><b>Archivo</b></td>
										<td><b>Materia</b></td>
										<td><b>Maestro</b></td>										
										<td><b>Estatus</b></td>
									</tr>
									<?php foreach ($archivosLiberados as $valor) { 
											if($valor['nombreestatus'] == 'En plataforma') { ?>
										<tr>
											<td style="width:20px;">
												<div class="btn-group">
													<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
														<span class="caret"/>
													</button>
													<ul class="dropdown-menu">							
														<li>
															<?php echo CHtml::link('<i class="icon-upload"></i> No la he subido', "#", 
															array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>3, 'tipoUsuario' => 4), 
															'confirm' => 'Estás seguro que quiere pasar este Archivo a Revisado?')); ?> 
														</li>																						
													</ul>
												</div>
											</td>											
											<td><?php echo $valor['nombreArchivo']; ?></td>
											<td><?php echo $valor['materiaNombre']; ?></td>
											<td><?php echo $valor['maestroNombre']; ?></td>
											<td><?php echo '<span style="width:20px;" class="label label-info">' . 
											$valor['nombreestatus'] . '</span>'; ?></td>					</tr>
									<?php }}	?>			
								</table>
								<?php } 
							else{
								echo '<h6>No hay planeaciones todavía, inicie ' . CHtml::link('creando la primera', 
								array('create', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
							}
							?>
			    	</div>
			    	<div style="height:110px;"></div>
				</div>
			</div>
		</div>		
	</div>
</div>