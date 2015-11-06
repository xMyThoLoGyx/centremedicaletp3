
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Patient.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Patient.id'))); ?></li>       
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                
                <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('action' => 'index'), array('class' => '')); ?> </li>
            </ul>  
        </div>

        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Employes'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New Employes'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul>
        </div>

        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Medecins Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('controller' => 'medicaments', 'action' => 'index'), array('class' => '')); ?></li> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New Medecin'), array('controller' => 'medicaments', 'action' => 'add'), array('class' => '')); ?></li> 
            </ul>
        </div>
        
        
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Appointments Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <?php if ($this->Session->check('Auth.User')): ?>             
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('controller' => 'rencontres', 'action' => 'add'), array('class' => '')); ?> </li>                 
                <?php endif ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'rencontres', 'action' => 'index')); ?></li>
            </ul>  
        </div>
        
        
        
    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Patient'); ?></h2>

        <div class="patients form">

            <?php echo $this->Form->create('Patient', array('type'=>'file','role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('nom', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->     
                
                <div class="form-group">
                    <?php echo $this->Form->input('etage_id', array('class' => 'form-control')); ?>  
                </div><!-- .form-group -->   

                <div class="form-group">
                    <?php echo $this->Form->input('section_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group --> 
                
                <div class="form-group">
                     <?php echo $this->Form->input('Medicament', array('multiple' => 'checkbox')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                     <?php echo $this->Form->input('imageProfil', array('type'=>'file'));?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->


<?php
$this->Js->get('#PatientEtageId')->event('click', $this->Js->request(array(
            'controller' => 'sections',
            'action' => 'getByEtage'
                ), array(
            'update' => '#PatientSectionId',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
);
?>