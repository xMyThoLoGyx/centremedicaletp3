<?php
$this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
$this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));

$this->Html->script('View/Medicaments/index', array('inline' => false));

?>


<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Medicament.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Medicament.id'))); ?></li>             
            </ul><!-- /.list-group -->

      

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                
                <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
            </ul>  
        </div>

        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Medecins Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('controller' => 'medicaments', 'action' => 'index'), array('class' => '')); ?></li>            
            </ul>
        </div>



    </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Medecin'); ?></h2>

        <div class="medicaments form">

            <?php echo $this->Form->create('Medicament', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php  echo $this->Form->input('nom', array('class' => 'form-control','id' => 'autocomplete'));?>
                </div><!-- .form-group -->
                
                 <?php
                    foreach ($patients as $patient) {

                        echo "<br/><input type='checkbox' name=\"patients[]\" value='$patient' /> $patient<br>";
                    }
                 ?>

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->