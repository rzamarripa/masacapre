<?php
$materiaMaestro = MateriaMaestro::model()->find('id = ' . $_GET['maesmatgru']);
$alumnos = AlumnosGrupo::model()->findAll('grupo_aid = :x', array(':x'=>$_GET["grupo"]));
$usuarioActual = Usuario::model()->find('usuario = :u', array(':u' => Yii::app()->user->name));
$semana = Semana::model()->find('id = ' . $_GET['semana_did']);
$this->pageCaption='Maestro: ' . $materiaMaestro->maestro->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="Materia: " . $materiaMaestro->materia->nombre . ' ' . $semana->nombre;
$this->breadcrumbs=array(
	'Mis materias'=>Yii::app()->user->returnUrl,
	'Mis Grupos'=>array('maestro/vergrupospormaestro', 'maesmatgru' => $_GET['maesmatgru']),
	$semana->nombre,
);

$connection = Yii::app()->db;

$queryTutoreoPorSemana = 'select t.id as tutoreoid, a.foto as foto, a.id as alumno, a.nombre as nomAlumno, t.observaciones as observaciones,
							t.fecha as fecha, t.faltas as faltas, t.tareasNoEntregadas as "Tareas no entregadas", t.conducta_did as conducta,
							c.nombre as nombreconducta
							from AlumnosGrupo as ag
							left join Alumno as a on a.id = ag.alumno_aid
							left join Tutoreo as t on a.id = t.alumno_aid && t.semana_did = ' . $_GET['semana_did'] . ' &&
							t.maestroMateriaGrupo_aid = ' . $_GET['maesmatgru'] . ' && t.observaciones != ""
							left join Conducta c on c.id = t.conducta_did
							where ag.grupo_aid = ' . $_GET['grupo'] . ' && a.estatus_did = 1;';

$commandTutoreoPorSemana = $connection->createCommand($queryTutoreoPorSemana);
$tutoreoPorSemana = $commandTutoreoPorSemana->queryAll();
$this->menu=array(
	array('label'=>'Volver a mis semanas', 'url'=>array('maestro/vergrupospormaestro',
							'maesmatgru' => $_GET['maesmatgru'],
							)),
);
?>

<table class="table table-bordered table-striped">
	<thead class="thead">
		<tr>
			<td style="width:85px;"><b>Foto</b></td>
			<td><b>Nombre</b></td>
			<td><b>Fecha</b></td>
			<td><b>Faltas</b></td>
			<td><b>No Tareas</b></td>
			<td><b>Conducta</b></td>
			<td><b>Observaciones</b></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($tutoreoPorSemana as $alumnogrupo) { ?>
		<tr>
			<td>
				<?php echo '<img style="
									border-style:solid;
									border-width:3px;
									border-color:#442B1C;
									height:100px;
									width:90px;
									-webkit-border-radius: 3px 3px;
									-moz-border-radius: 3px 3px;"
								src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR .
				$alumnogrupo['foto'] . '" alt="' . $alumnogrupo['alumno'] . '" width=100 height=100/>' ?>
			</td>
			<?php
			if($usuarioActual->tipoUsuario->nombre == "Maestro")
			{
				if($alumnogrupo['faltas'] != "" && $semana->estatus->nombre == "Inactivo"){
					echo "<td>" . CHtml::link($alumnogrupo['nomAlumno'],
									array('tutoreo/view',
										'id' => $alumnogrupo['tutoreoid'],
										'semana_did' => $_GET['semana_did'],
										'maesmatgru' => $_GET['maesmatgru'],
										'semana_did'=> $_GET['semana_did'],
										'alumno_aid' => $alumnogrupo['alumno'],
										'grupo' => $_GET['grupo'],
									)) .
						"</td>";
				} else if($alumnogrupo['faltas'] != "" && $semana->estatus->nombre == "Activo"){
					echo "<td>" . CHtml::link($alumnogrupo['nomAlumno'],
									array('tutoreo/update',
										'id' => $alumnogrupo['tutoreoid'],
										'semana_did' => $_GET['semana_did'],
										'maesmatgru' => $_GET['maesmatgru'],
										'alumno_aid' => $alumnogrupo['alumno'],
										'grupo' => $_GET['grupo'],
									)) .
						"</td>";

				} else {
					echo "<td>" . CHtml::link($alumnogrupo['nomAlumno'],
									array('tutoreo/create',
										'alumno_aid' => $alumnogrupo['alumno'],
										'semana_did'=> $_GET['semana_did'],
										'maesmatgru' => $_GET['maesmatgru'],
										'grupo' => $_GET['grupo'],
									)) .
						"</td>";
				}
			}
			else
			{
				$tutoreos = Tutoreo::model()->findAll(array('order'=>'fecha desc',
											'condition'=>'maestroMateriaGrupo_aid = :x && alumno_aid = :z',
											'params'=>array(':x'=>$_GET['maesmatgru'],':z' => $alumnogrupo['alumno'])));

				if(count($tutoreos)>0)
					echo "<td>" . CHtml::link($alumnogrupo['nomAlumno'],
										array('maestro/vertutoreoporalumno',
											'maesmatgru' => $_GET['maesmatgru'],
											'semana_did'=> $_GET['semana_did'],
											'al' => $alumnogrupo['alumno'],
											'grupo' => $_GET['grupo'],
										)) .
							"</td>";
				else
					echo "<td>" . $alumnogrupo['nomAlumno'] . " [0 Tutoreos]</td>";
			}

			?>

			<td><?php echo $alumnogrupo['fecha']; ?></td>
			<td><?php echo $alumnogrupo['faltas']; ?></td>
			<td><?php echo $alumnogrupo['Tareas no entregadas']; ?></td>
			<td><?php echo $alumnogrupo['nombreconducta']; ?></td>
			<td><?php echo $alumnogrupo['observaciones']; ?></td>
		</tr>
	<?php }	?>
	</tbody>
</table>