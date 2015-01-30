<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

	<style>
		.navbar-inner{
			background: rgb(82,163,73); /* Old browsers */
			/* IE9 SVG, needs conditional override of 'filter' to 'none' */
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzUyYTM0OSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM1MmEzNDkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			background: -moz-linear-gradient(top,  rgba(82,163,73,1) 0%, rgba(82,163,73,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(82,163,73,1)), color-stop(100%,rgba(82,163,73,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* IE10+ */
			background: linear-gradient(to bottom,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#52a349', endColorstr='#52a349',GradientType=0 ); /* IE6-8 */
		}
		.navbar .nav > li > a {
		  color:white;
		  float:none;
		  line-h	eight:19px;
		  padding:10px 10px 11px;
		  text-decoration:none;
		  text-shadow:rgba(0, 0, 0, 0.247059) 0 -1px 0;
		}

		.navbar .nav .active > a, .navbar .nav .active > a:hover {
		  background-color:#1c670d;
		  color:#e9d6d6;
		  text-decoration:none;
		}

		.thead{
			background: rgb(255,255,255); /* Old browsers */
			/* IE9 SVG, needs conditional override of 'filter' to 'none' */
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2YzZjNmMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUxJSIgc3RvcC1jb2xvcj0iI2VkZWRlZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(243,243,243,1)), color-stop(51%,rgba(237,237,237,1)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* IE10+ */
			background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-8 */
		}
	</style>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/fav.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
				<?php
					$items = array();
					$usuarioActual = Usuario::model()->getUsuario(Yii::app()->user->name);
					//echo '<pre>'; print_r($usuarioActual); echo '</pre>';
					if(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Administrador' || isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Coordinador'){
						$items=	array(
								array('label'=>'Mis Planeaciones', 'url'=>array('planeacion/planporadmin')),
								array('label'=>'Herramientas',
									'url'=>'#',
									'itemOptions'=>array('class'=>'dropdown','id'=>'home'),
									'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
									'submenuOptions'=>array('class'=>'dropdown-menu'),
									'items'=>array(
										array('label'=>'Alumnos', 'url'=>array('/alumno/index')),
										array('label'=>'Cambiar de Grupo', 'url'=>array('/grupo/cambiar')),
									)),
								array('label'=>'Catálogos',
									'url'=>'#',
									'itemOptions'=>array('class'=>'dropdown','id'=>'home'),
									'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
									'submenuOptions'=>array('class'=>'dropdown-menu'),
									'items'=>array(
										array('label'=>'Alumnos', 'url'=>array('/alumno/index')),
										array('label'=>'Licenciaturas', 'url'=>array('/licenciatura/index')),
										array('label'=>'Usuarios', 'url'=>array('/usuario/index')),
										array('label'=>'Estatus', 'url'=>array('/estatus/index')),
										array('label'=>'Materias', 'url'=>array('/materia/index')),
										array('label'=>'Maestros', 'url'=>array('/maestro/index')),
										array('label'=>'Relacionar Materias, Maestros, Grupos', 'url'=>array('/materiaMaestro/index')),
										array('label'=>'Semestres', 'url'=>array('/semestre/index')),
										array('label'=>'Ciclos', 'url'=>array('/ciclo/index')),
										array('label'=>'Grupos', 'url'=>array('/grupo/index')),
										array('label'=>'Semanas', 'url'=>array('/semana/index')),
										array('label'=>'Conductas', 'url'=>array('/conducta/index')),
										array('label'=>'Alumnos Por Grupo', 'url'=>array('/alumnosGrupo/index')),
										array('label'=>'Cambiar Alumnos de Grupo', 'url'=>array('/maestro/cambiaralumnosgrupo')),
									),
									'visible'=>!Yii::app()->user->isGuest
								),
								array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
								array('label'=>'Contacto', 'url'=>array('/site/contact')),
						);
					}
					elseif(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Maestro'){
						$items=array(
							array('label'=>'Mis Materias', 'url'=>array('/site/index')),
							array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contacto', 'url'=>array('/site/contact')),
						);
					}
					elseif(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Coordinador'){
						$items=array(
							array('label'=>'Mis Materias', 'url'=>array('/maestro/vermaestrosporcoordinador')),
							array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contacto', 'url'=>array('/site/contact')),
						);
					}
					$items[]=array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);

					$this->widget('ext.custom.widgets.BMenu',array(
						'items'=>$items,
						 'activateParents'=>true,
						'activeCssClass'=>'',
						'htmlOptions'=>array(
							'class'=>'nav nav-pills',
						),
					));
				?>

				<?php
				//echo '<pre>'; print_r($usuarioActual->tipoUsuario); echo '</pre>';
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Bienvenido ' . Yii::app()->user->name, 'url'=>array('site/profile'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Cerrar Sesión', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
					),
					'htmlOptions'=>array(
						'class'=>'nav pull-right',
					),
				)); ?>
			</div>
		</div>
	</div>
	<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if($flashMessages){
			foreach($flashMessages as $key => $message){
				echo '<div class="info alert alert-'.$key.'" style="text-align:center">
							<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo '<p>' . $message . '</p>';
				echo '</div>';
			}
		}
		?>
	<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('BBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>

	<?php echo $content; ?>

	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by <a href="http://uss.mx">USS</a>.<br/>
			Todos los derechos reservados.<br/>
		</div>
	</footer>

</body>
</html>
<?php
Yii::app()->clientScript->registerScript(
	'myHideEffect',
	'$(".info").animate({opacity:1.0},5000).slideUp("slow");',
	CClientScript::POS_READY
);