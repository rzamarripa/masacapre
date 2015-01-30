<?php
$maestromateriagrupo = MateriaMaestro::model()->find('id=:y',array(':y' => $_GET['maesmatgru']));
$alumnos = AlumnosGrupo::model()->findAll('grupo_aid = :x', array(':x'=>$_GET["grupo"]));

$usuarioActual = Usuario::model()->find('usuario = "' . Yii::app()->user->name . '"');


$this->pageCaption='Grupo: ' . $maestromateriagrupo->grupo->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	$maestromateriagrupo->materia->nombre => array('maestro/vergrupospormaestro', 'maesmatgru' => $_GET['maesmatgru']),
	$maestromateriagrupo->grupo->nombre,
);
?>
<table class="table table-bordered table-striped">
	<thead class="thead">
		<tr>
			<td>Foto</td>
			<td><b>Nombre</b></td>
			<td><b>Materia</b></td>
			<td><b>Semestre</b></td>
			<td><b>Ciclo Escolar</b></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($alumnos as $valor) { ?>
		<tr>
			<td>
			<?php echo '<img src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR .
			$valor->alumno->foto . '" alt="' . $valor->alumno->nombre . '" width=100 height=100/>' ?>
			</td>
			<td>
				<?php echo CHtml::link($valor->alumno->nombre,
						array('alumno/view',
								'id'=>$valor->alumno->id,
								'maesmatgru'=>$_GET['maesmatgru']));
				?>
			</td>
			<td>
				<a href="<?php echo Yii::app()->user->returnUrl; ?>"><?php echo $maestromateriagrupo->materia->nombre; ?></a>
			</td>
			<td><?php echo $valor->grupo->semestre->nombre; ?></td>
			<td><?php echo $valor->grupo->ciclo->nombre; ?></td>
		</tr>
	<?php }	?>
	</tbody>
</table>