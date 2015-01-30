<?php
$this->pageCaption='Planeaciones de ' . $_GET['materia'];
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	'Mis Planeaciones',
);

$this->menu=array(
	array('label'=>'Volver a mis materias', 'url'=>array('maestro/vermaestrosporcoordinador')),
);
?>

<?php
//Materias por maestro
$connection = Yii::app()->db;
$queryPlaneacionPorMateria = 'select p.id, p.materia_aid as matid, p.consecutivo, p.semestre,  p.estrategia, p.tema, p.bloque, p.sesiones, tiempo_estimado, e.id as estatus, e.nombre as nombreestatus
							from Planeacion as p 
							inner join Estatus as e on e.id = p.estatus_did
							inner join Maestro as m on m.id = p.maestro_aid 
							where p.maestro_aid = (select id from Maestro where usuario_did = 
										(select id from Usuario where usuario = "' . $_GET['usuario'] . '")) && 
										p.materia_aid = ' . $_GET['matid'] . ' order by p.consecutivo;';
//echo $queryPlaneacionPorMateria;
$commandPlaneacionPorMateria = $connection->createCommand($queryPlaneacionPorMateria);
$planeacionPorMateria = $commandPlaneacionPorMateria->queryAll();

$queryArchivosPorMateria = 'select a.id, a.nombre, a.descripcion, e.nombre as estatus, a.materia_did, a.maestro_did
							from Archivo as a
							inner join Estatus as e on a.estatus_did = e.id
							where a.materia_did = ' . $_GET['matid'] . ' && a.maestro_did = ' . $_GET['maestroid'];
//echo $queryPlaneacionPorMateria;
$commandArchivosPorMateria = $connection->createCommand($queryArchivosPorMateria);
$archivos = $commandArchivosPorMateria->queryAll();
//echo '<pre>'; print_r($materias); echo '</pre>';
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab01" data-toggle="tab">Planeaciones</a></li>
		<li><a href="#tab02" data-toggle="tab"><i class="icon-file"></i> Mis Archivos</a></li>	
	</ul>
	<div class="tab-content">
    	<div class="tab-pane active" id="tab01">
    		<!-- Planeaciones -->
    		<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li><a href="#tab2" data-toggle="tab"><i style="color:green;" class="icon-edit"></i> Borradores</a></li>
					<li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-share"></i> Liberadas</a></li>
					<li><a href="#tab3" data-toggle="tab"><i class="icon-check"></i> Revisadas</a></li>
					<li><a href="#tab4" data-toggle="tab"><i class="icon-upload"></i> Plataforma</a></li>
					<li><a href="#tab6" data-toggle="tab"><i class="icon-trash"></i> Papelera</a></li>							
				</ul>
				<div class="tab-content">
			    	<div class="tab-pane active" id="tab1">
			    		<?php if(count($planeacionPorMateria)!=0) { ?>
						<table class="table table-bordered table-striped">
							<tr>
								<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
								<td style="width:30px;"><b>Consecutivo</b></td>
								<td><b>Semestre</b></td>
								<td><b>Estrategia</b></td>
								<td><b>Tema</b></td>
								<td><b>Bloque</b></td>
								<td><b>Sesiones</b></td>
								<td><b>Tiempo Estimado</b></td>
								<td><b>Estatus</b></td>
							</tr>
							<?php foreach ($planeacionPorMateria as $valor) { 
									if($valor['estatus'] == 1) { ?>
								<tr>
									<td style="width:20px;">
										<div class="btn-group">
											<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
												<span class="caret"/>
											</button>
											<ul class="dropdown-menu">	
												<li>
													<?php echo CHtml::link('<i class="icon-check"></i> Revisada', "#", 
													array('submit'=> array('planeacion/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>3, 'tipoUsuario' => 3), 
													'confirm' => 'Estás seguro que quiere pasar esta planeación a Revisada?')); ?>									</li>								
												<li>
													<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
													array('planeacion/view', 'id'=>$valor['id'])); ?>
												</li>
												<li>
													<?php echo CHtml::link('<i class="icon-trash"></i> En Papelera', "#", 
													array('submit'=> array('planeacion/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>5, 'tipoUsuario' => 3), 
													'confirm' => 'Estás seguro que quiere mandar a la Papelería esta planeación')); ?>									</li>								
												<li>
											</ul>
										</div>
									</td>
									<td><?php echo $valor['consecutivo']; ?></td>
									<td><?php echo $valor['semestre']; ?></td>
									<td><?php echo $valor['estrategia']; ?></td>
									<td><?php echo $valor['tema']; ?></td>
									<td><?php echo $valor['bloque']; ?></td>
									<td><?php echo $valor['sesiones']; ?></td>
									<td><?php echo $valor['tiempo_estimado']; ?></td>
									<td><?php echo '<span style="width:20px;" class="label label-warning">Liberado</span>'; ?></td>
								</tr>
							<?php }}	?>			
						</table>
						<?php } 
							else{
								echo '<h6>No hay planeaciones todavía por este maestro, recuérdele de sus planeaciones por <a href="#">correo electrónico</a>';
								
							}
						?>
						
					</div>
					<div class="tab-pane" id="tab2">
						<?php if(count($planeacionPorMateria)!=0) { ?>
						<table class="table table-bordered table-striped">
							<tr>
								<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
								<td style="width:30px;"><b>Consecutivo</b></td>
								<td><b>Semestre</b></td>
								<td><b>Estrategia</b></td>
								<td><b>Tema</b></td>
								<td><b>Bloque</b></td>
								<td><b>Sesiones</b></td>
								<td><b>Tiempo Estimado</b></td>
								<td><b>Estatus</b></td>
							</tr>
							<?php foreach ($planeacionPorMateria as $valor) { 
									//Si es borrador
									if($valor['estatus'] == 2)  { ?>
								<tr>
									<td style="width:20px;">
										<div class="btn-group">
											<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
												<span class="caret"/>
											</button>
											<ul class="dropdown-menu">									
												<li>
													<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
													array('planeacion/view', 'id'=>$valor['id'])); ?>
												</li>												
											</ul>
										</div>
									</td>
									<td><?php echo $valor['consecutivo']; ?></td>
									<td><?php echo $valor['semestre']; ?></td>
									<td><?php echo $valor['estrategia']; ?></td>
									<td><?php echo $valor['tema']; ?></td>
									<td><?php echo $valor['bloque']; ?></td>
									<td><?php echo $valor['sesiones']; ?></td>
									<td><?php echo $valor['tiempo_estimado']; ?></td>
									<td>
										<?php 
											echo '<span style="width:20px;" class="label label-important">Borrador</span>';
										?>
									</td>
								</tr>
							<?php }}	?>			
						</table>
						<?php } 
							else{
								echo '<h6>No hay planeaciones todavía por este maestro, recuérdele de sus planeaciones por ' . 
								CHtml::link('correo electrónico', array('email', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
							}
						?>
					</div>
					<div class="tab-pane" id="tab3">
						<?php if(count($planeacionPorMateria)!=0) { ?>
						<table class="table table-bordered table-striped">
							<tr>
								<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
								<td style="width:30px;"><b>Consecutivo</b></td>
								<td><b>Semestre</b></td>
								<td><b>Estrategia</b></td>
								<td><b>Tema</b></td>
								<td><b>Bloque</b></td>
								<td><b>Sesiones</b></td>
								<td><b>Tiempo Estimado</b></td>
								<td><b>Estatus</b></td>
							</tr>
							<?php foreach ($planeacionPorMateria as $valor) { 
									if($valor['estatus'] == 3) { ?>
								<tr>
									<td style="width:20px;">
										<div class="btn-group">
											<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
												<span class="caret"/>
											</button>
											<ul class="dropdown-menu">
												<li>
													<?php echo CHtml::link('<i class="icon-arrow-left"></i> Sin Revisar', "#", 
													array('submit'=> array('planeacion/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>1, 'tipoUsuario' => 3), 
													'confirm' => 'Estás seguro que quiere pasar esta planeación a Liberada?')); ?>									</li>									
												<li>
													<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
													array('planeacion/view', 'id'=>$valor['id'])); ?>
												</li>
											</ul>
										</div>
									</td>
									<td><?php echo $valor['consecutivo']; ?></td>
									<td><?php echo $valor['semestre']; ?></td>
									<td><?php echo $valor['estrategia']; ?></td>
									<td><?php echo $valor['tema']; ?></td>
									<td><?php echo $valor['bloque']; ?></td>
									<td><?php echo $valor['sesiones']; ?></td>
									<td><?php echo $valor['tiempo_estimado']; ?></td>
									<td>
										<?php 
											echo '<span style="width:20px;" class="label label-info">Revisado</span>';
										?>
									</td>
								</tr>
							<?php }}	?>			
						</table>
						<?php } 
							else{
								echo '<h6>No hay planeaciones todavía por este maestro, recuérdele de sus planeaciones por ' . 
								CHtml::link('correo electrónico', array('email', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
							}
						?>
					</div>
					<div class="tab-pane" id="tab4">
						<?php if(count($planeacionPorMateria)!=0) { ?>
						<table class="table table-bordered table-striped">
							<tr>
								<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
								<td style="width:30px;"><b>Consecutivo</b></td>
								<td><b>Semestre</b></td>
								<td><b>Estrategia</b></td>
								<td><b>Tema</b></td>
								<td><b>Bloque</b></td>
								<td><b>Sesiones</b></td>
								<td><b>Tiempo Estimado</b></td>
								<td><b>Estatus</b></td>
							</tr>
							<?php foreach ($planeacionPorMateria as $valor) { 
									if($valor['estatus'] == 4) { ?>
										<tr>
											<td style="width:20px;">
												<div class="btn-group">
													<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
														<span class="caret"/>
													</button>
													<ul class="dropdown-menu">							
														<li>
															<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
															array('planeacion/view', 'id'=>$valor['id'])); ?>
														</li>
														<li>
															<?php echo CHtml::link('<i class="icon-plus-sign"></i> Crear planeación similar', 
															array('planeacion/update', 'id'=>$valor['id'], 'nueva'=>'si')); ?>
														</li>
													</ul>
												</div>
											</td>
											<td><?php echo $valor['consecutivo']; ?></td>
											<td><?php echo $valor['semestre']; ?></td>
											<td><?php echo $valor['estrategia']; ?></td>
											<td><?php echo $valor['tema']; ?></td>
											<td><?php echo $valor['bloque']; ?></td>
											<td><?php echo $valor['sesiones']; ?></td>
											<td><?php echo $valor['tiempo_estimado']; ?></td>
											<td>
												<?php 
													echo '<span style="width:20px;" class="label label-success">En Plataforma</span>';
												?>
											</td>
										</tr>
								<?php }
								}	?>			
						</table>
						<?php } 
							else{
								echo '<h6>No hay planeaciones todavía por este maestro, recuérdele de sus planeaciones por ' . 
								CHtml::link('correo electrónico', array('email', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
								}
						?>
					</div>					
					<div class="tab-pane" id="tab6">
						<?php if(count($planeacionPorMateria)!=0) { ?>
						<table class="table table-bordered table-striped">
							<tr>
								<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
								<td style="width:30px;"><b>Consecutivo</b></td>
								<td><b>Semestre</b></td>
								<td><b>Estrategia</b></td>
								<td><b>Tema</b></td>
								<td><b>Bloque</b></td>
								<td><b>Sesiones</b></td>
								<td><b>Tiempo Estimado</b></td>
								<td><b>Estatus</b></td>
							</tr>
							<?php foreach ($planeacionPorMateria as $valor) { 
									if($valor['estatus'] == 5) { ?>
										<tr>
											<td style="width:20px;">
												<div class="btn-group">
													<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
														<span class="caret"/>
													</button>
													<ul class="dropdown-menu">							
														<li>
															<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Planeación', 
															array('planeacion/view', 'id'=>$valor['id'])); ?>
														</li>														
														<li>										
															<?php echo CHtml::link('<i class="icon-trash"></i> Eliminar', "#", 
															array('submit'=> array('planeacion/delete', 'id'=>$valor["id"], 'tipoUsuario' => 3), 
															'confirm' => 'Estás seguro que quieres Eliminar definitivamente esta planeación?')); ?>
														</li>
													</ul>
												</div>
											</td>
											<td><?php echo $valor['consecutivo']; ?></td>
											<td><?php echo $valor['semestre']; ?></td>
											<td><?php echo $valor['estrategia']; ?></td>
											<td><?php echo $valor['tema']; ?></td>
											<td><?php echo $valor['bloque']; ?></td>
											<td><?php echo $valor['sesiones']; ?></td>
											<td><?php echo $valor['tiempo_estimado']; ?></td>
											<td>
												<?php 
													echo '<span style="width:20px;" class="label label-success">En Plataforma</span>';
												?>
											</td>
										</tr>
								<?php }
								}	?>			
						</table>
						<?php } 
							else{
								echo '<h6>No hay planeaciones todavía por este maestro, recuérdele de sus planeaciones por ' . 
								CHtml::link('correo electrónico', array('email', 'matid'=>$_GET['matid'], 'maestroid' => $_GET['maestroid'])) . '</h6>';
								}
						?>
					</div>
					<div style="height:60px;"></div>
				</div>
			</div>
    	</div>
    	<div class="tab-pane" id="tab02">
    		<!-- Planeaciones -->
    		<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">					
					<li><a href="#tab021" data-toggle="tab"><i style="color:green;" class="icon-edit"></i> Borrados</a></li>
					<li class="active"><a href="#tab022" data-toggle="tab"><i class="icon-share"></i> Liberados</a></li>
					<li><a href="#tab023" data-toggle="tab"><i class="icon-check"></i> Revisados</a></li>
					<li><a href="#tab024" data-toggle="tab"><i class="icon-upload"></i> Plataforma</a></li>
					<li><a href="#tab025" data-toggle="tab"><i class="icon-trash"></i> Papelera</a></li>							
				</ul>
				<div class="tab-content">
					<!-- Borradores -->
			    	<div class="tab-pane" id="tab021">
			    		<?php if(count($archivos)!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td style="width:30px;"><b>Nombre</b></td>
										<td><b>Descripción</b></td>
										<td style="width:80px"><b>Estatus</b></td>					
									</tr>
									<?php foreach ($archivos as $valor) { 	 ?>
										<?php if($valor['estatus'] == 'Borrador') { ?>
												<tr>
													<td style="width:20px;">
														<div class="btn-group">
															<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">																
																<li>
																	<?php
																		$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"];
																		echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
																	?>										
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Archivo', 
																	array('archivo/view', 'id'=>$valor['id'])) ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-edit"></i> Actualizar', "#", 
																	array('submit'=> array('archivo/update', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"]), 
																	'confirm' => 'Estás seguro que quiere Actualizar este archivo?')); ?>
																</li>
																<li>
																	<li>
																		<?php echo CHtml::link('<i class="icon-trash"></i> En Papelera', "#", 
																		array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>5, 'tipoUsuario' => 3), 
																		'confirm' => 'Estás seguro que quiere mandar a la Papelería este archivo?')); ?>
																	</li>
																</li>
															</ul>
														</div>
													</td>
													<td>
														<?php
															$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"]; 
															echo CHtml::link($valor["nombre"], $arch); 
														?>
													</td>
													<td><?php echo $valor["descripcion"]; ?></td>
													<td><?php echo '<span style="width:20px;" class="label label-success">' . $valor["estatus"] . '</span>'; ?></td>
												</tr>
										<?php } ?>
									<?php }	?>			
								</table>
						<?php } 
							else{
								echo '<h6>No hay archivos todavía, inicie ' . CHtml::link('subiendo el primero', 
								array('archivo/create', 'matid'=>$_GET["matid"], 'maestroid' => $_GET['maestroid'], 'tipoUsuario' => 2)) . '</h6>';
							}
						?>
			    	</div>
			    	<!-- Liberados -->
			    	<div class="tab-pane active" id="tab022">
			    		<?php if(count($archivos)!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td style="width:30px;"><b>Nombre</b></td>
										<td><b>Descripción</b></td>
										<td style="width:80px"><b>Estatus</b></td>					
									</tr>
									<?php foreach ($archivos as $valor) { 	 ?>
										<?php if($valor['estatus'] == 'Liberado') { ?>
												<tr>
													<td style="width:20px;">
														<div class="btn-group">
															<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">	
																<li>
																	<?php 
																		echo CHtml::link('<i class="icon-check"></i> Revisado', "#", 
																		array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>3, 'tipoUsuario' => 3), 
																		'confirm' => 'Estás seguro que quiere pasar este Archivo a Revisado?')); 
																	?>									
																</li>						
																<li>
																	<?php
																		$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"];
																		echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
																	?>										
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Archivo', 
																	array('archivo/view', 'id'=>$valor['id'])) ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-edit"></i> Actualizar', "#", 
																	array('submit'=> array('archivo/update', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"]), 
																	'confirm' => 'Estás seguro que quiere Actualizar este archivo?')); ?>
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-trash"></i> En Papelera', "#", 
																	array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>5, 'tipoUsuario' => 3), 
																	'confirm' => 'Estás seguro que quiere mandar a la Papelería este archivo?')); ?>
																</li>
															</ul>
														</div>
													</td>
													<td>
														<?php
															$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"]; 
															echo CHtml::link($valor["nombre"], $arch); 
														?>
													</td>
													<td><?php echo $valor["descripcion"]; ?></td>
													<td><?php echo '<span style="width:20px;" class="label label-success">' . $valor["estatus"] . '</span>'; ?></td>
												</tr>
										<?php } ?>
									<?php }	?>			
								</table>
								<?php } 
									else{
										echo '<h6>No hay archivos todavía, inicie ' . CHtml::link('subiendo el primero', 
										array('archivo/create', 'matid'=>$_GET["matid"], 'maestroid' => $_GET['maestroid'], 'tipoUsuario' => 2)) . '</h6>';
									}
								?>
			    	</div>
			    	<!-- Revisados -->
			    	<div class="tab-pane" id="tab023">
			    		<?php if(count($archivos)!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td style="width:30px;"><b>Nombre</b></td>
										<td><b>Descripción</b></td>
										<td style="width:80px"><b>Estatus</b></td>					
									</tr>
									<?php foreach ($archivos as $valor) { 	 ?>
										<?php if($valor['estatus'] == 'Revisado') { ?>
												<tr>
													<td style="width:20px;">
														<div class="btn-group">
															<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">	
																<li>
																	<?php echo CHtml::link('<i class="icon-arrow-left"></i> Sin Revisar', "#", 
																	array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>1, 'tipoUsuario' => 3), 
																	'confirm' => 'Estás seguro que quiere pasar esta planeación a Liberada?')); ?>									</li>									
																<li>						
																<li>
																	<?php
																		$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"];
																		echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
																	?>										
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Archivo', 
																	array('archivo/view', 'id'=>$valor['id'])) ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-edit"></i> Actualizar', "#", 
																	array('submit'=> array('archivo/update', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"]), 
																	'confirm' => 'Estás seguro que quiere Actualizar este archivo?')); ?>
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-trash"></i> En Papelera', "#", 
																	array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>5, 'tipoUsuario' => 3), 
																	'confirm' => 'Estás seguro que quiere mandar a la Papelería este archivo?')); ?>
																</li>
															</ul>
														</div>
													</td>
													<td>
														<?php
															$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"]; 
															echo CHtml::link($valor["nombre"], $arch); 
														?>
													</td>
													<td><?php echo $valor["descripcion"]; ?></td>
													<td><?php echo '<span style="width:20px;" class="label label-success">' . $valor["estatus"] . '</span>'; ?></td>
												</tr>
										<?php } ?>
									<?php }	?>			
								</table>
						<?php } 
							else{
								echo '<h6>No hay archivos todavía, inicie ' . CHtml::link('subiendo el primero', 
								array('archivo/create', 'matid'=>$_GET["matid"], 'maestroid' => $_GET['maestroid'], 'tipoUsuario' => 2)) . '</h6>';
							}
						?>
			    	</div>
			    	<!-- Plataforma -->
			    	<div class="tab-pane" id="tab024">
			    		<?php if(count($archivos)!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td style="width:30px;"><b>Nombre</b></td>
										<td><b>Descripción</b></td>
										<td style="width:80px"><b>Estatus</b></td>					
									</tr>
									<?php foreach ($archivos as $valor) { 	 ?>
										<?php if($valor['estatus'] == 'En plataforma') { ?>
												<tr>
													<td style="width:20px;">
														<div class="btn-group">
															<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">							
																<li>
																	<?php
																		$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"];
																		echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
																	?>										
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Archivo', 
																	array('archivo/view', 'id'=>$valor['id'])) ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-edit"></i> Actualizar', "#", 
																	array('submit'=> array('archivo/update', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"]), 
																	'confirm' => 'Estás seguro que quiere Actualizar este archivo?')); ?>
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-trash"></i> En Papelera', "#", 
																	array('submit'=> array('archivo/cambiarestatus', 'id'=>$valor["id"], 'estatus'=>5, 'tipoUsuario' => 3), 
																	'confirm' => 'Estás seguro que quiere mandar a la Papelería este archivo?')); ?>
																</li>
															</ul>
														</div>
													</td>
													<td>
														<?php
															$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"]; 
															echo CHtml::link($valor["nombre"], $arch); 
														?>
													</td>
													<td><?php echo $valor["descripcion"]; ?></td>
													<td><?php echo '<span style="width:20px;" class="label label-success">' . $valor["estatus"] . '</span>'; ?></td>
												</tr>
										<?php } ?>
									<?php }	?>			
								</table>
						<?php } 
							else{
								echo '<h6>No hay archivos todavía, inicie ' . CHtml::link('subiendo el primero', 
								array('archivo/create', 'matid'=>$_GET["matid"], 'maestroid' => $_GET['maestroid'], 'tipoUsuario' => 2)) . '</h6>';
							}
						?>
			    	</div>
			    	<!-- Eliminados -->
			    	<div class="tab-pane" id="tab025">
			    		<?php if(count($archivos)!=0) { ?>
								<table class="table table-bordered table-striped">
									<tr>
										<td><b><?php echo CHtml::encode('Acciones'); ?></b></td>
										<td style="width:30px;"><b>Nombre</b></td>
										<td><b>Descripción</b></td>
										<td style="width:80px"><b>Estatus</b></td>					
									</tr>
									<?php foreach ($archivos as $valor) { 	 ?>
										<?php if($valor['estatus'] == 'Eliminado') { ?>
												<tr>
													<td style="width:20px;">
														<div class="btn-group">
															<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">							
																<li>
																	<?php
																		$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"];
																		echo CHtml::link('<i class="icon-download"></i> Descargar',$arch);
																	?>										
																</li>
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Archivo', 
																	array('archivo/view', 'id'=>$valor['id'])) ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-edit"></i> Actualizar', "#", 
																	array('submit'=> array('archivo/update', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"]), 
																	'confirm' => 'Estás seguro que quiere Actualizar este archivo?')); ?>
																</li>
																<li>										
																	<?php echo CHtml::link('<i class="icon-trash"></i> Eliminar', "#", 
																	array('submit'=> array('archivo/delete', 'id'=>$valor["id"], 'nombre'=>$valor["nombre"], 'tipoUsuario'=>3), 
																	'confirm' => 'Estás seguro que quieres Eliminar definitivamente este archivo?')); ?>
																</li>
															</ul>
														</div>
													</td>
													<td>
														<?php
															$arch = $file= Yii::app()->BaseUrl . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $valor["nombre"]; 
															echo CHtml::link($valor["nombre"], $arch); 
														?>
													</td>
													<td><?php echo $valor["descripcion"]; ?></td>
													<td><?php echo '<span style="width:20px;" class="label label-success">' . $valor["estatus"] . '</span>'; ?></td>
												</tr>
										<?php } ?>
									<?php }	?>			
								</table>
						<?php } 
							else{
								echo '<h6>No hay archivos todavía, inicie ' . CHtml::link('subiendo el primero', 
								array('archivo/create', 'matid'=>$_GET["matid"], 'maestroid' => $_GET['maestroid'], 'tipoUsuario' => 2)) . '</h6>';
							}
						?>
			    	</div>
			    	<div style="height:110px;"></div>
				</div>
    		</div>    		
    	</div>
	</div>
</div>
