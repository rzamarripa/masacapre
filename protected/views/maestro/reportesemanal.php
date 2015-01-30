<?php
$contador = 0;
$alumnoId = $_GET["alumno_did"] / 23;
$connection = Yii::app()->db;
$this->pageCaption='Reporte semanal';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="del alumno";
$this->breadcrumbs=array(
	'Alumno',
	'Reporte',
	'Semana'
);

$grupo = AlumnosGrupo::model()->find("alumno_aid = " . $_GET["alumno_did"]);
$grupoActual = $grupo->grupo_aid;
$comentario = Reporte::model()->find('alumno_aid = :a && semana_did = :s', array(':a'=>$alumnoId, ':s' => $_GET['semana_did']));
$alumnoGrupo = AlumnosGrupo::model()->find('alumno_aid = :a && grupo_aid = :b', array(':a' => $alumnoId, ':b' => $grupo->grupo_aid));
if(empty($comentario))
{
	$this->menu=array(
		array('label'=>'Volver', 'url'=>array('versemanasporalumno')),
		array('label'=>'Comentar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('reporte/create',
		'alumno_aid'=>$alumnoId, 'semana_did' => $_GET['semana_did'], 'grupo_did' => $alumnoGrupo->grupo_aid, 'semestre_did' => $_GET['semestre_did']),
		'confirm'=>'¿Tienes que poner un comentario en el reporte, quieres hacerlo?')),
		array('label'=>'Generar', 'url'=>array('reportesemanalgenerado',
								'alumno_did'=>$alumnoId,
								'semana_did'=>$_GET['semana_did'],
								'semestre_did'=>$_GET['semestre_did'],
								)),	
	);
}
else
{	
	$this->menu=array(
	array('label'=>'Volver', 'url'=>array('versemanasporalumno')),
	array('label'=>'Generar', 'url'=>array('reportesemanalgenerado',
								'alumno_did'=>$alumnoId,
								'semana_did'=>$_GET['semana_did'],
								'semestre_did'=>$_GET['semestre_did'],
								'reporte_id'=>$_GET['reporte_id'])),	
								);
}
/*
Aquí tendremos que ver la información del alumno, con las evaluaciones que sus maestros le han puesto a lo largo de la semana.

Lista

Info. del alumno
Nombre
Semestre
Matrícula
*/
$querySemanas = 'select s.nombre as Semana, sum(c.porcentaje) as Cantidad from Tutoreo as t
						left join Semana as s on s.id = t.semana_did
						left join Conducta as c on c.id = t.conducta_did
						where t.alumno_aid = ' . $alumnoId . ' && s.semestre_did = ' . $_GET['semestre_did'] . ' 
						group by Semana asc;';
$commandSemanas = $connection->createCommand($querySemanas);
$semanas = $commandSemanas->queryAll();


$alumno = Alumno::model()->find('id = ' . $alumnoId);
$tutoreos = Tutoreo::model()->findAll('alumno_aid = :x && semana_did = :y', 
			array(':x' => $alumnoId, ':y' => $_GET['semana_did']));

?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<?php


//Gráfica Impresiones por Hora Linear
echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Valoración", "Puntos"],';
			foreach($semanas as $valor){
				echo '["' . $valor["Semana"] . '",' . $valor["Cantidad"] . '],';
			}
echo '  ]);
		var options = {
			hAxis: {title: "Puntos por semana"},
			vAxis: {
						title: "Rango de puntos alcanzables",
						viewWindow: 
						{				          
				          min: 0,
				          max: 900,
				        },
						gridlines: 
						{
				          count: 8,
				        },
					},
			width:400,
			height:300,
          	title: "Gráfica conductual",			
			lineWidth:2,
			pointSize: 4,
			legend: "none",
			colors:["#3F8FD2"],
        };
        
        var chart = new google.visualization.AreaChart(document.getElementById("semanas"));
        chart.draw(data, options);
      }
    </script>

';
?>
<div class="container">
	<div class="row">
		<div class="span12">
			<table>
				<tr>
					<td><?php echo '<img style="width:200px; height:100px;" src="' . 
									Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'images' . 
										DIRECTORY_SEPARATOR . 'logoprepa.png" alt="' . $alumno->nombre . '"/>';  ?></td>
					<td style="width:80px;"></td>
					<td><h1>Informe de tutoría</h1></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="span12" >
			<table class="table" style="font-size:8pt;">
				<tr>
					<td>
						Alumno:<small><?php echo $alumno->nombre; ?></small>
					</td>
					<td>
						Matrícula: <small><?php echo $alumno->matricula; ?></small>
					</td>
					<td>
						Fecha: <small><?php if(isset($tutoreos[0])){
													echo $tutoreos[0]->semana->fechaInicial_f;
		  										}
		  										else{
		  											echo 'No hay tutoreo';
		  										};?></small>
					</td>					
				</tr>
			</table>
		</div>	  
	</div>
	<div class="row">
		<div class="span12">
			<table style="font-size:8pt;" class="table table-bordered">
				<thead class="thead">
					<tr>
						<td ><b>No.</b></td>
						<td ><b>Materia</b></td>
						<td ><b>Maestro</b></td>
						<td ><b>Faltas</b></td>
						<td ><b>T.N.E.</b></td>
						<td ><b>Conducta</b></td>
						<td ><b>Observaciones</b></td>
					</tr>
				</thead>
				<tbody>
				<?php foreach($tutoreos as $tutoreo){ 
					$contador++;
				?>
					<tr>
						<td><?php echo $contador;?></td>	
						<td style="width:80px;"><?php echo $tutoreo->maestroMateriaGrupo->materia->nombre;?></td>	
						<td style="width:100px;"><?php echo $tutoreo->maestroMateriaGrupo->maestro->nombre;?></td>
						<td><?php echo $tutoreo->faltas;?></td>
						<td><?php echo $tutoreo->tareasNoEntregadas;?></td>
						<td style="width:150px;"><?php echo $tutoreo->conducta->nombre;?></td>
						<td><?php echo $tutoreo->observaciones;?></td>
					</tr>
				<?php } 
					$contador = 0;
				?>
					<tr>
						<td colspan="7">
							<h3>Comentario del tutor</h3>
							<small>
							<?php
								if(isset($_GET['reporte_id'])){							
									$comentario = Reporte::model()->find('id = :a', array(':a' => $_GET["reporte_id"]));
									if(empty($comentario))
									{
										echo 'Está vacío';
									}
									else
									{
										echo $comentario->comentario;
									}
								}
							?>
							</small>
						</td>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="span12">
			<div class="span5" id="semanas"></div>		
		</div>
	</div>
</div>