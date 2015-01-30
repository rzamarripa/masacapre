<?php
$this->pageCaption='Listado de Materias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="de tu área";
$this->breadcrumbs=array(
	'Mis Materias',
);
?>

<?php
//Materias por maestro

$this->menu=array(
	array('label'=>'Reportes', 'url'=>array('versemanasporalumno')),
);
$connection = Yii::app()->db;

$queryMateriasPorMaestros = 'select mm.id as relacion, mat.id  as matid, mat.nombre as materia, maes.id as maestroid, maes.nombre as maestro, lic.nombre as licenciatura, u.usuario as usuario, mat.cantidad_planeaciones as cantidad,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 2) as borrador,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 1) as liberadas,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 3) as revisadas,
(select count(*) from Planeacion as p where p.materiaMaestro_did = mm.id && p.estatus_did = 4) as plataforma,
(select sum(borrador + liberadas + revisadas + plataforma)) as total
from Materia_Maestro mm
inner join Materia as mat on mat.id = mm.materia_aid
inner join Licenciatura as lic on lic.id = mat.licenciatura_aid
inner join Maestro as maes on maes.id = mm.maestro_aid
inner join Usuario as u on u.id = maes.usuario_did
where mat.licenciatura_aid IN (
select ls.licenciatura_did from Licenciatura_Usuario as ls
inner join Licenciatura as l on l.id = ls.licenciatura_did
where ls.usuario_did = (
	select id from Usuario as u where u.usuario = "' . Yii::app()->user->name . '"
)
) && mm.estatus_did = 1
order by maestro asc;';

$commandMateriasPorMaestros = $connection->createCommand($queryMateriasPorMaestros);
$materiasPorMaestros = $commandMateriasPorMaestros->queryAll();
//echo '<pre>'; print_r($materiasPorMaestros); echo '</pre>';
?>

<table class="table table-bordered table-striped" style="font-size:9pt;">
	<thead class="thead">
		<tr>
			<td colspan="2" style="text-align:center;"><b>Acciones</b></td>
			<td><b>ID</b></td>
			<td><b>Materia</b></td>
			<td><b>Maestro</b></td>
			<td style="width:70px;"><b>Requeridas</b></td>
			<td style="width:50px;"><b>Borrador</b></td>
			<td style="width:50px;"><b>Liberadas</b></td>
			<td style="width:50px;"><b>Revisadas</b></td>
			<td style="width:60px;"><b>Plataforma</b></td>
			<td style="width:30px;"><b>Total</b></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($materiasPorMaestros as $valor) { ?>
		<tr>
			<td style="width:70px;"><?php echo CHtml::link('Planeaciones', array('planeacion/planporcoord', 'materia'=>$valor['materia'], 'matid'=>$valor['matid'], 'maestroid'=>$valor['maestroid'], 'usuario'=>$valor['usuario'])); ?></td>
			<td style="width:70px; text-align:center;"><?php echo CHtml::link("Tutoreo",
						array('maestro/vergrupospormaestro',
						'materia'=>$valor["materia"],
						'matid'=>$valor["matid"],
						'maestroid'=>$valor["maestroid"],
						'maesmatgru'=>$valor['relacion']
						));
				?>
			</td>
			<td><?php echo $valor['matid']; ?></td>
			<td><b><?php echo $valor['materia']; ?></b></td>
			<td><?php
								if( $valor['total'] > 0)
								{
									echo CHtml::link('<i class="icon-repeat icon-white"></i>',array('planeacion/reiniciar', 'mm'=>$valor['relacion']),array('class'=>'btn btn-success btn-mini'));
								}
								else
								{
									echo CHtml::link('<i class="icon-repeat icon-white"></i>',array('planeacion/reiniciar', 'mm'=>$valor['relacion']),array('class'=>'btn btn-mini disabled'));
								}
								echo ' ' . $valor['maestro']; ?></td>
			<td><span class="label"><?php echo $valor['cantidad']; ?></span></td>
			<td><span class="label label-important"><?php echo $valor['borrador']; ?></span></td>
			<td><span class="label label-warning"><?php echo $valor['liberadas']; ?></span></td>
			<td><span class="label label-info"><?php echo $valor['revisadas']; ?></span></td>
			<td><span class="label label-success"><?php echo $valor['plataforma']; ?></span></td>
			<td><span class="label label-inverse"><?php echo $valor['total']; ?></span></td>
		</tr>
	<?php }	?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="11" style="text-align:center;"><span class="label label-success">Muestra el listado de las materias que están asignadas al nivel de preparatoria.</span></td>
		</tr>
	</tfoot>
</table>