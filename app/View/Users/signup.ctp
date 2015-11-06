
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                
                <li class="list-group-item"><?php echo $this->Html->link(__('List Employes'), array('action' => 'index')); ?></li>
            </ul>  
        </div>
    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add Employe'); ?></h2>

        <div class="users form">

            <?php echo $this->Form->create('User', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->               
                 <div class="form-group">
                    <?php echo $this->Form->input('courriel', array('class' => 'form-control')); ?>
                </div><!-- .form-group --> 
                <div class="form-group">
                    <?php echo $this->Form->input('role', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->