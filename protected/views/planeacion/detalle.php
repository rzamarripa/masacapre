
<?php
	$planeacion = Planeacion::model()->find('id = :id',array(':id' => $_GET['id']));
?>
<div style="text-align:center;">
<h2><?php echo $model->materia->nombre; ?></h2>
</div>
<table class="tablefuerte table-condensed table-bordered" style="background-color:white; font-size:8pt; border-color:black;">
	<tr>		
		<td colspan="3">
			<dl class="dl-horizontal">
			  <dt>Docente</dt>
			  <dd><?php echo $planeacion->maestro->nombre; ?></dd>
			</dl>
		</td>		
		<td>
			<dl class="dl-horizontal">
			  <dt>Semestre</dt>
			  <dd><?php echo $planeacion->semestre; ?></dd>
			</dl>
		</td>
		<td colspan="2">
			<dl class="dl-horizontal">
			  <dt>Asignatura</dt>
			  <dd><?php echo $planeacion->materia->nombre; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td>
			<dl class="dl-horizontal">
			  <dt>Consecutivo</dt>
			  <dd><?php echo $planeacion->consecutivo; ?></dd>
			</dl>
		</td>
		<td>
			<dl class="dl-horizontal">
			  <dt>Planeación didáctica</dt>
			  <dd><?php echo $planeacion->planeacion_didactica; ?></dd>
			</dl>
		</td>
		<td>
			<dl class="dl-horizontal">
			  <dt>Bloque</dt>
			  <dd><?php echo $planeacion->bloque; ?></dd>
			</dl>
		</td>
		<td>
			<dl class="dl-horizontal">
			  <dt>Sesiones</dt>
			  <dd><?php echo $planeacion->sesiones; ?></dd>
			</dl>
		</td>
		<td>
			<dl class="dl-horizontal">
			  <dt>Tiempo estimado</dt>
			  <dd><?php echo $planeacion->tiempo_estimado; ?></dd>
			</dl>
		</td>
		<td>
			<dl class="dl-horizontal">
			  <dt>Estrategias facilitadoras del aprendizaje</dt>
			  <dd><?php echo $planeacion->estrategia; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<dl class="dl-horizontal">
			  <dt>Tema</dt>
			  <dd><?php echo '<pre style="font-size:8pt;">' . $planeacion->tema . '</pre>' ?></dd>
			</dl>
		</td>
		<td colspan="3">
			<dl class="dl-horizontal">
			  <dt>Subtema(s)</dt>
			  <dd><?php echo '<pre style="font-size:8pt;">' . $planeacion->subtema . '</pre>' ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Problema Significativo</dt>
			  <dd><?php echo $planeacion->problema_significativo; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<dl class="dl-horizontal">
			  <dt>Activación</dt>
			  <dd><?php echo '<pre style="font-size:8pt;">' . $planeacion->activacion . '</pre>' ?></dd>
			</dl>
		</td>
		<td colspan="3">
			<dl class="dl-horizontal">
			  <dt>Preguntas Inductivas</dt>
			  <dd><?php echo '<pre style="font-size:8pt;">' . $planeacion->preguntas_inductivas . '</pre>' ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Actividades</dt>
			  <dd><?php echo $planeacion->actividades; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Competencia Conceptual</dt>
			  <dd><?php echo $planeacion->competencias_conceptuales; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Competencias Procedimentales</dt>
			  <dd><?php echo $planeacion->competencias_procedimentales; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Competencias Actitudinales</dt>
			  <dd><?php echo $planeacion->competencias_actitudinales; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Cierre de Clase</dt>
			  <dd><?php echo $planeacion->cierre_de_clase; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Tarea</dt>
			  <dd><?php echo $planeacion->tarea; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Métodos de Evaluación</dt>
			  <dd><?php echo $planeacion->metodos_de_evaluacion; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Bibliográficos</dt>
			  <dd><?php echo $planeacion->bibliograficos; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Electrónicos || Internet;</dt>
			  <dd><?php echo '<pre style="font-size:7pt;"><a href = "' . $planeacion->electronicos . '">' . $planeacion->electronicos . '</a></pre>'; ?></dd>
			</dl>
		</td>
	</tr>
	<tr>
		<td colspan="6">
			<dl class="dl-horizontal">
			  <dt>Necesidades</dt>
			  <dd><?php echo $planeacion->necesidades; ?></dd>
			</dl>
		</td>
	</tr>		
</table>
<input type="button" name="imprimir" id="imprimir" value="Imprimir" onclick="window.print();" />