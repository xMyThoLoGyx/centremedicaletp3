
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Patients Medecin'), array('action' => 'edit', $patientsMedicament['PatientsMedicament']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Patients Medecin'), array('action' => 'delete', $patientsMedicament['PatientsMedicament']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $patientsMedicament['PatientsMedicament']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Patients Medecins'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Patients Medecin'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Patients'), array('controller' => 'patients', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('controller' => 'medicaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Medecins'), array('controller' => 'medicaments', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="patientsMedicaments view">

			<h2><?php  echo __('Patients Medecin'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($patientsMedicament['PatientsMedicament']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Patients'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($patientsMedicament['Patients']['id'], array('controller' => 'patients', 'action' => 'view', $patientsMedicament['Patients']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Medecins'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($patientsMedicament['Medicaments']['id'], array('controller' => 'medicaments', 'action' => 'view', $patientsMedicament['Medicaments']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
