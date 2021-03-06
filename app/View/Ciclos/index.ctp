<div class="ciclos index">
	<h2><?php echo __('Ciclos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ciclo');?></th>
			<th><?php echo $this->Paginator->sort('fechaInicio');?></th>
			<th><?php echo $this->Paginator->sort('fechaFinal');?></th>
			<th><?php echo $this->Paginator->sort('primerCuatrimestre');?></th>
			<th><?php echo $this->Paginator->sort('segundoCuatrimestre');?></th>
			<th><?php echo $this->Paginator->sort('observaciones');?></th>
			<th class="actions"><?php echo __('Opciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ciclos as $ciclo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ciclo['Ciclo']['id']; ?>&nbsp;</td>
		<td><?php echo $ciclo['Ciclo']['ciclo']; ?>&nbsp;</td>
		<td><?php echo $this->Html->formatTime($ciclo['Ciclo']['fechaInicio']); ?>&nbsp;</td>
		<td><?php echo $this->Html->formatTime($ciclo['Ciclo']['fechaFinal']); ?>&nbsp;</td>
		<td><?php echo $this->Html->formatTime($ciclo['Ciclo']['primerCuatrimestre']); ?>&nbsp;</td>
		<td><?php echo $this->Html->formatTime($ciclo['Ciclo']['segundoCuatrimestre']); ?>&nbsp;</td>
		<td><?php echo $ciclo['Ciclo']['observaciones']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ciclo['Ciclo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ciclo['Ciclo']['id'])); ?>
			<!--<?php echo $this->Html->link(__('Borrar'), array('action' => 'delete', $ciclo['Ciclo']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $ciclo['Ciclo']['id'])); ?>-->
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('action' => 'add')); ?></li>
		<!--<li><?php echo $this->Html->link(__('List Inscripcions'), array('controller' => 'inscripcions', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Inscripcion'), array('controller' => 'inscripcions', 'action' => 'add')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('Listar Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('Listar Materias'), array('controller' => 'materias', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Materia'), array('controller' => 'materias', 'action' => 'add')); ?> </li>-->
	</ul>
</div>