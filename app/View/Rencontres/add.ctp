
<div id="page-container" class="row">
    <div id="sidebar" class="col-sm-3">
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">

                <?php if ($this->Session->check('Auth.User')): ?> 
                   <li class="list-group-item"><?php echo $this->Html->link(__('New Patient'), array('action' => 'add'), array('class' => '')); ?></li>
                <?php endif ?>                 
                <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index'), array('class' => '')); ?> </li>             
            </ul>  
        </div>

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Appointments Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">          
                <li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index')); ?></li>
            </ul>  
        </div>

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add Appointment'); ?></h2>

        <div class="rencontres form">

            <?php echo $this->Form->create('Rencontre', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('date', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('patient_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->