	<div class="span5">
		<div class="span6">
			<ul class="thumbnails">
				<li class="span4">
					<div class="thumbnail" style="padding:20px;">				
					<?php 
						if($data->foto != "")
							echo '<img src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $data->foto . '" alt="' . $data->nombre . '" width=250 height=250/>'; 
						else
							echo '<img src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . 'sin_imagen.jpg" alt="' . $data->nombre . '" width=250 height=250/>'; 	
					?>
						<div class="caption">
							<div style="height:80px;">
								<p style="text-align:left;">
									<b>Nombre: </b><?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->id)); ?><br/>
									<b>Matrícula: </b><?php echo $data->matricula; ?><br/>								
								</p>
							</div>
							<br/>
							<p style="text-align:left;">
								<?php
							    	echo CHtml::button('Ver Detalle', 
								    		array('submit' => 'view/' . $data->id,'class'=>'btn btn-large btn-primary', 'style'=>'width:100%')); 
							    ?>
							</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>